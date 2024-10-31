<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;
use Symfony\Component\Form\Extension\Core\Type\TextType;

#[DTOMapper\JsonLD(
    jsonLDId: '/v1/cargo_efetivo/{id}',
    jsonLDType: 'CargoEfetivo',
    jsonLDContext: '/api/doc/#model-CargoEfetivo'
)]
#[Form\Form]
class CargoEfetivo extends RestDto
{
    use Id;
    use Timeblameable;
    Use CPFOperador;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[OA\Property(type: 'string', description: 'Especifica se o servidor possui o direito adquirido sobre o provimento do cargo. Codificação: 0 - NÃO e 1- SIM')]
    protected ?string $inDireitoAdquirido = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIngressoServidor = null;

    #[Form\Field(
        TextType::class,
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $numeroConcurso = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[DTOMapper\Property]
    protected ?int $anoConcurso = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[DTOMapper\Property]
    protected ?int $classificacaoConcurso = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $observacao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Cargo',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Cargo')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[OA\Property(ref: new Model(type: Cargo::class))]
    protected ?EntityInterface $cargo = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Lotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Lotacao')]
    #[OA\Property(ref: new Model(type: Lotacao::class))]
    protected ?EntityInterface $lotacaoExercicio = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Lotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Lotacao')]
    #[OA\Property(ref: new Model(type: Lotacao::class))]
    protected ?EntityInterface $lotacaoOrigem = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\ProcedenciaVaga',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\ProcedenciaVaga')]
    protected ?EntityInterface $procedenciaVaga = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoOcupacao',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoOcupacao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[OA\Property(ref: new Model(type: TipoOcupacao::class))]
    protected ?EntityInterface $tipoOcupacao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[OA\Property(ref: new Model(type: Servidor::class))]
    protected ?EntityInterface $servidor = null;

    /**
     * @var ClassePadrao[]
     */
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\ClassePadrao',
        dtoGetter: 'getClassesPadrao',
        dtoSetter: 'addClassePadrao',
        collection: true
    )]
    protected $classesPadrao = [];

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    #[OA\Property(type: 'string', description: 'Código dado pelo RH do orgão que recebeu o Cargo disponível para ocupação. Para um cargo específico são disponibilizados x vagas, este campo especificará qual o código da vaga que o servidor estará ocupando.')]
    protected ?string $codigoSiape = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    #[OA\Property(ref: new Model(type: Servidor::class), description: 'Identificador para o servidor que desocupou o cargo público para que outra pessoa devidamente autorizada por um ato público possa ser provida por substituição em um cargo público')]
    protected ?EntityInterface $servidorCargoDesocupado = null;

    public function getCodigoSiape(): ?string
    {
        return $this->codigoSiape;
    }

    public function setCodigoSiape(?string $codigoSiape): self
    {
        $this->codigoSiape = $codigoSiape;
        $this->setVisited('codigoSiape');
        return $this;
    }

    public function getInDireitoAdquirido(): string
    {
        return $this->inDireitoAdquirido;
    }

    public function setInDireitoAdquirido(string $inDireitoAdquirido): self
    {
        $this->inDireitoAdquirido = $inDireitoAdquirido;
        $this->setVisited('inDireitoAdquirido');
        return $this;
    }

    public function getDataIngressoServidor(): ?DateTime
    {
        return $this->dataIngressoServidor;
    }

    public function setDataIngressoServidor(?DateTime $dataIngressoServidor): self
    {
        $this->dataIngressoServidor = $dataIngressoServidor;
        $this->setVisited('dataIngressoServidor');
        return $this;
    }

    public function getNumeroConcurso(): ?string
    {
        return $this->numeroConcurso;
    }

    public function setNumeroConcurso(?string $numeroConcurso): self
    {
        $this->numeroConcurso = $numeroConcurso;
        $this->setVisited('numeroConcurso');
        return $this;
    }

    public function getAnoConcurso(): ?int
    {
        return $this->anoConcurso;
    }

    public function setAnoConcurso(?int $anoConcurso): self
    {
        $this->anoConcurso = $anoConcurso;
        $this->setVisited('anoConcurso');
        return $this;
    }

    public function getClassificacaoConcurso(): ?int
    {
        return $this->classificacaoConcurso;
    }

    public function setClassificacaoConcurso(?int $classificacaoConcurso): self
    {
        $this->classificacaoConcurso = $classificacaoConcurso;
        $this->setVisited('classificacaoConcurso');
        return $this;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): self
    {
        $this->observacao = $observacao;
        $this->setVisited('observacao');
        return $this;
    }

    public function getCargo(): ?EntityInterface
    {
        return $this->cargo;
    }

    public function setCargo(?EntityInterface $cargo): self
    {
        $this->cargo = $cargo;
        $this->setVisited('cargo');
        return $this;
    }

    public function getLotacaoExercicio(): ?EntityInterface
    {
        return $this->lotacaoExercicio;
    }

    public function setLotacaoExercicio(?EntityInterface $lotacaoExercicio): self
    {
        $this->lotacaoExercicio = $lotacaoExercicio;
        $this->setVisited('lotacaoExercicio');
        return $this;
    }

    public function getLotacaoOrigem(): ?EntityInterface
    {
        return $this->lotacaoOrigem;
    }

    public function setLotacaoOrigem(?EntityInterface $lotacaoOrigem): self
    {
        $this->lotacaoOrigem = $lotacaoOrigem;
        $this->setVisited('lotacaoOrigem');
        return $this;
    }

    public function getProcedenciaVaga(): ?EntityInterface
    {
        return $this->procedenciaVaga;
    }

    public function setProcedenciaVaga(?EntityInterface $procedenciaVaga): self
    {
        $this->procedenciaVaga = $procedenciaVaga;
        $this->setVisited('procedenciaVaga');
        return $this;
    }

    public function getTipoOcupacao(): ?EntityInterface
    {
        return $this->tipoOcupacao;
    }

    public function setTipoOcupacao(?EntityInterface $tipoOcupacao): self
    {
        $this->tipoOcupacao = $tipoOcupacao;
        $this->setVisited('tipoOcupacao');
        return $this;
    }

    public function getServidor(): ?EntityInterface
    {
        return $this->servidor;
    }

    public function setServidor(?EntityInterface $servidor): self
    {
        $this->servidor = $servidor;
        $this->setVisited('servidor');
        return $this;
    }

    public function addClassePadrao(ClassePadrao $classePadrao): self
    {
        $this->classesPadrao[] = $classePadrao;

        return $this;
    }

    public function getClassesPadrao(): array
    {
        return $this->classesPadrao;
    }

    public function getServidorCargoDesocupado(): ?EntityInterface
    {
        return $this->servidorCargoDesocupado;
    }

    public function setServidorCargoDesocupado(?EntityInterface $servidorCargoDesocupado): self
    {
        $this->servidorCargoDesocupado = $servidorCargoDesocupado;
        $this->setVisited('servidorCargoDesocupado');
        return $this;
    }

}
