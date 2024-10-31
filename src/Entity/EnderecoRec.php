<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnderecoRec
 */
#[ORM\Table(name: 'ENDERECO_REC')]
#[ORM\Index(name: 'ix_enderecorec_midia', columns: ['ID_MIDIA_COMPROVANTE'])]
#[ORM\Index(name: 'ix_enderecorec_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_98AD828BA4C20307', columns: ['ID_MUNICIPIO'])]
#[ORM\Index(name: 'IDX_98AD828BAB4A9807', columns: ['ID_TIPO_ENDERECO'])]
#[ORM\Entity]
class EnderecoRec
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_ENDERECO_REC', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela ENDERECO_REC.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'ENDERECO_REC_ID_ENDERECO_REC_s', allocationSize: 1, initialValue: 1)]
    private $idEnderecoRec;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_MIDIA_COMPROVANTE', type: 'integer', nullable: true, options: ['comment' => 'Identificador do mídia que especifica um comprovante armazenado como mídia.'])]
    private $idMidiaComprovante;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_LOGRADOURO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para o endereço completo ou logradouro da localização residencial ou comercial do servidor.'])]
    private $dsLogradouro;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_COMPLEMENTO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o complemento, algo que será necessário específicar para uma melhor localização (Referência) para o endereço cadastrado.'])]
    private $dsComplemento;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_BAIRRO', type: 'string', length: 70, nullable: false, options: ['comment' => 'Nome para o Bairro, que é uma comunidade ou região dentro de um município (cidade).'])]
    private $nmBairro;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CEP', type: 'string', length: 8, nullable: true, options: ['comment' => 'Número para identificação do código de endereçamento postal (CEP) representando a localidade no sentido de facilitar o encaminhamento e a entrega das correspondências.'])]
    private $nrCep;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da opera??ão de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de inclusão do registro no sistema.'])]
    private $nrCpfOperador;

    /**
     * @var string
     */
    #[ORM\Column(name: 'ST_ENDERECO_REC', type: 'string', length: 1, nullable: false, options: ['default' => '1', 'fixed' => true, 'comment' => 'Identificador para especificar o status ou situação do registro de recadastramento do endereço do servidor. Ex: 1 - Inclusão, 2 - Devolução, 3 - Migração Manual ou 4 - Migração Automática.'])]
    private $stEnderecoRec = '1';

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
    #[ORM\Column(name: 'ST_REG_ATUALIZADO_END', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $stRegAtualizadoEnd;

    /**
     * @var Municipio
     */
    #[ORM\JoinColumn(name: 'ID_MUNICIPIO', referencedColumnName: 'ID_MUNICIPIO')]
    #[ORM\ManyToOne(targetEntity: 'Municipio')]
    private $idMunicipio;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $idServidor;

    /**
     * @var TipoEndereco
     */
    #[ORM\JoinColumn(name: 'ID_TIPO_ENDERECO', referencedColumnName: 'ID_TIPO_ENDERECO')]
    #[ORM\ManyToOne(targetEntity: 'TipoEndereco')]
    private $idTipoEndereco;

    /**
     * @return int
     */
    public function getIdEnderecoRec(): int
    {
        return $this->idEnderecoRec;
    }

    /**
     * @param int $idEnderecoRec
     */
    public function setIdEnderecoRec(int $idEnderecoRec): void
    {
        $this->idEnderecoRec = $idEnderecoRec;
    }

    /**
     * @return int|null
     */
    public function getIdMidiaComprovante(): ?int
    {
        return $this->idMidiaComprovante;
    }

    /**
     * @param int|null $idMidiaComprovante
     */
    public function setIdMidiaComprovante(?int $idMidiaComprovante): void
    {
        $this->idMidiaComprovante = $idMidiaComprovante;
    }

    /**
     * @return string
     */
    public function getDsLogradouro(): string
    {
        return $this->dsLogradouro;
    }

    /**
     * @param string $dsLogradouro
     */
    public function setDsLogradouro(string $dsLogradouro): void
    {
        $this->dsLogradouro = $dsLogradouro;
    }

    /**
     * @return string|null
     */
    public function getDsComplemento(): ?string
    {
        return $this->dsComplemento;
    }

    /**
     * @param string|null $dsComplemento
     */
    public function setDsComplemento(?string $dsComplemento): void
    {
        $this->dsComplemento = $dsComplemento;
    }

    /**
     * @return string
     */
    public function getNmBairro(): string
    {
        return $this->nmBairro;
    }

    /**
     * @param string $nmBairro
     */
    public function setNmBairro(string $nmBairro): void
    {
        $this->nmBairro = $nmBairro;
    }

    /**
     * @return string|null
     */
    public function getNrCep(): ?string
    {
        return $this->nrCep;
    }

    /**
     * @param string|null $nrCep
     */
    public function setNrCep(?string $nrCep): void
    {
        $this->nrCep = $nrCep;
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
    public function getStEnderecoRec(): string
    {
        return $this->stEnderecoRec;
    }

    /**
     * @param string $stEnderecoRec
     */
    public function setStEnderecoRec(string $stEnderecoRec): void
    {
        $this->stEnderecoRec = $stEnderecoRec;
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
    public function getStRegAtualizadoEnd(): ?string
    {
        return $this->stRegAtualizadoEnd;
    }

    /**
     * @param string|null $stRegAtualizadoEnd
     */
    public function setStRegAtualizadoEnd(?string $stRegAtualizadoEnd): void
    {
        $this->stRegAtualizadoEnd = $stRegAtualizadoEnd;
    }

    /**
     * @return Municipio
     */
    public function getIdMunicipio(): Municipio
    {
        return $this->idMunicipio;
    }

    /**
     * @param Municipio $idMunicipio
     */
    public function setIdMunicipio(Municipio $idMunicipio): void
    {
        $this->idMunicipio = $idMunicipio;
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
     * @return TipoEndereco
     */
    public function getIdTipoEndereco(): TipoEndereco
    {
        return $this->idTipoEndereco;
    }

    /**
     * @param TipoEndereco $idTipoEndereco
     */
    public function setIdTipoEndereco(TipoEndereco $idTipoEndereco): void
    {
        $this->idTipoEndereco = $idTipoEndereco;
    }


}
