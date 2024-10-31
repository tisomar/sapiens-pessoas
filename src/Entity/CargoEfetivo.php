<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CargoEfetivo
 */
#[ORM\Table(name: 'CARGO_EFETIVO')]
#[ORM\Index(name: 'ix_cargoefetivo_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_1BEBF90762DC6D2D', columns: ['ID_SERVIDOR_PROC_VAGA_SUB'])]
#[ORM\Index(name: 'IDX_1BEBF90714F48F3B', columns: ['ID_CARGO'])]
#[ORM\Index(name: 'IDX_1BEBF9071BEF71F3', columns: ['ID_LOTACAO_EXERCICIO'])]
#[ORM\Index(name: 'IDX_1BEBF9073F78C42D', columns: ['ID_LOTACAO_ORIGEM'])]
#[ORM\Index(name: 'IDX_1BEBF90745626C3', columns: ['ID_PROCEDENCIA_VAGA'])]
#[ORM\Index(name: 'IDX_1BEBF90710DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_1BEBF9074FC0CA82', columns: ['ID_TIPO_OCUPACAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class CargoEfetivo implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_CARGO_EFETIVO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela CARGO_EFETIVO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_CARGO_EFETIVO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_VAGA_SIAPE', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código dado pelo RH do orgão que recebeu o Cargo disponível para ocupação. Para um cargo específico são disponibilizados x vagas, este campo especificará qual o código da vaga que o servidor estará ocupando.'])]
    protected ?string $codigoSiape;

    #[ORM\Column(name: 'IN_DIREITO_ADQUIRIDO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para especificar se o servidor possui o direito adquirido sobre o provimento do cargo. Codificação: 0 - NÃO e 1- SIM'])]
    protected ?string $inDireitoAdquirido = '0';

    #[ORM\Column(name: 'DT_INGRESSO_SERVIDOR', type: 'date', nullable: true, options: ['default' => 'SYSDATE', 'comment' => 'Data em que o servidor ingressou no orgão e recebeu o exercício do cargo efetivo.'])]
    protected ?DateTime $dataIngressoServidor;

    #[ORM\Column(name: 'NR_CONCURSO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Número de identificação do concurso no qual o servidor foi selecionado para ocupação de um cargo efetivo.'])]
    protected ?string $numeroConcurso;

    #[ORM\Column(name: 'NR_ANO_CONCURSO', type: 'integer', nullable: true, options: ['comment' => 'Ano em foi realizado o concurso no qual o servidor foi selecionado para ocupação de um cargo efetivo.'])]
    protected ?int $anoConcurso = null;

    #[ORM\Column(name: 'NR_CLASSIFICACAO_CONCURSO', type: 'integer', nullable: true, options: ['comment' => 'Número da classificação da pessoa no concurso no qual o servidor foi selecionado para ocupação de um cargo efetivo.'])]
    protected ?int $classificacaoConcurso;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro do cargo efetivo de um servidor na AGU.'])]
    protected ?string $observacao;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR_PROC_VAGA_SUB', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidorCargoDesocupado = null;

    #[ORM\JoinColumn(name: 'ID_CARGO', referencedColumnName: 'ID_CARGO')]
    #[ORM\ManyToOne(targetEntity: 'Cargo')]
    protected Cargo $cargo;

    #[ORM\JoinColumn(name: 'ID_LOTACAO_EXERCICIO', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    protected ?Lotacao $lotacaoExercicio;

    #[ORM\JoinColumn(name: 'ID_LOTACAO_ORIGEM', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    protected ?Lotacao $lotacaoOrigem;

    #[ORM\JoinColumn(name: 'ID_PROCEDENCIA_VAGA', referencedColumnName: 'ID_PROCEDENCIA_VAGA')]
    #[ORM\ManyToOne(targetEntity: 'ProcedenciaVaga')]
    protected ?ProcedenciaVaga $procedenciaVaga;

    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $rh;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_TIPO_OCUPACAO', referencedColumnName: 'ID_TIPO_OCUPACAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoOcupacao')]
    protected ?TipoOcupacao $tipoOcupacao;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<ClassePadrao>
     */
    #[ORM\OneToMany(mappedBy: 'cargoEfetivo', targetEntity: 'ClassePadrao')]
    protected $classesPadrao;

    public function __construct()
    {
        $this->classesPadrao = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCodigoSiape(): ?string
    {
        return $this->codigoSiape;
    }

    public function setCodigoSiape(?string $codigoSiape): void
    {
        $this->codigoSiape = $codigoSiape;
    }

    public function getInDireitoAdquirido(): string
    {
        return $this->inDireitoAdquirido;
    }

    public function setInDireitoAdquirido(string $inDireitoAdquirido): void
    {
        $this->inDireitoAdquirido = $inDireitoAdquirido;
    }

    public function getDataIngressoServidor(): ?DateTime
    {
        return $this->dataIngressoServidor;
    }

    public function setDataIngressoServidor(?DateTime $dataIngressoServidor): void
    {
        $this->dataIngressoServidor = $dataIngressoServidor;
    }

    public function getNumeroConcurso(): ?string
    {
        return $this->numeroConcurso;
    }

    public function setNumeroConcurso(?string $numeroConcurso): void
    {
        $this->numeroConcurso = $numeroConcurso;
    }

    public function getAnoConcurso(): ?int
    {
        return $this->anoConcurso;
    }

    public function setAnoConcurso(?int $anoConcurso): void
    {
        $this->anoConcurso = $anoConcurso;
    }

    public function getClassificacaoConcurso(): ?int
    {
        return $this->classificacaoConcurso;
    }

    public function setClassificacaoConcurso(?int $classificacaoConcurso): void
    {
        $this->classificacaoConcurso = $classificacaoConcurso;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    public function setCargo(Cargo $cargo): void
    {
        $this->cargo = $cargo;
    }

    public function getLotacaoExercicio(): ?Lotacao
    {
        return $this->lotacaoExercicio;
    }

    public function setLotacaoExercicio(?Lotacao $lotacaoExercicio): void
    {
        $this->lotacaoExercicio = $lotacaoExercicio;
    }

    public function getLotacaoOrigem(): ?Lotacao
    {
        return $this->lotacaoOrigem;
    }

    public function setLotacaoOrigem(?Lotacao $lotacaoOrigem): void
    {
        $this->lotacaoOrigem = $lotacaoOrigem;
    }

    public function getProcedenciaVaga(): ?ProcedenciaVaga
    {
        return $this->procedenciaVaga;
    }

    public function setProcedenciaVaga(?ProcedenciaVaga $procedenciaVaga): void
    {
        $this->procedenciaVaga = $procedenciaVaga;
    }

    public function getRh(): ?Rh
    {
        return $this->rh;
    }

    public function setRh(?Rh $rh): void
    {
        $this->rh = $rh;
    }

    public function getServidorCargoDesocupado(): ?Servidor
    {
        return $this->servidorCargoDesocupado;
    }

    public function setServidorCargoDesocupado(?Servidor $servidorCargoDesocupado): void
    {
        $this->servidorCargoDesocupado = $servidorCargoDesocupado;
    }

    public function getTipoOcupacao(): ?TipoOcupacao
    {
        return $this->tipoOcupacao;
    }

    public function setTipoOcupacao(?TipoOcupacao $tipoOcupacao): void
    {
        $this->tipoOcupacao = $tipoOcupacao;
    }

    public function removeClassePadrao(ClassePadrao $classePadrao): self
    {
        if ($this->classesPadrao->contains($classePadrao)) {
            $this->classesPadrao->removeElement($classePadrao);
        }

        return $this;
    }

    public function getClassesPadrao(): Collection
    {
        return $this->classesPadrao;
    }


}
