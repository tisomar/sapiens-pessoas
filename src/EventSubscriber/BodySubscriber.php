<?php

declare(strict_types=1);
/**
 * /src/EventSubscriber/BodySubscriber.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\EventSubscriber;

use function in_array;
use LogicException;
use AguPessoas\Backend\Utils\JSON;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class BodySubscriber.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class BodySubscriber implements EventSubscriberInterface
{
    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     *
     * @codeCoverageIgnore
     *
     * @return mixed[] The event names to listen to
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                'onKernelRequest',
                10,
            ],
        ];
    }

    /**
     * Implementation of BodySubscriber event. Purpose of this is to convert JSON request data to proper request
     * parameters.
     *
     * @param RequestEvent $event
     *
     * @throws LogicException
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        // Get current request
        $request = $event->getRequest();

        // Request content is empty so assume that it's ok - probably DELETE or OPTION request
        if (empty($request->getContent())) {
            return;
        }

        // If request is JSON type convert it to request parameters
        if ($this->isJsonRequest($request)) {
            $this->transformJsonBody($request);
        }
    }

    /**
     * Method to determine if current Request is JSON type or not.
     *
     * @param Request $request
     *
     * @return bool
     */
    private function isJsonRequest(Request $request): bool
    {
        return in_array($request->getContentTypeFormat(), [null, 'json', 'txt'], true);
    }

    /**
     * Method to transform JSON type request to proper request parameters.
     *
     * @param Request $request
     *
     * @throws LogicException
     */
    private function transformJsonBody(Request $request): void
    {
        /** @var string $content */
        $content = $request->getContent();

        /** @var array $data */
        $data = JSON::decode($content, true);

        $request->request->replace($data);
    }
}
