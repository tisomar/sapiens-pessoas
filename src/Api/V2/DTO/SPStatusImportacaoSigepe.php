<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/SPStatusImportacaoSigepe.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\Nome;

use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;

/**
 * Class SPStatusImportacaoSigepe.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/status_importacao_sigepe/{id}',
    jsonLDType: 'SPEtapaImportacaoSigepe',
    jsonLDContext: '/api/doc/#model-SPStatusImportacaoSigepe'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPStatusImportacaoSigepe extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
    use SigepeServidor;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPEtapaImportacaoSigepe',
            'required' => false,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPEtapaImportacaoSigepe::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPEtapaImportacaoSigepe')]
    protected ?EntityInterface $etapaImportacao = null;

    public function getEtapaImportacao(): ?EntityInterface
    {
        return $this->etapaImportacao;
    }

    public function setEtapaImportacao(?EntityInterface $etapaImportacao): self
    {
        $this->setVisited('etapaImportacao');
        $this->etapaImportacao = $etapaImportacao;

        return $this;
    }
}
