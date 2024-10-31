<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbUsuarioServico
 */
#[ORM\Table(name: 'TB_USUARIO_SERVICO')]
#[ORM\Entity]
class TbUsuarioServico
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'CD_USUARIO_SERVICO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela TB_USUARIO_SERVICO'])]
    private $cdUsuarioServico;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_USUARIO', type: 'string', length: 32, nullable: false, options: ['comment' => 'Nome do usuário que realiza autenticação no serviço'])]
    private $nmUsuario;

    /**
     * @var string
     */
    #[ORM\Column(name: 'TX_SENHA', type: 'string', length: 60, nullable: false, options: ['comment' => 'Senha para autenticação no serviço'])]
    private $txSenha;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_APPNAME', type: 'string', length: 100, nullable: false, options: ['comment' => 'Nome da aplicação que realizará integração com o serviço'])]
    private $dsAppname;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_ATIVO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para usuário ativo no serviço'])]
    private $inAtivo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'TX_TOKEN', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Token de autenticação'])]
    private $txToken;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_USUARIO_SERVICO_ID_TABLE_se', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getCdUsuarioServico(): int
    {
        return $this->cdUsuarioServico;
    }

    /**
     * @param int $cdUsuarioServico
     */
    public function setCdUsuarioServico(int $cdUsuarioServico): void
    {
        $this->cdUsuarioServico = $cdUsuarioServico;
    }

    /**
     * @return string
     */
    public function getNmUsuario(): string
    {
        return $this->nmUsuario;
    }

    /**
     * @param string $nmUsuario
     */
    public function setNmUsuario(string $nmUsuario): void
    {
        $this->nmUsuario = $nmUsuario;
    }

    /**
     * @return string
     */
    public function getTxSenha(): string
    {
        return $this->txSenha;
    }

    /**
     * @param string $txSenha
     */
    public function setTxSenha(string $txSenha): void
    {
        $this->txSenha = $txSenha;
    }

    /**
     * @return string
     */
    public function getDsAppname(): string
    {
        return $this->dsAppname;
    }

    /**
     * @param string $dsAppname
     */
    public function setDsAppname(string $dsAppname): void
    {
        $this->dsAppname = $dsAppname;
    }

    /**
     * @return string
     */
    public function getInAtivo(): string
    {
        return $this->inAtivo;
    }

    /**
     * @param string $inAtivo
     */
    public function setInAtivo(string $inAtivo): void
    {
        $this->inAtivo = $inAtivo;
    }

    /**
     * @return string|null
     */
    public function getTxToken(): ?string
    {
        return $this->txToken;
    }

    /**
     * @param string|null $txToken
     */
    public function setTxToken(?string $txToken): void
    {
        $this->txToken = $txToken;
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
