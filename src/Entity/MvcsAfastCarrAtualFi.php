<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MvcsAfastCarrAtualFi
 */
#[ORM\Table(name: 'MVCS_AFAST_CARR_ATUAL_FI')]
#[ORM\Entity]
class MvcsAfastCarrAtualFi
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var int
     */
    #[ORM\Column(name: 'T34_COD_SERVIDOR', type: 'bigint', nullable: false)]
    private $t34CodServidor;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'T34_DT_INICIO_AFASTAMENTO', type: 'date', nullable: false)]
    private $t34DtInicioAfastamento;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'T34_DT_FIM_AFASTAMENTO', type: 'date', nullable: true)]
    private $t34DtFimAfastamento;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_REFERENCIA', type: 'date', nullable: true)]
    private $dtReferencia;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_SERVIDOR', type: 'date', nullable: true)]
    private $dtIngressoServidor;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_TIPO_AFASTAMENTO', type: 'string', length: 100, nullable: false)]
    private $dsTipoAfastamento;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'INICIO_CONSIDERADO', type: 'date', nullable: true)]
    private $inicioConsiderado;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'FIM_CONSIDERADO', type: 'date', nullable: true)]
    private $fimConsiderado;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QTD_DIAS_AFASTADO', type: 'integer', nullable: true)]
    private $qtdDiasAfastado;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MVCS_AFAST_CARR_ATUAL_FI_ID_TA', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getIdServidor(): int
    {
        return $this->idServidor;
    }

    /**
     * @param int $idServidor
     */
    public function setIdServidor(int $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return int
     */
    public function getT34CodServidor(): int
    {
        return $this->t34CodServidor;
    }

    /**
     * @param int $t34CodServidor
     */
    public function setT34CodServidor(int $t34CodServidor): void
    {
        $this->t34CodServidor = $t34CodServidor;
    }

    /**
     * @return DateTime
     */
    public function getT34DtInicioAfastamento(): \DateTime
    {
        return $this->t34DtInicioAfastamento;
    }

    /**
     * @param DateTime $t34DtInicioAfastamento
     */
    public function setT34DtInicioAfastamento(\DateTime $t34DtInicioAfastamento): void
    {
        $this->t34DtInicioAfastamento = $t34DtInicioAfastamento;
    }

    /**
     * @return DateTime|null
     */
    public function getT34DtFimAfastamento(): ?\DateTime
    {
        return $this->t34DtFimAfastamento;
    }

    /**
     * @param DateTime|null $t34DtFimAfastamento
     */
    public function setT34DtFimAfastamento(?\DateTime $t34DtFimAfastamento): void
    {
        $this->t34DtFimAfastamento = $t34DtFimAfastamento;
    }

    /**
     * @return DateTime|null
     */
    public function getDtReferencia(): ?\DateTime
    {
        return $this->dtReferencia;
    }

    /**
     * @param DateTime|null $dtReferencia
     */
    public function setDtReferencia(?\DateTime $dtReferencia): void
    {
        $this->dtReferencia = $dtReferencia;
    }

    /**
     * @return DateTime|null
     */
    public function getDtIngressoServidor(): ?\DateTime
    {
        return $this->dtIngressoServidor;
    }

    /**
     * @param DateTime|null $dtIngressoServidor
     */
    public function setDtIngressoServidor(?\DateTime $dtIngressoServidor): void
    {
        $this->dtIngressoServidor = $dtIngressoServidor;
    }

    /**
     * @return string
     */
    public function getDsTipoAfastamento(): string
    {
        return $this->dsTipoAfastamento;
    }

    /**
     * @param string $dsTipoAfastamento
     */
    public function setDsTipoAfastamento(string $dsTipoAfastamento): void
    {
        $this->dsTipoAfastamento = $dsTipoAfastamento;
    }

    /**
     * @return DateTime|null
     */
    public function getInicioConsiderado(): ?\DateTime
    {
        return $this->inicioConsiderado;
    }

    /**
     * @param DateTime|null $inicioConsiderado
     */
    public function setInicioConsiderado(?\DateTime $inicioConsiderado): void
    {
        $this->inicioConsiderado = $inicioConsiderado;
    }

    /**
     * @return DateTime|null
     */
    public function getFimConsiderado(): ?\DateTime
    {
        return $this->fimConsiderado;
    }

    /**
     * @param DateTime|null $fimConsiderado
     */
    public function setFimConsiderado(?\DateTime $fimConsiderado): void
    {
        $this->fimConsiderado = $fimConsiderado;
    }

    /**
     * @return int|null
     */
    public function getQtdDiasAfastado(): ?int
    {
        return $this->qtdDiasAfastado;
    }

    /**
     * @param int|null $qtdDiasAfastado
     */
    public function setQtdDiasAfastado(?int $qtdDiasAfastado): void
    {
        $this->qtdDiasAfastado = $qtdDiasAfastado;
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
