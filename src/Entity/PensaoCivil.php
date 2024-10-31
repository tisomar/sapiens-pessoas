<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * PensaoCivil
 */
#[ORM\Table(name: 'PENSAO_CIVIL')]
#[ORM\Index(name: 'ix_pensaocivil_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_4E1E807411ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_4E1E80746EE8AC13', columns: ['ID_REPRESENTANTE_LEGAL'])]
#[ORM\Index(name: 'IDX_4E1E807410DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_4E1E8074B0217B18', columns: ['ID_SERVIDOR_BENEFICIARIO'])]
#[ORM\Index(name: 'IDX_4E1E80747052B008', columns: ['ID_TIPO_PARENTESCO'])]
#[ORM\Index(name: 'IDX_4E1E80749805A6DC', columns: ['ID_UF_CARTORIO'])]
#[ORM\Index(name: 'IDX_4E1E8074D2873579', columns: ['ID_NATUREZA_PENSAO'])]
#[ORM\UniqueConstraint(name: 'uk_pensao_civil', columns: ['ID_SERVIDOR', 'ID_SERVIDOR_BENEFICIARIO', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class PensaoCivil implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_PENSAO_CIVIL', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela PENSAO_CIVIL.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_PENSAO_CIVIL', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'NR_PERCENTUAL_PENSAO', type: 'decimal', precision: 7, scale: 2, nullable: true, options: ['comment' => 'Número identificando o percentual do salário pago ao beneficiário como pensão civil.'])]
    protected ?float $percentual = null;

    #[ORM\Column(name: 'DT_INICIO_PENSAO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi concedido o início do pagamento do benefício de pensão civil.'])]
    protected ?DateTime $dataInicio = null;

    #[ORM\Column(name: 'DT_CESSACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi encerrado o pagamento do benefício de pensão civil ao beneficiário.'])]
    protected ?DateTime $dataFim = null;

    #[ORM\Column(name: 'DS_ATO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva do ato administrativo autorizando e declarando a concessão do benefício de pensão civil.'])]
    protected ?string $ato = null;

    #[ORM\Column(name: 'DT_ATO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi publicado o ato administrativo autorizando e declarando a concessão do benefício de pensão civil.'])]
    protected ?DateTime $dataAto = null;

    #[ORM\Column(name: 'NM_REPRES_LEGAL', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome do representante legal do beneficiário pensionista em caso de menor idade.'])]
    protected ?string $nomeRepresentanteLegal = null;

    #[ORM\Column(name: 'DS_CARTORIO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a identificação do cartório em foi registrado a documentação do instituídor e beneficiário de pensão civil. Ex: óbto de instituídor (Servidor)'])]
    protected ?string $cartorio = null;

    #[ORM\Column(name: 'DS_LIVRO_REG_CARTORIO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a identificação do Livro em que foi registrado as informações do instituídor ou beneficiário de pensão civil em um cartório.'])]
    protected ?string $livroRegistroCartorio = null;

    #[ORM\Column(name: 'DS_FOLHA_REG_CARTORIO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a identificação da folha em que foi registrado as informações do instituídor ou beneficiário de pensão civil em um cartório.'])]
    protected ?string $folhaRegistroCartorio = null;

    #[ORM\Column(name: 'DT_INICIO_PROCURACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que começa a validade da procuração fornecida pelo representante legal de um beneficiário de pensão civil.'])]
    protected ?DateTime $dataInicioProcuracao = null;

    #[ORM\Column(name: 'DT_FIM_PROCURACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que termina a validade da procuração fornecida pelo representante legal de um beneficiário de pensão civil.'])]
    protected ?DateTime $dataFimProcuracao = null;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma = null;

    #[ORM\JoinColumn(name: 'ID_REPRESENTANTE_LEGAL', referencedColumnName: 'ID_REPRESENTANTE_LEGAL')]
    #[ORM\ManyToOne(targetEntity: 'RepresentanteLegal')]
    protected ?RepresentanteLegal $tipoRepresentanteLegal = null;

    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $rh = null;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor = null;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR_BENEFICIARIO', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidorBeneficiario = null;

    #[ORM\JoinColumn(name: 'ID_TIPO_PARENTESCO', referencedColumnName: 'ID_TIPO_PARENTESCO')]
    #[ORM\ManyToOne(targetEntity: 'TipoParentesco')]
    protected ?TipoParentesco $tipoParentesco = null;

    #[ORM\JoinColumn(name: 'ID_UF_CARTORIO', referencedColumnName: 'ID_UF')]
    #[ORM\ManyToOne(targetEntity: 'Uf')]
    protected ?Uf $ufCartorio = null;


    #[ORM\JoinColumn(name: 'ID_NATUREZA_PENSAO', referencedColumnName: 'ID_NATUREZA_PENSAO')]
    #[ORM\ManyToOne(targetEntity: 'NaturezaPensaocivil')]
    protected ?NaturezaPensaocivil $natureza = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPercentual(): ?float
    {
        return $this->percentual;
    }

    public function setPercentual(?float $percentual): void
    {
        $this->percentual = $percentual;
    }

    public function getDataInicio(): ?DateTime
    {
        return $this->dataInicio;
    }

    public function setDataInicio(?DateTime $dataInicio): void
    {
        $this->dataInicio = $dataInicio;
    }

    public function getDataFim(): ?DateTime
    {
        return $this->dataFim;
    }

    public function setDataFim(?DateTime $dataFim): void
    {
        $this->dataFim = $dataFim;
    }

    public function getAto(): ?string
    {
        return $this->ato;
    }

    public function setAto(?string $ato): void
    {
        $this->ato = $ato;
    }

    public function getDataAto(): ?DateTime
    {
        return $this->dataAto;
    }

    public function setDataAto(?DateTime $dataAto): void
    {
        $this->dataAto = $dataAto;
    }

    public function getNomeRepresentanteLegal(): ?string
    {
        return $this->nomeRepresentanteLegal;
    }

    public function setNomeRepresentanteLegal(?string $nomeRepresentanteLegal): void
    {
        $this->nomeRepresentanteLegal = $nomeRepresentanteLegal;
    }

    public function getCartorio(): ?string
    {
        return $this->cartorio;
    }

    public function setCartorio(?string $cartorio): void
    {
        $this->cartorio = $cartorio;
    }

    public function getLivroRegistroCartorio(): ?string
    {
        return $this->livroRegistroCartorio;
    }

    public function setLivroRegistroCartorio(?string $livroRegistroCartorio): void
    {
        $this->livroRegistroCartorio = $livroRegistroCartorio;
    }

    public function getFolhaRegistroCartorio(): ?string
    {
        return $this->folhaRegistroCartorio;
    }

    public function setFolhaRegistroCartorio(?string $folhaRegistroCartorio): void
    {
        $this->folhaRegistroCartorio = $folhaRegistroCartorio;
    }

    public function getDataInicioProcuracao(): ?DateTime
    {
        return $this->dataInicioProcuracao;
    }

    public function setDataInicioProcuracao(?DateTime $dataInicioProcuracao): void
    {
        $this->dataInicioProcuracao = $dataInicioProcuracao;
    }

    public function getDataFimProcuracao(): ?DateTime
    {
        return $this->dataFimProcuracao;
    }

    public function setDataFimProcuracao(?DateTime $dataFimProcuracao): void
    {
        $this->dataFimProcuracao = $dataFimProcuracao;
    }

    public function getNorma(): ?Norma
    {
        return $this->norma;
    }

    public function setNorma(?Norma $norma): void
    {
        $this->norma = $norma;
    }

    public function getTipoRepresentanteLegal(): ?RepresentanteLegal
    {
        return $this->tipoRepresentanteLegal;
    }

    public function setTipoRepresentanteLegal(?RepresentanteLegal $tipoRepresentanteLegal): void
    {
        $this->tipoRepresentanteLegal = $tipoRepresentanteLegal;
    }

    public function getRh(): ?Rh
    {
        return $this->rh;
    }

    public function setRh(?Rh $rh): void
    {
        $this->rh = $rh;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getServidorBeneficiario(): ?Servidor
    {
        return $this->servidorBeneficiario;
    }

    public function setServidorBeneficiario(?Servidor $servidorBeneficiario): void
    {
        $this->servidorBeneficiario = $servidorBeneficiario;
    }

    public function getTipoParentesco(): ?TipoParentesco
    {
        return $this->tipoParentesco;
    }

    public function setTipoParentesco(?TipoParentesco $tipoParentesco): void
    {
        $this->tipoParentesco = $tipoParentesco;
    }

    public function getUfCartorio(): ?Uf
    {
        return $this->ufCartorio;
    }

    public function setUfCartorio(?Uf $ufCartorio): void
    {
        $this->ufCartorio = $ufCartorio;
    }

    public function getNatureza(): ?NaturezaPensaocivil
    {
        return $this->natureza;
    }

    public function setNatureza(?NaturezaPensaocivil $natureza): void
    {
        $this->natureza = $natureza;
    }


}
