<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Dependente
 */
#[ORM\Table(name: 'DEPENDENTE')]
#[ORM\Index(name: 'ix_depedente_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_354590E3DB7962B0', columns: ['ID_MUNICIPIO_CERTIDAO'])]
#[ORM\Index(name: 'IDX_354590E37052B008', columns: ['ID_TIPO_PARENTESCO'])]
#[ORM\Index(name: 'IDX_354590E34F2DA3D4', columns: ['ID_TIPO_SANGUINEO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Dependente implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_DEPENDENTE', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela DEPENDENTE.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_DEPENDENTE', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\Column(name: 'NM_DEPENDENTE', type: 'string', length: 70, nullable: false, options: ['comment' => 'Nome completo do dependente cadastrado para um servidor. O nome do dependente conforme descrito no seu documento de identificação.'])]
    protected string $nome;

    #[ORM\Column(name: 'DT_NASCIMENTO', type: 'date', nullable: false, options: ['comment' => 'Data do nascimento do dependente de um servidor conforme a descrição em sua certidão de nascimento.'])]
    protected DateTime $dataNascimento;

    #[ORM\Column(name: 'CD_SEXO', type: 'string', length: 1, nullable: false, options: ['comment' => 'Código identificando o sexo do dependente: Masculino ou Feminino.'])]
    protected string $sexo;

    #[ORM\Column(name: 'NR_CPF', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Número do CPF do dependente. Cadastro de pessoa física.'])]
    protected ?string $cpfDependente = null;

    #[ORM\Column(name: 'DT_CASAMENTO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi declarado o casamento do dependente conforme sua certidão de casamento. Isso implicará na assistência prestada pela AGU ao depentende.'])]
    protected ?DateTime $dataCasamento = null;

    #[ORM\Column(name: 'NM_PAI_DEPENDENTE', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome do pai do dependente declarado conforme a certidão de nascimento do dependente.'])]
    protected ?string $pai = null;

    #[ORM\Column(name: 'NM_MAE_DEPENDENTE', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome da mãe do dependente declarado conforme a certidão de nascimento do dependente.'])]
    protected ?string $mae = null;

    #[ORM\Column(name: 'DT_INICIO_DEPENDENTE', type: 'date', nullable: true, options: ['comment' => 'Data/Hora em que foi declarado o início da assístência ao dependente, ou seja, em que o dependente entrou na folha de benefícios da AGU.'])]
    protected ?DateTime $dataInicio = null;

    #[ORM\Column(name: 'DT_FIM_DEPENDENTE', type: 'date', nullable: true, options: ['comment' => 'Data/Hora em que foi declarado o fim da assístência ao dependente, ou seja, em que o dependente saiu da folha de benefícios da AGU.'])]
    protected ?DateTime $dataFim = null;

    #[ORM\Column(name: 'DS_MOTIVO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o motivo que levou ao fim dos benefícios pagos ao dependente pela AGU.'])]
    protected ?string $motivoFim = null;

    #[ORM\Column(name: 'DT_CERTIDAO_NASCIMENTO', type: 'date', nullable: true, options: ['comment' => 'Data/Hora em que foi registrada a certidão de nascimento do dependente de um servidor público.'])]
    protected ?DateTime $dataCertidaoNascimento = null;

    #[ORM\Column(name: 'NR_CERTIDAO_NASCIMENTO', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número dado pelo cartório para o registro da certidão de nascimento do dependente de um servidor público.'])]
    protected ?string $numeroCertidaoNascimento = null;

    #[ORM\Column(name: 'DS_LIVRO_CERTIDAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a identificação do Livro em que o cartório registrou as informações da certidão de nascimento do dependente de um servidor público.'])]
    protected ?string $livroCertidaoNascimento = null;

    #[ORM\Column(name: 'DS_FOLHA_CERTIDAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a identificação da Folha/Livro em o cartório registrou as informações da certidão de nascimento do dependente de um servidor público.'])]
    protected ?string $folhaCertidaoNascimento;

    #[ORM\Column(name: 'DS_CARTORIO_CERTIDAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a identificação do cartório em foi registrado a certidão de nascimento do dependente de um servidor público.'])]
    protected ?string $cartorioCertidaoNascimento = null;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro dos dependentes de um servidor na AGU.'])]
    protected ?string $observacao = null;

    #[ORM\JoinColumn(name: 'ID_MUNICIPIO_CERTIDAO', referencedColumnName: 'ID_MUNICIPIO')]
    #[ORM\ManyToOne(targetEntity: 'Municipio')]
    protected ?Municipio $municipioCertidaoNascimento;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_TIPO_PARENTESCO', referencedColumnName: 'ID_TIPO_PARENTESCO')]
    #[ORM\ManyToOne(targetEntity: 'TipoParentesco')]
    protected ?TipoParentesco $tipoParentesco;

    #[ORM\JoinColumn(name: 'ID_TIPO_SANGUINEO', referencedColumnName: 'ID_TIPO_SANGUINEO')]
    #[ORM\ManyToOne(targetEntity: 'TipoSanguineo')]
    protected ?TipoSanguineo $tipoSanguineo = null;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getDataNascimento(): DateTime
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getSexo(): string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }

    public function getCpfDependente(): ?string
    {
        return $this->cpfDependente;
    }

    public function setCpfDependente(?string $cpfDependente): void
    {
        $this->cpfDependente = $cpfDependente;
    }

    public function getDataCasamento(): ?DateTime
    {
        return $this->dataCasamento;
    }

    public function setDataCasamento(?DateTime $dataCasamento): void
    {
        $this->dataCasamento = $dataCasamento;
    }

    public function getPai(): ?string
    {
        return $this->pai;
    }

    public function setPai(?string $pai): void
    {
        $this->pai = $pai;
    }

    public function getMae(): ?string
    {
        return $this->mae;
    }

    public function setMae(?string $mae): void
    {
        $this->mae = $mae;
    }

    public function getDataInicio(): ?\DateTime
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

    public function getMotivoFim(): ?string
    {
        return $this->motivoFim;
    }

    public function setMotivoFim(?string $motivoFim): void
    {
        $this->motivoFim = $motivoFim;
    }

    public function getDataCertidaoNascimento(): ?\DateTime
    {
        return $this->dataCertidaoNascimento;
    }

    public function setDataCertidaoNascimento(?\DateTime $dataCertidaoNascimento): void
    {
        $this->dataCertidaoNascimento = $dataCertidaoNascimento;
    }

    public function getNumeroCertidaoNascimento(): ?string
    {
        return $this->numeroCertidaoNascimento;
    }

    public function setNumeroCertidaoNascimento(?string $numeroCertidaoNascimento): void
    {
        $this->numeroCertidaoNascimento = $numeroCertidaoNascimento;
    }

    public function getLivroCertidaoNascimento(): ?string
    {
        return $this->livroCertidaoNascimento;
    }

    public function setLivroCertidaoNascimento(?string $livroCertidaoNascimento): void
    {
        $this->livroCertidaoNascimento = $livroCertidaoNascimento;
    }

    public function getFolhaCertidaoNascimento(): ?string
    {
        return $this->folhaCertidaoNascimento;
    }

    public function setFolhaCertidaoNascimento(?string $folhaCertidaoNascimento): void
    {
        $this->folhaCertidaoNascimento = $folhaCertidaoNascimento;
    }

    public function getCartorioCertidaoNascimento(): ?string
    {
        return $this->cartorioCertidaoNascimento;
    }

    public function setCartorioCertidaoNascimento(?string $cartorioCertidaoNascimento): void
    {
        $this->cartorioCertidaoNascimento = $cartorioCertidaoNascimento;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getMunicipioCertidaoNascimento(): ?Municipio
    {
        return $this->municipioCertidaoNascimento;
    }

    public function setMunicipioCertidaoNascimento(?Municipio $municipioCertidaoNascimento): void
    {
        $this->municipioCertidaoNascimento = $municipioCertidaoNascimento;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getTipoParentesco(): ?TipoParentesco
    {
        return $this->tipoParentesco;
    }

    public function setTipoParentesco(?TipoParentesco $tipoParentesco): void
    {
        $this->tipoParentesco = $tipoParentesco;
    }

    public function getTipoSanguineo(): ?TipoSanguineo
    {
        return $this->tipoSanguineo;
    }

    public function setTipoSanguineo(?TipoSanguineo $tipoSanguineo): void
    {
        $this->tipoSanguineo = $tipoSanguineo;
    }

}
