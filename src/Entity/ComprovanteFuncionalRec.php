<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComprovanteFuncionalRec
 */
#[ORM\Table(name: 'COMPROVANTE_FUNCIONAL_REC')]
#[ORM\Index(name: 'ix_comrpovante_dadofunc', columns: ['ID_DADO_FUNCIONAL_REC'])]
#[ORM\Index(name: 'ix_comrpovante_midia_funcional', columns: ['ID_MIDIA'])]
#[ORM\Entity]
class ComprovanteFuncionalRec
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_COMPROVANTE_FUNCIONAL_REC', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que representa um registro na tabela COMPROVANTE_FUNCIONAL_REC.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'COMPROVANTE_FUNCIONAL_REC_ID_C', allocationSize: 1, initialValue: 1)]
    private $idComprovanteFuncionalRec;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_MIDIA', type: 'integer', nullable: false, options: ['comment' => 'Identificador único das mídias armazenadas no AGU_MIDIA, ou seja, serão os comprovantes dos documentos informados no ato do recadastramento pelo servidor público.'])]
    private $idMidia;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_INCLUSAO_COMPROVANTE', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Data em que foi incluído o registro contendo as informações dos comprovantes de um servidor armazenado no AGU_MIDIA.'])]
    private $dtInclusaoComprovante = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_TIPO_COMPROVANTE', type: 'string', length: 2, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador para tipificação dos comprovantes armazenados no mídia pelos servidores. Segue exemplos para representação: 1 - '])]
    private $inTipoComprovante;

    /**
     * @var DadoFuncionalRec
     */
    #[ORM\JoinColumn(name: 'ID_DADO_FUNCIONAL_REC', referencedColumnName: 'ID_DADO_FUNCIONAL_REC')]
    #[ORM\ManyToOne(targetEntity: 'DadoFuncionalRec')]
    private $idDadoFuncionalRec;

    /**
     * @return int
     */
    public function getIdComprovanteFuncionalRec(): int
    {
        return $this->idComprovanteFuncionalRec;
    }

    /**
     * @param int $idComprovanteFuncionalRec
     */
    public function setIdComprovanteFuncionalRec(int $idComprovanteFuncionalRec): void
    {
        $this->idComprovanteFuncionalRec = $idComprovanteFuncionalRec;
    }

    /**
     * @return int
     */
    public function getIdMidia(): int
    {
        return $this->idMidia;
    }

    /**
     * @param int $idMidia
     */
    public function setIdMidia(int $idMidia): void
    {
        $this->idMidia = $idMidia;
    }

    /**
     * @return DateTime|string
     */
    public function getDtInclusaoComprovante(): \DateTime|string
    {
        return $this->dtInclusaoComprovante;
    }

    /**
     * @param DateTime|string $dtInclusaoComprovante
     */
    public function setDtInclusaoComprovante(\DateTime|string $dtInclusaoComprovante): void
    {
        $this->dtInclusaoComprovante = $dtInclusaoComprovante;
    }

    /**
     * @return string
     */
    public function getInTipoComprovante(): string
    {
        return $this->inTipoComprovante;
    }

    /**
     * @param string $inTipoComprovante
     */
    public function setInTipoComprovante(string $inTipoComprovante): void
    {
        $this->inTipoComprovante = $inTipoComprovante;
    }

    /**
     * @return DadoFuncionalRec
     */
    public function getIdDadoFuncionalRec(): DadoFuncionalRec
    {
        return $this->idDadoFuncionalRec;
    }

    /**
     * @param DadoFuncionalRec $idDadoFuncionalRec
     */
    public function setIdDadoFuncionalRec(DadoFuncionalRec $idDadoFuncionalRec): void
    {
        $this->idDadoFuncionalRec = $idDadoFuncionalRec;
    }


}
