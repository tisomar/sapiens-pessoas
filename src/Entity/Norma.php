<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Norma
 */
#[ORM\Table(name: 'NORMA')]
#[ORM\Index(name: 'IDX_C9A2E3CE5CBF5951', columns: ['ID_BASE_LEGAL'])]
#[ORM\Index(name: 'IDX_C9A2E3CECFE3E11B', columns: ['ID_TIPO_AUTORIDADE'])]
#[ORM\Index(name: 'IDX_C9A2E3CE6EAFA02', columns: ['ID_TIPO_PUBLICACAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Norma implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_NORMA', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela NORMA.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'NORMA_ID_NORMA_seq', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'ID_SISTEMA', type: 'integer', nullable: false, options: ['comment' => 'Identificador para o sistema que utilizará a norma (Ato). Atualmente só o sistema AGUPessoas está cadastrado.'])]
    protected int $idSistema;

    #[ORM\Column(name: 'CD_NORMA', type: 'string', length: 11, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected ?string $codigo;

    #[ORM\Column(name: 'NR_DOCUMENTO_NORMA', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número de identificação do documento ou ato administrativo no sentido estrito e efetiva o pressuposto fático contido na norma jurídica.'])]
    protected ?string $numeroDocumento;

    #[ORM\Column(name: 'DT_DOCUMENTO_NORMA', type: 'date', nullable: true, options: ['comment' => 'Data em que o documento foi criado para os atos administrativos.'])]
    protected ?DateTime $dataDocumento;

    #[ORM\Column(name: 'NR_PUBLICACAO_NORMA', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número gerado para identificação da publicação do documento dos atos administrativos.'])]
    protected ?string $numeroPublicacao;

    #[ORM\Column(name: 'DT_PUBLICACAO_NORMA', type: 'date', nullable: true, options: ['comment' => 'Data em foi feita a publicação do documento gerado para os atos administrativos.'])]
    protected ?DateTime $dataPublicacao;

    #[ORM\Column(name: 'DS_PROCESSO_NORMA', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o processo, no contexto jurídico, previsto em lei.'])]
    protected ?string $processo;

    #[ORM\Column(name: 'DT_PROCESSO_NORMA', type: 'date', nullable: true, options: ['comment' => '"Dataemquehouveoparecerfinalparaoprocessoadministrativodeclarandoasdecisõeslegaisparaanorma'])]
    protected ?DateTime $dataProcesso;

    #[ORM\Column(name: 'DS_OBSERVACAO_NORMA', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de norma (Atos Administrativo) na AGU.'])]
    protected ?string $observacao;

    #[ORM\Column(name: 'IN_TIPO_NORMA', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador que especifica se o tipo da norma ODS / UDP é de início (I) ou fim (F).'])]
    protected ?string $inTipoNorma;

    #[ORM\JoinColumn(name: 'ID_BASE_LEGAL', referencedColumnName: 'ID_BASE_LEGAL')]
    #[ORM\ManyToOne(targetEntity: 'BaseLegal')]
    protected ?BaseLegal $baseLegal;

    #[ORM\JoinColumn(name: 'ID_TIPO_AUTORIDADE', referencedColumnName: 'ID_TIPO_AUTORIDADE')]
    #[ORM\ManyToOne(targetEntity: 'TipoAutoridade')]
    protected ?TipoAutoridade $tipoAutoridade;

    #[ORM\JoinColumn(name: 'ID_TIPO_PUBLICACAO', referencedColumnName: 'ID_TIPO_PUBLICACAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoPublicacao')]
    protected ?TipoPublicacao $tipoPublicacao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdSistema(): int
    {
        return $this->idSistema;
    }

    /**
     * @param int $idSistema
     */
    public function setIdSistema(int $idSistema): void
    {
        $this->idSistema = $idSistema;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getNumeroDocumento(): ?string
    {
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento(?string $numeroDocumento): void
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function getDataDocumento(): ?\DateTime
    {
        return $this->dataDocumento;
    }

    public function setDataDocumento(?\DateTime $dataDocumento): void
    {
        $this->dataDocumento = $dataDocumento;
    }

    public function getNumeroPublicacao(): ?string
    {
        return $this->numeroPublicacao;
    }

    public function setNumeroPublicacao(?string $numeroPublicacao): void
    {
        $this->numeroPublicacao = $numeroPublicacao;
    }

    public function getDataPublicacao(): ?DateTime
    {
        return $this->dataPublicacao;
    }

    public function setDataPublicacao(?DateTime $dataPublicacao): void
    {
        $this->dataPublicacao = $dataPublicacao;
    }

    public function getProcesso(): ?string
    {
        return $this->processo;
    }

    public function setProcesso(?string $processo): void
    {
        $this->processo = $processo;
    }

    public function getDataProcesso(): ?\DateTime
    {
        return $this->dataProcesso;
    }

    public function setDataProcesso(?\DateTime $dataProcesso): void
    {
        $this->dataProcesso = $dataProcesso;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getInTipoNorma(): ?string
    {
        return $this->inTipoNorma;
    }

    public function setInTipoNorma(?string $inTipoNorma): void
    {
        $this->inTipoNorma = $inTipoNorma;
    }

    public function getBaseLegal(): ?BaseLegal
    {
        return $this->baseLegal;
    }

    public function setBaseLegal(?BaseLegal $baseLegal): void
    {
        $this->baseLegal = $baseLegal;
    }

    public function getTipoAutoridade(): ?TipoAutoridade
    {
        return $this->tipoAutoridade;
    }

    public function setTipoAutoridade(?TipoAutoridade $tipoAutoridade): void
    {
        $this->tipoAutoridade = $tipoAutoridade;
    }

    public function getTipoPublicacao(): ?TipoPublicacao
    {
        return $this->tipoPublicacao;
    }

    public function setTipoPublicacao(?TipoPublicacao $tipoPublicacao): void
    {
        $this->tipoPublicacao = $tipoPublicacao;
    }


}
