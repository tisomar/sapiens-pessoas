<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeloApuracaoQuesito
 */
#[ORM\Table(name: 'MODELO_APURACAO_QUESITO')]
#[ORM\Index(name: 'IDX_6499CF26214B6203', columns: ['ID_MODELO_APURACAO'])]
#[ORM\Index(name: 'IDX_6499CF2659E88951', columns: ['ID_QUESITO'])]
#[ORM\Entity]
class ModeloApuracaoQuesito
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_MODELO_APURACAO_QUESITO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único para registrar a associação entre um Modelo de Apuração e um Quesito.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MODELO_APURACAO_QUESITO_ID_MOD', allocationSize: 1, initialValue: 1)]
    private $idModeloApuracaoQuesito;

    /**
     * @var int
     */
    #[ORM\Column(name: 'NR_ORDEM', type: 'integer', nullable: false, options: ['comment' => 'Numeração sequencial dos quesitos dentro de cada Modelo de Apuração. Esta numeração define a ordem de aplicação dos quesitos no processo de classifica???ão.'])]
    private $nrOrdem;

    /**
     * @var string
     */
    #[ORM\Column(name: 'TP_ORDEM_AD', type: 'string', length: 1, nullable: false, options: ['default' => 'D', 'fixed' => true, 'comment' => 'Tipo de ordenação a ser dada ao quesito no processo de classificação. Pode ser (A) Ascendente   ou (D) Descendente.'])]
    private $tpOrdemAd = 'D';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'CPF de quem incluiu ou alterou a opção. Existe para fins de auditoria.'])]
    private $nrCpfOperador;

    /**
     * @var ModeloApuracao
     */
    #[ORM\JoinColumn(name: 'ID_MODELO_APURACAO', referencedColumnName: 'ID_MODELO_APURACAO')]
    #[ORM\ManyToOne(targetEntity: 'ModeloApuracao')]
    private $idModeloApuracao;

    /**
     * @var Quesito
     */
    #[ORM\JoinColumn(name: 'ID_QUESITO', referencedColumnName: 'ID_QUESITO')]
    #[ORM\ManyToOne(targetEntity: 'Quesito')]
    private $idQuesito;

    /**
     * @return int
     */
    public function getIdModeloApuracaoQuesito(): int
    {
        return $this->idModeloApuracaoQuesito;
    }

    /**
     * @param int $idModeloApuracaoQuesito
     */
    public function setIdModeloApuracaoQuesito(int $idModeloApuracaoQuesito): void
    {
        $this->idModeloApuracaoQuesito = $idModeloApuracaoQuesito;
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
    public function getNrCpfOperador(): string
    {
        return $this->nrCpfOperador;
    }

    /**
     * @param string $nrCpfOperador
     */
    public function setNrCpfOperador(string $nrCpfOperador): void
    {
        $this->nrCpfOperador = $nrCpfOperador;
    }

    /**
     * @return ModeloApuracao
     */
    public function getIdModeloApuracao(): ModeloApuracao
    {
        return $this->idModeloApuracao;
    }

    /**
     * @param ModeloApuracao $idModeloApuracao
     */
    public function setIdModeloApuracao(ModeloApuracao $idModeloApuracao): void
    {
        $this->idModeloApuracao = $idModeloApuracao;
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
