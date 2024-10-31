<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Documentacao
 */
#[ORM\Table(name: 'DOCUMENTACAO')]
#[ORM\Index(name: 'ix_documentacao_nrdoc', columns: ['NR_DOCUMENTACAO'])]
#[ORM\Index(name: 'ix_documentacao_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_4257BE225E753652', columns: ['ID_UF_DOCUMENTACAO'])]
#[ORM\Index(name: 'IDX_4257BE224076A1EB', columns: ['ID_TIPO_DOCUMENTACAO'])]
#[ORM\UniqueConstraint(name: 'uk_documentacao', columns: ['ID_SERVIDOR', 'ID_TIPO_DOCUMENTACAO', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Documentacao implements EntityInterface
{

    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_DOCUMENTACAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela DOCUMENTACAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_DOCUMENTACAO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'IN_SITUACAO_DOCUMENTACAO', type: 'string', length: 1, nullable: false, options: ['default' => '1', 'fixed' => true, 'comment' => 'Identificador boleano que específica se a documentação cadastrada pelo servidor público está ativa ou não. Codificação: 1 - SIM ou 0 - NÃO'])]
    protected string $inSituacao = '1';

    #[ORM\Column(name: 'NR_DOCUMENTACAO', type: 'string', length: 50, nullable: false, options: ['comment' => 'Número identificador para o documento de acordo com o seu tipo cadastrado pelo servidor público.'])]
    protected string $numero;

    #[ORM\Column(name: 'DS_ORG_EXP_DOCUMENTACAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva do orgão expedidor para o documento cadastrado de acordo com o seu tipo. '])]
    protected ?string $orgaoExpedidor;

    #[ORM\Column(name: 'DT_EXP_DOCUMENTACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi expedido o documento pessoal cadastrado para o servidor público.'])]
    protected ?DateTime $dataExpedicao = null;

    #[ORM\Column(name: 'DT_VALIDADE_DOCUMENTACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorrerá o vencimento do documento cadastrado, ou seja, em que o documento cadastrado perderá a validade para o uso.'])]
    protected ?DateTime $dataValidade = null;

    #[ORM\Column(name: 'DS_CATEGORIA_DOCUMENTACAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a categoria para um tipo de documento que é a carteira de habilitação.'])]
    protected ?string $categoria = null;

    #[ORM\Column(name: 'DS_ZONA_DOCUMENTACAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Número que identifica a zona eleitoral para o título eleitoral cadastrado como documento por servidor público.'])]
    protected ?string $zonaEleitoral = null;

    #[ORM\Column(name: 'DS_SERIE_DOCUMENTACAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Número que identifica a série da carteira de trabalho cadastrado como documento por servidor público.'])]
    protected ?string $serie = null;

    #[ORM\Column(name: 'DS_SECAO_DOCUMENTACAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Número que identifica a sessão eleitoral para o título eleitoral cadastrado como documento por servidor público.'])]
    protected ?string $secaoEleitoral = null;

    #[ORM\Column(name: 'DS_ENTIDADE_CLASSE', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva que identifica a entidade de classe do servidor público. A classificação é feita através do registro profissional. Exemplo: CRA, OAB, CREA e Etc'])]
    protected ?string $entidadeClasse = null;

    #[ORM\Column(name: 'DS_REGIAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a região do certificado militar cadastrado pelo servidor público.'])]
    protected ?string $regiaoCertificadoMilitar = null;

    #[ORM\Column(name: 'NR_REGISTRO', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número que identifica o registro eleitoral para o título de eleitor cadastrado como documento por servidor público.'])]
    protected ?string $registroEleitoral = null;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_UF_DOCUMENTACAO', referencedColumnName: 'ID_UF')]
    #[ORM\ManyToOne(targetEntity: 'Uf')]
    protected ?Uf $uf;

    #[ORM\JoinColumn(name: 'ID_TIPO_DOCUMENTACAO', referencedColumnName: 'ID_TIPO_DOCUMENTACAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoDocumentacao')]
    protected ?TipoDocumentacao $tipo;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getInSituacao(): string
    {
        return $this->inSituacao;
    }

    public function setInSituacao(string $inSituacao): void
    {
        $this->inSituacao = $inSituacao;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getOrgaoExpedidor(): ?string
    {
        return $this->orgaoExpedidor;
    }

    public function setOrgaoExpedidor(?string $orgaoExpedidor): void
    {
        $this->orgaoExpedidor = $orgaoExpedidor;
    }

    public function getDataExpedicao(): ?\DateTime
    {
        return $this->dataExpedicao;
    }

    public function setDataExpedicao(?\DateTime $dataExpedicao): void
    {
        $this->dataExpedicao = $dataExpedicao;
    }

    public function getDataValidade(): ?\DateTime
    {
        return $this->dataValidade;
    }

    public function setDataValidade(?\DateTime $dataValidade): void
    {
        $this->dataValidade = $dataValidade;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(?string $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getZonaEleitoral(): ?string
    {
        return $this->zonaEleitoral;
    }

    public function setZonaEleitoral(?string $zonaEleitoral): void
    {
        $this->zonaEleitoral = $zonaEleitoral;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(?string $serie): void
    {
        $this->serie = $serie;
    }

    public function getSecaoEleitoral(): ?string
    {
        return $this->secaoEleitoral;
    }

    public function setSecaoEleitoral(?string $secaoEleitoral): void
    {
        $this->secaoEleitoral = $secaoEleitoral;
    }

    public function getEntidadeClasse(): ?string
    {
        return $this->entidadeClasse;
    }

    public function setEntidadeClasse(?string $entidadeClasse): void
    {
        $this->entidadeClasse = $entidadeClasse;
    }

    public function getRegiaoCertificadoMilitar(): ?string
    {
        return $this->regiaoCertificadoMilitar;
    }

    public function setRegiaoCertificadoMilitar(?string $regiaoCertificadoMilitar): void
    {
        $this->regiaoCertificadoMilitar = $regiaoCertificadoMilitar;
    }

    public function getRegistroEleitoral(): ?string
    {
        return $this->registroEleitoral;
    }

    public function setRegistroEleitoral(?string $registroEleitoral): void
    {
        $this->registroEleitoral = $registroEleitoral;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getUf(): ?Uf
    {
        return $this->uf;
    }

    public function setUf(?Uf $uf): void
    {
        $this->uf = $uf;
    }

    public function getTipo(): TipoDocumentacao
    {
        return $this->tipo;
    }

    public function setTipo(TipoDocumentacao $tipo): void
    {
        $this->tipo = $tipo;
    }


}
