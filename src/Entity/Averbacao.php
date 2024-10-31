<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Averbacao
 */
#[ORM\Table(name: 'AVERBACAO')]
#[ORM\Index(name: 'IDX_979A2F24B8EC0CC7', columns: ['ID_CARGO_CONCURSO_ANT'])]
#[ORM\Index(name: 'IDX_979A2F24A6F7132C', columns: ['ID_NORMA_CONCURSO_ANT'])]
#[ORM\Index(name: 'IDX_979A2F245E5A804E', columns: ['ID_ORGAO_CONCURSO_ANT'])]
#[ORM\Index(name: 'IDX_979A2F24A4BCD32E', columns: ['ID_SERVIDOR'])]
#[ORM\Entity]
class Averbacao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_AVERBACAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela AVERBACAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'AVERBACAO_ID_AVERBACAO_seq', allocationSize: 1, initialValue: 1)]
    private $idAverbacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_AVERBACAO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Especifica o código da averbação que o servidor estará utilizando'])]
    private $cdAverbacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CLASSE_PRECEDEU', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica a descrição da Classe atual do servidor: Segunda, Primeira e Especial'])]
    private $dsClassePrecedeu;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_TEMPO_PRECEDEU', type: 'integer', nullable: true, options: ['comment' => 'Especifica o número que representa o tempo que precedeu.'])]
    private $nrTempoPrecedeu;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_CONCURSO_ANTERIOR', type: 'integer', nullable: true, options: ['comment' => 'Especifica o número do concurso na qual o servidor foi selecionado.'])]
    private $nrConcursoAnterior;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_ANO_CONCURSO_ANTERIOR', type: 'integer', nullable: true, options: ['comment' => 'Especifica o ano do concurso na qual o servidor foi selecionado.'])]
    private $nrAnoConcursoAnterior;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_CLASSIFICACAO_ANTERIOR', type: 'integer', nullable: true, options: ['comment' => 'Especifica o número da classificação do candidato servidor no concurso de ingresso anterior.'])]
    private $nrClassificacaoAnterior;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INI_CONC_EXER_ANT', type: 'date', nullable: true, options: ['comment' => 'Especifica a data do início do exercício do servidor no cargo anterior.'])]
    private $dtIniConcExerAnt;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_POSSE_ANTERIOR', type: 'date', nullable: true, options: ['comment' => 'Especifica a data da posse anterior do servidor.'])]
    private $dtPosseAnterior;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXONERACAO_ANTERIOR', type: 'date', nullable: true, options: ['comment' => 'Especifica a data da saída/exoneração anterior do servidor.'])]
    private $dtExoneracaoAnterior;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_CONCURSO_FEDERAL', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se o servidor teve provimento em coocurso federal ou não. (0- FALSO e 1- VERDADEIRO)'])]
    private $inConcursoFederal;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_OUTRAS_CARREIRAS', type: 'integer', nullable: true, options: ['comment' => 'Especifica o número representativo do tempo de serviço em outras carreiras ou cargos efetivos privativos de baicharel em direito.'])]
    private $nrOutrasCarreiras;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_TEMPO_MESARIO', type: 'integer', nullable: true, options: ['comment' => 'Especifica o número que representa o tempo adquirido pelo servidor como mesário.'])]
    private $nrTempoMesario;

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
     * @var Cargo
     */
    #[ORM\JoinColumn(name: 'ID_CARGO_CONCURSO_ANT', referencedColumnName: 'ID_CARGO')]
    #[ORM\ManyToOne(targetEntity: 'Cargo')]
    private $idCargoConcursoAnt;

    /**
     * @var Norma
     */
    #[ORM\JoinColumn(name: 'ID_NORMA_CONCURSO_ANT', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    private $idNormaConcursoAnt;

    /**
     * @var Orgao
     */
    #[ORM\JoinColumn(name: 'ID_ORGAO_CONCURSO_ANT', referencedColumnName: 'ID_ORGAO')]
    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    private $idOrgaoConcursoAnt;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $idServidor;

    /**
     * @return int
     */
    public function getIdAverbacao(): int
    {
        return $this->idAverbacao;
    }

    /**
     * @param int $idAverbacao
     */
    public function setIdAverbacao(int $idAverbacao): void
    {
        $this->idAverbacao = $idAverbacao;
    }

    /**
     * @return string|null
     */
    public function getCdAverbacao(): ?string
    {
        return $this->cdAverbacao;
    }

    /**
     * @param string|null $cdAverbacao
     */
    public function setCdAverbacao(?string $cdAverbacao): void
    {
        $this->cdAverbacao = $cdAverbacao;
    }

    /**
     * @return string|null
     */
    public function getDsClassePrecedeu(): ?string
    {
        return $this->dsClassePrecedeu;
    }

    /**
     * @param string|null $dsClassePrecedeu
     */
    public function setDsClassePrecedeu(?string $dsClassePrecedeu): void
    {
        $this->dsClassePrecedeu = $dsClassePrecedeu;
    }

    /**
     * @return int|null
     */
    public function getNrTempoPrecedeu(): ?int
    {
        return $this->nrTempoPrecedeu;
    }

    /**
     * @param int|null $nrTempoPrecedeu
     */
    public function setNrTempoPrecedeu(?int $nrTempoPrecedeu): void
    {
        $this->nrTempoPrecedeu = $nrTempoPrecedeu;
    }

    /**
     * @return int|null
     */
    public function getNrConcursoAnterior(): ?int
    {
        return $this->nrConcursoAnterior;
    }

    /**
     * @param int|null $nrConcursoAnterior
     */
    public function setNrConcursoAnterior(?int $nrConcursoAnterior): void
    {
        $this->nrConcursoAnterior = $nrConcursoAnterior;
    }

    /**
     * @return int|null
     */
    public function getNrAnoConcursoAnterior(): ?int
    {
        return $this->nrAnoConcursoAnterior;
    }

    /**
     * @param int|null $nrAnoConcursoAnterior
     */
    public function setNrAnoConcursoAnterior(?int $nrAnoConcursoAnterior): void
    {
        $this->nrAnoConcursoAnterior = $nrAnoConcursoAnterior;
    }

    /**
     * @return int|null
     */
    public function getNrClassificacaoAnterior(): ?int
    {
        return $this->nrClassificacaoAnterior;
    }

    /**
     * @param int|null $nrClassificacaoAnterior
     */
    public function setNrClassificacaoAnterior(?int $nrClassificacaoAnterior): void
    {
        $this->nrClassificacaoAnterior = $nrClassificacaoAnterior;
    }

    /**
     * @return DateTime|null
     */
    public function getDtIniConcExerAnt(): ?\DateTime
    {
        return $this->dtIniConcExerAnt;
    }

    /**
     * @param DateTime|null $dtIniConcExerAnt
     */
    public function setDtIniConcExerAnt(?\DateTime $dtIniConcExerAnt): void
    {
        $this->dtIniConcExerAnt = $dtIniConcExerAnt;
    }

    /**
     * @return DateTime|null
     */
    public function getDtPosseAnterior(): ?\DateTime
    {
        return $this->dtPosseAnterior;
    }

    /**
     * @param DateTime|null $dtPosseAnterior
     */
    public function setDtPosseAnterior(?\DateTime $dtPosseAnterior): void
    {
        $this->dtPosseAnterior = $dtPosseAnterior;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExoneracaoAnterior(): ?\DateTime
    {
        return $this->dtExoneracaoAnterior;
    }

    /**
     * @param DateTime|null $dtExoneracaoAnterior
     */
    public function setDtExoneracaoAnterior(?\DateTime $dtExoneracaoAnterior): void
    {
        $this->dtExoneracaoAnterior = $dtExoneracaoAnterior;
    }

    /**
     * @return string
     */
    public function getInConcursoFederal(): string
    {
        return $this->inConcursoFederal;
    }

    /**
     * @param string $inConcursoFederal
     */
    public function setInConcursoFederal(string $inConcursoFederal): void
    {
        $this->inConcursoFederal = $inConcursoFederal;
    }

    /**
     * @return int|null
     */
    public function getNrOutrasCarreiras(): ?int
    {
        return $this->nrOutrasCarreiras;
    }

    /**
     * @param int|null $nrOutrasCarreiras
     */
    public function setNrOutrasCarreiras(?int $nrOutrasCarreiras): void
    {
        $this->nrOutrasCarreiras = $nrOutrasCarreiras;
    }

    /**
     * @return int|null
     */
    public function getNrTempoMesario(): ?int
    {
        return $this->nrTempoMesario;
    }

    /**
     * @param int|null $nrTempoMesario
     */
    public function setNrTempoMesario(?int $nrTempoMesario): void
    {
        $this->nrTempoMesario = $nrTempoMesario;
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
     * @return Cargo
     */
    public function getIdCargoConcursoAnt(): Cargo
    {
        return $this->idCargoConcursoAnt;
    }

    /**
     * @param Cargo $idCargoConcursoAnt
     */
    public function setIdCargoConcursoAnt(Cargo $idCargoConcursoAnt): void
    {
        $this->idCargoConcursoAnt = $idCargoConcursoAnt;
    }

    /**
     * @return Norma
     */
    public function getIdNormaConcursoAnt(): Norma
    {
        return $this->idNormaConcursoAnt;
    }

    /**
     * @param Norma $idNormaConcursoAnt
     */
    public function setIdNormaConcursoAnt(Norma $idNormaConcursoAnt): void
    {
        $this->idNormaConcursoAnt = $idNormaConcursoAnt;
    }

    /**
     * @return Orgao
     */
    public function getIdOrgaoConcursoAnt(): Orgao
    {
        return $this->idOrgaoConcursoAnt;
    }

    /**
     * @param Orgao $idOrgaoConcursoAnt
     */
    public function setIdOrgaoConcursoAnt(Orgao $idOrgaoConcursoAnt): void
    {
        $this->idOrgaoConcursoAnt = $idOrgaoConcursoAnt;
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


}
