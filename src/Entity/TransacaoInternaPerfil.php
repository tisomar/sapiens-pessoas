<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransacaoInternaPerfil
 */
#[ORM\Table(name: 'TRANSACAO_INTERNA_PERFIL')]
#[ORM\Index(name: 'IDX_ECA780ACA29C661D', columns: ['ID_TRANSACAO_INTERNA'])]
#[ORM\Entity]
class TransacaoInternaPerfil
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TRANSACAO_INTERNA_PERFIL', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial ??nico da tabela AGU_RH.TRANSACAO_INTERNA_PERFIL.ID_TRANSACAO_INTERNA_PERFIL.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TRANSACAO_INTERNA_PERFIL_ID_TR', allocationSize: 1, initialValue: 1)]
    private $idTransacaoInternaPerfil;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TRANSACAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador para representação das transações de uma funcionalidade(Pagina) específica do sistema.'])]
    private $idTransacao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_TIPO_PERMISSAO', type: 'string', length: 1, nullable: false, options: ['default' => 'A', 'fixed' => true, 'comment' => 'Identificador boleano para o tipo de permissão. O campo foi migrado e o único valor existente na tabela era A.'])]
    private $inTipoPermissao = 'A';

    /**
     * @var TransacaoInterna
     */
    #[ORM\JoinColumn(name: 'ID_TRANSACAO_INTERNA', referencedColumnName: 'ID_TRANSACAO_INTERNA')]
    #[ORM\ManyToOne(targetEntity: 'TransacaoInterna')]
    private $idTransacaoInterna;

    /**
     * @return int
     */
    public function getIdTransacaoInternaPerfil(): int
    {
        return $this->idTransacaoInternaPerfil;
    }

    /**
     * @param int $idTransacaoInternaPerfil
     */
    public function setIdTransacaoInternaPerfil(int $idTransacaoInternaPerfil): void
    {
        $this->idTransacaoInternaPerfil = $idTransacaoInternaPerfil;
    }

    /**
     * @return int
     */
    public function getIdTransacao(): int
    {
        return $this->idTransacao;
    }

    /**
     * @param int $idTransacao
     */
    public function setIdTransacao(int $idTransacao): void
    {
        $this->idTransacao = $idTransacao;
    }

    /**
     * @return string
     */
    public function getInTipoPermissao(): string
    {
        return $this->inTipoPermissao;
    }

    /**
     * @param string $inTipoPermissao
     */
    public function setInTipoPermissao(string $inTipoPermissao): void
    {
        $this->inTipoPermissao = $inTipoPermissao;
    }

    /**
     * @return TransacaoInterna
     */
    public function getIdTransacaoInterna(): TransacaoInterna
    {
        return $this->idTransacaoInterna;
    }

    /**
     * @param TransacaoInterna $idTransacaoInterna
     */
    public function setIdTransacaoInterna(TransacaoInterna $idTransacaoInterna): void
    {
        $this->idTransacaoInterna = $idTransacaoInterna;
    }


}
