<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * DadoFuncionalRec
 */
#[ORM\Table(name: 'DADO_FUNCIONAL_REC')]
#[ORM\Index(name: 'ix_dadofuncrec_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_4C1FB27298AD68', columns: ['ID_TIPO_TELEFONE'])]
#[ORM\Entity]
class DadoFuncionalRec
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_DADO_FUNCIONAL_REC', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela DADO_FUNCIONAL_REC.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'DADO_FUNCIONAL_REC_ID_DADO_FUN', allocationSize: 1, initialValue: 1)]
    private $idDadoFuncionalRec;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_DDD', type: 'string', length: 2, nullable: false, options: ['comment' => 'Número para a Discagem direta a distância (DDD), que é adotado para discagem interurbana através da inserção de prefixos regionais da localidade para onde a pessoa deseja ligar.'])]
    private $nrDdd;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_TELEFONE', type: 'string', length: 30, nullable: false, options: ['comment' => 'Número de contato para o telefone cadastrado de acordo com o tipo de telefone.'])]
    private $nrTelefone;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de inclusão do registro no sistema.'])]
    private $nrCpfOperador;

    /**
     * @var string
     */
    #[ORM\Column(name: 'ST_DADO_FUNCIONAL_REC', type: 'string', length: 1, nullable: false, options: ['default' => '1', 'fixed' => true, 'comment' => 'Identificador para especificar o status ou situação do registro de recadastramento dos dados funcionais do servidor. Ex: 1 - Inclusão, 2 - Devolução, 3 - Migração Manual ou 4 - Migração Automática.'])]
    private $stDadoFuncionalRec = '1';

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_DEVOLUCAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a DATA em que foi executada a operação de devolução do registro cadastrado. Essa devolução pode ocorrer por pendências na informação cadastrada.'])]
    private $dtOperacaoDevolucao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR_DEVOLUCAO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de devolução do registro cadastrado. Essa devolução pode ocorrer por pendências na informação cadastrada.'])]
    private $nrCpfOperadorDevolucao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_MIGRACAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a DATA em que foi executada a operação de migração do registro, seja ela Manual ou Automática.'])]
    private $dtOperacaoMigracao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR_MIGRACAO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de migração do registro, seja ela Manual ou Automática.'])]
    private $nrCpfOperadorMigracao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'PISPASEP', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número PISPASEP.'])]
    private $pispasep;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_ORGAO', type: 'date', nullable: true, options: ['comment' => 'Data em que o servidor ingressou no orgão público federal, ou seja, obteve o vínculo jurídico estabelecido pela posse e exercício em um cargo público.'])]
    private $dtIngressoOrgao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_IDENTIDADE_FUNCIONAL', type: 'string', length: 12, nullable: true, options: ['comment' => 'Número de Identidade Funcional do Servidor.'])]
    private $nrIdentidadeFuncional;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ST_REG_ATUALIZADO_DFR', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $stRegAtualizadoDfr;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_LOTACAO', type: 'integer', nullable: true, options: ['comment' => 'Identificador único para a lotacao ou Unidade de exercício do servidor.'])]
    private $idLotacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_IMPRESSAO_FICHA', type: 'date', nullable: true, options: ['comment' => 'Data de Impressão da Ficha de Identidade Funcinal  do Servidor.'])]
    private $dtImpressaoFicha;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ST_INDICA_SERVIDOR_LISTADO', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $stIndicaServidorListado;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $idServidor;

    /**
     * @var TipoTelefone
     */
    #[ORM\JoinColumn(name: 'ID_TIPO_TELEFONE', referencedColumnName: 'ID_TIPO_TELEFONE')]
    #[ORM\ManyToOne(targetEntity: 'TipoTelefone')]
    private $idTipoTelefone;

    /**
     * @return int
     */
    public function getIdDadoFuncionalRec(): int
    {
        return $this->idDadoFuncionalRec;
    }

    /**
     * @param int $idDadoFuncionalRec
     */
    public function setIdDadoFuncionalRec(int $idDadoFuncionalRec): void
    {
        $this->idDadoFuncionalRec = $idDadoFuncionalRec;
    }

    /**
     * @return string
     */
    public function getNrDdd(): string
    {
        return $this->nrDdd;
    }

    /**
     * @param string $nrDdd
     */
    public function setNrDdd(string $nrDdd): void
    {
        $this->nrDdd = $nrDdd;
    }

    /**
     * @return string
     */
    public function getNrTelefone(): string
    {
        return $this->nrTelefone;
    }

    /**
     * @param string $nrTelefone
     */
    public function setNrTelefone(string $nrTelefone): void
    {
        $this->nrTelefone = $nrTelefone;
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
     * @return string
     */
    public function getStDadoFuncionalRec(): string
    {
        return $this->stDadoFuncionalRec;
    }

    /**
     * @param string $stDadoFuncionalRec
     */
    public function setStDadoFuncionalRec(string $stDadoFuncionalRec): void
    {
        $this->stDadoFuncionalRec = $stDadoFuncionalRec;
    }

    /**
     * @return DateTime|null
     */
    public function getDtOperacaoDevolucao(): ?\DateTime
    {
        return $this->dtOperacaoDevolucao;
    }

    /**
     * @param DateTime|null $dtOperacaoDevolucao
     */
    public function setDtOperacaoDevolucao(?\DateTime $dtOperacaoDevolucao): void
    {
        $this->dtOperacaoDevolucao = $dtOperacaoDevolucao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfOperadorDevolucao(): ?string
    {
        return $this->nrCpfOperadorDevolucao;
    }

    /**
     * @param string|null $nrCpfOperadorDevolucao
     */
    public function setNrCpfOperadorDevolucao(?string $nrCpfOperadorDevolucao): void
    {
        $this->nrCpfOperadorDevolucao = $nrCpfOperadorDevolucao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtOperacaoMigracao(): ?\DateTime
    {
        return $this->dtOperacaoMigracao;
    }

    /**
     * @param DateTime|null $dtOperacaoMigracao
     */
    public function setDtOperacaoMigracao(?\DateTime $dtOperacaoMigracao): void
    {
        $this->dtOperacaoMigracao = $dtOperacaoMigracao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfOperadorMigracao(): ?string
    {
        return $this->nrCpfOperadorMigracao;
    }

    /**
     * @param string|null $nrCpfOperadorMigracao
     */
    public function setNrCpfOperadorMigracao(?string $nrCpfOperadorMigracao): void
    {
        $this->nrCpfOperadorMigracao = $nrCpfOperadorMigracao;
    }

    /**
     * @return string|null
     */
    public function getPispasep(): ?string
    {
        return $this->pispasep;
    }

    /**
     * @param string|null $pispasep
     */
    public function setPispasep(?string $pispasep): void
    {
        $this->pispasep = $pispasep;
    }

    /**
     * @return DateTime|null
     */
    public function getDtIngressoOrgao(): ?\DateTime
    {
        return $this->dtIngressoOrgao;
    }

    /**
     * @param DateTime|null $dtIngressoOrgao
     */
    public function setDtIngressoOrgao(?\DateTime $dtIngressoOrgao): void
    {
        $this->dtIngressoOrgao = $dtIngressoOrgao;
    }

    /**
     * @return string|null
     */
    public function getNrIdentidadeFuncional(): ?string
    {
        return $this->nrIdentidadeFuncional;
    }

    /**
     * @param string|null $nrIdentidadeFuncional
     */
    public function setNrIdentidadeFuncional(?string $nrIdentidadeFuncional): void
    {
        $this->nrIdentidadeFuncional = $nrIdentidadeFuncional;
    }

    /**
     * @return string|null
     */
    public function getStRegAtualizadoDfr(): ?string
    {
        return $this->stRegAtualizadoDfr;
    }

    /**
     * @param string|null $stRegAtualizadoDfr
     */
    public function setStRegAtualizadoDfr(?string $stRegAtualizadoDfr): void
    {
        $this->stRegAtualizadoDfr = $stRegAtualizadoDfr;
    }

    /**
     * @return int|null
     */
    public function getIdLotacao(): ?int
    {
        return $this->idLotacao;
    }

    /**
     * @param int|null $idLotacao
     */
    public function setIdLotacao(?int $idLotacao): void
    {
        $this->idLotacao = $idLotacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtImpressaoFicha(): ?\DateTime
    {
        return $this->dtImpressaoFicha;
    }

    /**
     * @param DateTime|null $dtImpressaoFicha
     */
    public function setDtImpressaoFicha(?\DateTime $dtImpressaoFicha): void
    {
        $this->dtImpressaoFicha = $dtImpressaoFicha;
    }

    /**
     * @return string|null
     */
    public function getStIndicaServidorListado(): ?string
    {
        return $this->stIndicaServidorListado;
    }

    /**
     * @param string|null $stIndicaServidorListado
     */
    public function setStIndicaServidorListado(?string $stIndicaServidorListado): void
    {
        $this->stIndicaServidorListado = $stIndicaServidorListado;
    }

    /**
     * @return Servidor
     */
    public function getIdServidor(): Servidor
    {
        return $this->idServidor;
    }

    /**
     * @param Servidor $idServidor
     */
    public function setIdServidor(Servidor $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return TipoTelefone
     */
    public function getIdTipoTelefone(): TipoTelefone
    {
        return $this->idTipoTelefone;
    }

    /**
     * @param TipoTelefone $idTipoTelefone
     */
    public function setIdTipoTelefone(TipoTelefone $idTipoTelefone): void
    {
        $this->idTipoTelefone = $idTipoTelefone;
    }


}
