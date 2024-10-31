<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DadoBancario
 */
#[ORM\Table(name: 'DADO_BANCARIO')]
#[ORM\Index(name: 'IDX_55C061D4C718FD80', columns: ['ID_AGENCIA'])]
#[ORM\Index(name: 'IDX_55C061D44C1084D8', columns: ['ID_TIPO_CONTA'])]
#[ORM\UniqueConstraint(name: 'uk_dado_bancario', columns: ['ID_TIPO_CONTA', 'ID_SERVIDOR', 'NR_CONTA', 'ID_AGENCIA', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class DadoBancario implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_DADO_BANCARIO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela DADO_BANCARIO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_DADO_BANCARIO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\Column(name: 'DT_OPCAO', type: 'date', nullable: true, options: ['comment' => 'Data em que o servidor optou pela utilização dos dados cadastrados junto ao RH. Campo não utilizado pelo sistema AGUPessoa.'])]
    protected ?DateTime $dataOpcao = null;

    #[ORM\Column(name: 'CD_OPERACAO', type: 'string', length: 10, nullable: false, options: ['comment' => 'Código da operação bancária que será efetuado ao servidor de acordo com o tipo de conta.'])]
    protected string $codigo;

    #[ORM\Column(name: 'NR_CONTA', type: 'string', length: 12, nullable: false, options: ['comment' => 'Número de identificação da conta bancária do servidor no qual será depositado seu pagamento e benefícios.'])]
    protected string $numeroConta;

    #[ORM\Column(name: 'IN_CONTA', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleando para específica se conta cadastrada está ativa ou inativa. Codificação: 0 - NÃO e 1 - SIM'])]
    protected string $inAtiva;

    #[ORM\Column(name: 'NR_DV_CONTA', type: 'string', length: 10, nullable: true, options: ['comment' => 'Número de identificação para o dígito verificador de controle para autenticação utilizada na verificação da validade e a autenticidade da conta bancária do servidor.'])]
    protected ?string $digitoConta;

    #[ORM\JoinColumn(name: 'ID_AGENCIA', referencedColumnName: 'ID_AGENCIA')]
    #[ORM\ManyToOne(targetEntity: 'Agencia')]
    protected ?Agencia $agencia;

    #[ORM\JoinColumn(name: 'ID_TIPO_CONTA', referencedColumnName: 'ID_TIPO_CONTA')]
    #[ORM\ManyToOne(targetEntity: 'TipoConta')]
    protected ?TipoConta $tipoConta;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getDataOpcao(): ?DateTime
    {
        return $this->dataOpcao;
    }

    public function setDataOpcao(?DateTime $dataOpcao): void
    {
        $this->dataOpcao = $dataOpcao;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getNumeroConta(): string
    {
        return $this->numeroConta;
    }

    public function setNumeroConta(string $numeroConta): void
    {
        $this->numeroConta = $numeroConta;
    }

    public function getInAtiva(): string
    {
        return $this->inAtiva;
    }

    public function setInAtiva(string $inAtiva): void
    {
        $this->inAtiva = $inAtiva;
    }

    public function getDigitoConta(): ?string
    {
        return $this->digitoConta;
    }

    public function setDigitoConta(?string $digitoConta): void
    {
        $this->digitoConta = $digitoConta;
    }

    public function getAgencia(): ?Agencia
    {
        return $this->agencia;
    }

    public function setAgencia(?Agencia $agencia): void
    {
        $this->agencia = $agencia;
    }

    public function getTipoConta(): ?TipoConta
    {
        return $this->tipoConta;
    }

    public function setTipoConta(?TipoConta $tipoConta): void
    {
        $this->tipoConta = $tipoConta;
    }


}
