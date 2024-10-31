<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MotivoInterrupcao
 */
#[ORM\Table(name: 'MOTIVO_INTERRUPCAO')]
#[ORM\Entity]
class MotivoInterrupcao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_MOTIVO_INTERRUPCAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador único sequencial da tabela MOTIVO INTERRUPCAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MOTIVO_INTERRUPCAO_ID_MOTIVO_I', allocationSize: 1, initialValue: 1)]
    private $idMotivoInterrupcao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_MOTIVO_INTERRUPCAO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    private $cdMotivoInterrupcao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_MOTIVO_INTERRUPCAO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para os motivos, razão ou causa utilizada para comprovar o retorno obrigatório do servidor público.'])]
    private $dsMotivoInterrupcao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de alteração do registro. Retorna a data do sistema.'])]
    private $dtOperacaoAlteracao = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a ultima opera??ão do registro no sistema.'])]
    private $nrCpfOperador;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de exclusão lógica do registro.'])]
    private $dtOperacaoExclusao;

    /**
     * @return int
     */
    public function getIdMotivoInterrupcao(): int
    {
        return $this->idMotivoInterrupcao;
    }

    /**
     * @param int $idMotivoInterrupcao
     */
    public function setIdMotivoInterrupcao(int $idMotivoInterrupcao): void
    {
        $this->idMotivoInterrupcao = $idMotivoInterrupcao;
    }

    /**
     * @return string|null
     */
    public function getCdMotivoInterrupcao(): ?string
    {
        return $this->cdMotivoInterrupcao;
    }

    /**
     * @param string|null $cdMotivoInterrupcao
     */
    public function setCdMotivoInterrupcao(?string $cdMotivoInterrupcao): void
    {
        $this->cdMotivoInterrupcao = $cdMotivoInterrupcao;
    }

    /**
     * @return string
     */
    public function getDsMotivoInterrupcao(): string
    {
        return $this->dsMotivoInterrupcao;
    }

    /**
     * @param string $dsMotivoInterrupcao
     */
    public function setDsMotivoInterrupcao(string $dsMotivoInterrupcao): void
    {
        $this->dsMotivoInterrupcao = $dsMotivoInterrupcao;
    }

    /**
     * @return DateTime|string
     */
    public function getDtOperacaoInclusao(): \DateTime|string
    {
        return $this->dtOperacaoInclusao;
    }

    /**
     * @param DateTime|string $dtOperacaoInclusao
     */
    public function setDtOperacaoInclusao(\DateTime|string $dtOperacaoInclusao): void
    {
        $this->dtOperacaoInclusao = $dtOperacaoInclusao;
    }

    /**
     * @return DateTime|string
     */
    public function getDtOperacaoAlteracao(): \DateTime|string
    {
        return $this->dtOperacaoAlteracao;
    }

    /**
     * @param DateTime|string $dtOperacaoAlteracao
     */
    public function setDtOperacaoAlteracao(\DateTime|string $dtOperacaoAlteracao): void
    {
        $this->dtOperacaoAlteracao = $dtOperacaoAlteracao;
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
     * @return DateTime|null
     */
    public function getDtOperacaoExclusao(): ?\DateTime
    {
        return $this->dtOperacaoExclusao;
    }

    /**
     * @param DateTime|null $dtOperacaoExclusao
     */
    public function setDtOperacaoExclusao(?\DateTime $dtOperacaoExclusao): void
    {
        $this->dtOperacaoExclusao = $dtOperacaoExclusao;
    }


}
