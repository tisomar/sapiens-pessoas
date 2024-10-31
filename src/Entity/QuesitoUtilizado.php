<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuesitoUtilizado
 */
#[ORM\Table(name: 'QUESITO_UTILIZADO')]
#[ORM\Index(name: 'IDX_AE5FD5D87A3FBF54', columns: ['ID_APURACAO'])]
#[ORM\Index(name: 'IDX_AE5FD5D859E88951', columns: ['ID_QUESITO'])]
#[ORM\Entity]
class QuesitoUtilizado
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_QUESITO_UTILIZADO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único de quesitos utilizados em apurações.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'QUESITO_UTILIZADO_ID_QUESITO_U', allocationSize: 1, initialValue: 1)]
    private $idQuesitoUtilizado;

    /**
     * @var int
     */
    #[ORM\Column(name: 'NR_ORDEM', type: 'integer', nullable: false, options: ['comment' => 'Ordem de aplicação do quesito no processo de apuração.'])]
    private $nrOrdem;

    /**
     * @var string
     */
    #[ORM\Column(name: 'TP_ORDEM_AD', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Ordem de classificação dos valores  do quesito (A)scendente ou (D)escendente.'])]
    private $tpOrdemAd;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_AUTOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'CPF de quem definiu este quesito para este modelo de apuração.'])]
    private $nrCpfAutor;

    /**
     * @var Apuracao
     */
    #[ORM\JoinColumn(name: 'ID_APURACAO', referencedColumnName: 'ID_APURACAO')]
    #[ORM\ManyToOne(targetEntity: 'Apuracao')]
    private $idApuracao;

    /**
     * @var Quesito
     */
    #[ORM\JoinColumn(name: 'ID_QUESITO', referencedColumnName: 'ID_QUESITO')]
    #[ORM\ManyToOne(targetEntity: 'Quesito')]
    private $idQuesito;

    /**
     * @return int
     */
    public function getIdQuesitoUtilizado(): int
    {
        return $this->idQuesitoUtilizado;
    }

    /**
     * @param int $idQuesitoUtilizado
     */
    public function setIdQuesitoUtilizado(int $idQuesitoUtilizado): void
    {
        $this->idQuesitoUtilizado = $idQuesitoUtilizado;
    }

    /**
     * @return int
     */
    public function getNrOrdem(): int
    {
        return $this->nrOrdem;
    }

    /**
     * @param int $nrOrdem
     */
    public function setNrOrdem(int $nrOrdem): void
    {
        $this->nrOrdem = $nrOrdem;
    }

    /**
     * @return string
     */
    public function getTpOrdemAd(): string
    {
        return $this->tpOrdemAd;
    }

    /**
     * @param string $tpOrdemAd
     */
    public function setTpOrdemAd(string $tpOrdemAd): void
    {
        $this->tpOrdemAd = $tpOrdemAd;
    }

    /**
     * @return string
     */
    public function getNrCpfAutor(): string
    {
        return $this->nrCpfAutor;
    }

    /**
     * @param string $nrCpfAutor
     */
    public function setNrCpfAutor(string $nrCpfAutor): void
    {
        $this->nrCpfAutor = $nrCpfAutor;
    }

    /**
     * @return Apuracao
     */
    public function getIdApuracao(): Apuracao
    {
        return $this->idApuracao;
    }

    /**
     * @param Apuracao $idApuracao
     */
    public function setIdApuracao(Apuracao $idApuracao): void
    {
        $this->idApuracao = $idApuracao;
    }

    /**
     * @return Quesito
     */
    public function getIdQuesito(): Quesito
    {
        return $this->idQuesito;
    }

    /**
     * @param Quesito $idQuesito
     */
    public function setIdQuesito(Quesito $idQuesito): void
    {
        $this->idQuesito = $idQuesito;
    }


}
