<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * DadoPromocaoVw
 */
#[ORM\Table(name: 'DADO_PROMOCAO_VW')]
#[ORM\Entity]
class DadoPromocaoVw
{
    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_CANDIDATO', type: 'string', length: 11, nullable: false, options: ['fixed' => true])]
    private $nrCpfCandidato;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_CANDIDATO', type: 'string', length: 100, nullable: false)]
    private $nmCandidato;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_MATRICULA_SIAPE', type: 'integer', nullable: true)]
    private $nrMatriculaSiape;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CLASSE_PRECEDEU', type: 'string', length: 100, nullable: true)]
    private $dsClassePrecedeu;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_TEMPO_PRECEDEU', type: 'integer', nullable: true)]
    private $nrTempoPrecedeu;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_OUTRAS_CARREIRAS', type: 'integer', nullable: true)]
    private $nrOutrasCarreiras;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_SERV_PUBLICO_FEDERAL', type: 'integer', nullable: true)]
    private $nrServPublicoFederal;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_CLASS_DEFICIENCIA', type: 'integer', nullable: true)]
    private $nrClassDeficiencia;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_TEMPO_MESARIO', type: 'integer', nullable: true)]
    private $nrTempoMesario;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PRI_ESP', type: 'date', nullable: true)]
    private $dtPriEsp;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_SEG_PRI', type: 'date', nullable: true)]
    private $dtSegPri;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_CARREIRA', type: 'date', nullable: true, options: ['comment' => 'ESPECIFICA A DATA EM QUE O SERVIDOR INGRESSOU NA CARREIRA, OU SEJA, NO MESMO CARGO ANTES DA POSSE NA AGU.'])]
    private $dtIngressoCarreira;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'DADO_PROMOCAO_VW_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string
     */
    public function getNrCpfCandidato(): string
    {
        return $this->nrCpfCandidato;
    }

    /**
     * @param string $nrCpfCandidato
     */
    public function setNrCpfCandidato(string $nrCpfCandidato): void
    {
        $this->nrCpfCandidato = $nrCpfCandidato;
    }

    /**
     * @return string
     */
    public function getNmCandidato(): string
    {
        return $this->nmCandidato;
    }

    /**
     * @param string $nmCandidato
     */
    public function setNmCandidato(string $nmCandidato): void
    {
        $this->nmCandidato = $nmCandidato;
    }

    /**
     * @return int|null
     */
    public function getNrMatriculaSiape(): ?int
    {
        return $this->nrMatriculaSiape;
    }

    /**
     * @param int|null $nrMatriculaSiape
     */
    public function setNrMatriculaSiape(?int $nrMatriculaSiape): void
    {
        $this->nrMatriculaSiape = $nrMatriculaSiape;
    }

    /**
     * @return string|null
     */
    public function getDsClassePrecedeu(): ?string
    {
        return $this->dsClassePrecedeu;
    }

    /**
     * @param string|null $dsClassePrecedeu
     */
    public function setDsClassePrecedeu(?string $dsClassePrecedeu): void
    {
        $this->dsClassePrecedeu = $dsClassePrecedeu;
    }

    /**
     * @return int|null
     */
    public function getNrTempoPrecedeu(): ?int
    {
        return $this->nrTempoPrecedeu;
    }

    /**
     * @param int|null $nrTempoPrecedeu
     */
    public function setNrTempoPrecedeu(?int $nrTempoPrecedeu): void
    {
        $this->nrTempoPrecedeu = $nrTempoPrecedeu;
    }

    /**
     * @return int|null
     */
    public function getNrOutrasCarreiras(): ?int
    {
        return $this->nrOutrasCarreiras;
    }

    /**
     * @param int|null $nrOutrasCarreiras
     */
    public function setNrOutrasCarreiras(?int $nrOutrasCarreiras): void
    {
        $this->nrOutrasCarreiras = $nrOutrasCarreiras;
    }

    /**
     * @return int|null
     */
    public function getNrServPublicoFederal(): ?int
    {
        return $this->nrServPublicoFederal;
    }

    /**
     * @param int|null $nrServPublicoFederal
     */
    public function setNrServPublicoFederal(?int $nrServPublicoFederal): void
    {
        $this->nrServPublicoFederal = $nrServPublicoFederal;
    }

    /**
     * @return int|null
     */
    public function getNrClassDeficiencia(): ?int
    {
        return $this->nrClassDeficiencia;
    }

    /**
     * @param int|null $nrClassDeficiencia
     */
    public function setNrClassDeficiencia(?int $nrClassDeficiencia): void
    {
        $this->nrClassDeficiencia = $nrClassDeficiencia;
    }

    /**
     * @return int|null
     */
    public function getNrTempoMesario(): ?int
    {
        return $this->nrTempoMesario;
    }

    /**
     * @param int|null $nrTempoMesario
     */
    public function setNrTempoMesario(?int $nrTempoMesario): void
    {
        $this->nrTempoMesario = $nrTempoMesario;
    }

    /**
     * @return DateTime|null
     */
    public function getDtPriEsp(): ?\DateTime
    {
        return $this->dtPriEsp;
    }

    /**
     * @param DateTime|null $dtPriEsp
     */
    public function setDtPriEsp(?\DateTime $dtPriEsp): void
    {
        $this->dtPriEsp = $dtPriEsp;
    }

    /**
     * @return DateTime|null
     */
    public function getDtSegPri(): ?\DateTime
    {
        return $this->dtSegPri;
    }

    /**
     * @param DateTime|null $dtSegPri
     */
    public function setDtSegPri(?\DateTime $dtSegPri): void
    {
        $this->dtSegPri = $dtSegPri;
    }

    /**
     * @return DateTime|null
     */
    public function getDtIngressoCarreira(): ?\DateTime
    {
        return $this->dtIngressoCarreira;
    }

    /**
     * @param DateTime|null $dtIngressoCarreira
     */
    public function setDtIngressoCarreira(?\DateTime $dtIngressoCarreira): void
    {
        $this->dtIngressoCarreira = $dtIngressoCarreira;
    }

    /**
     * @return int
     */
    public function getIdTable(): int
    {
        return $this->idTable;
    }

    /**
     * @param int $idTable
     */
    public function setIdTable(int $idTable): void
    {
        $this->idTable = $idTable;
    }


}
