<?php

declare(strict_types=1);
/**
 * /src/Rules/RulesManager.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Rules;

use Doctrine\ORM\Proxy\Proxy;
use ProxyManager\Proxy\GhostObjectInterface;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Rules\RuleInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Class RulesManager.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class RulesManager
{
    /**
     * @var RuleInterface[]
     */
    protected array $rules = [];
    private bool $ordered = false;

    /**
     * @param AuthorizationCheckerInterface $authorizationChecker
     * @param TokenStorageInterface         $tokenStorage
     * @param Stopwatch                     $stopwatch
     */
    public function __construct(
        private readonly AuthorizationCheckerInterface $authorizationChecker,
        private readonly TokenStorageInterface $tokenStorage,
        private readonly Stopwatch $stopwatch
    ) {
    }

    /**
     * @return RuleInterface[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param RuleInterface[] $rules
     */
    public function setRules(array $rules): void
    {
        $this->rules = $rules;
    }

    public function addRule(RuleInterface $rule): void
    {
        $this->rules[$rule->getOrder()][] = $rule;
    }

    /**
     * @param RestDtoInterface|null $restDto
     * @param EntityInterface       $entity
     * @param string|null           $transactionId
     * @param string                $contexto
     * @param array|null            $context
     */
    public function proccess(
        ?RestDtoInterface $restDto,
        EntityInterface $entity,
        ?string $transactionId,
        string $contexto,
        ?array $context = null
    ): void {
        if (null !== $restDto) {
            $className = \get_class($restDto);
        } else {
            // delete
            $className = ($entity instanceof Proxy || $entity instanceof GhostObjectInterface) ?
                get_parent_class($entity) : \get_class($entity);
        }

        if (!$this->ordered) {
            \ksort($this->rules);
            $this->ordered = true;
        }

        // $this->stopwatch->openSection('rulesManager');
        foreach ($this->rules as $ruleOrdered) {
            /** @var RuleInterface $rule */
            foreach ($ruleOrdered as $rule) {
                $supports = $rule->supports();
                if (array_key_exists($className, $supports) &&
                    \in_array($contexto, $supports[$className], true)) {
                    if ((('cli' === php_sapi_name()) && \in_array('skipWhenCommand', $supports[$className])) ||
                        (('cli' !== php_sapi_name()) && $this->tokenStorage->getToken()
                            && $this->authorizationChecker->isGranted('ROLE_ROOT'))
                    ) {
                        continue;
                    }
                    $this->stopwatch->start($contexto.':'.get_parent_class($rule));
                    $rule->validate($restDto, $entity, $transactionId);
                    $this->stopwatch->stop($contexto.':'.get_parent_class($rule));
                }
            }
        }
        // $this->stopwatch->stopSection('rulesManager');
    }
}
