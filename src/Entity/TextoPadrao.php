<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TextoPadrao
 */
#[ORM\Table(name: 'TEXTO_PADRAO')]
#[ORM\Index(name: 'IDX_5EB8E39712423232', columns: ['ID_TIPO_ASSUNTO'])]
#[ORM\Entity]
class TextoPadrao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TEXTO_PADRAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador único sequencial para o Texto Padrão.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TEXTO_PADRAO_ID_TEXTO_PADRAO_s', allocationSize: 1, initialValue: 1)]
    private $idTextoPadrao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_TEXTO_PADRAO', type: 'string', length: 4000, nullable: false, options: ['comment' => 'Texto padrão na íntegra.'])]
    private $dsTextoPadrao;

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
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a ultima operação do registro no sistema.'])]
    private $nrCpfOperador;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de exclusão lógica do registro.'])]
    private $dtOperacaoExclusao;

    /**
     * @var TipoAssunto
     */
    #[ORM\JoinColumn(name: 'ID_TIPO_ASSUNTO', referencedColumnName: 'ID_TIPO_ASSUNTO')]
    #[ORM\ManyToOne(targetEntity: 'TipoAssunto')]
    private $idTipoAssunto;

    /**
     * @return int
     */
    public function getIdTextoPadrao(): int
    {
        return $this->idTextoPadrao;
    }

    /**
     * @param int $idTextoPadrao
     */
    public function setIdTextoPadrao(int $idTextoPadrao): void
    {
        $this->idTextoPadrao = $idTextoPadrao;
    }

    /**
     * @return string
     */
    public function getDsTextoPadrao(): string
    {
        return $this->dsTextoPadrao;
    }

    /**
     * @param string $dsTextoPadrao
     */
    public function setDsTextoPadrao(string $dsTextoPadrao): void
    {
        $this->dsTextoPadrao = $dsTextoPadrao;
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

    /**
     * @return TipoAssunto
     */
    public function getIdTipoAssunto(): TipoAssunto
    {
        return $this->idTipoAssunto;
    }

    /**
     * @param TipoAssunto $idTipoAssunto
     */
    public function setIdTipoAssunto(TipoAssunto $idTipoAssunto): void
    {
        $this->idTipoAssunto = $idTipoAssunto;
    }


}
