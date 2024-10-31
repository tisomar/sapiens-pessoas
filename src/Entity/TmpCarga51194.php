<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpCarga#51194
 */
#[ORM\Table(name: 'TMP_CARGA_#51194')]
#[ORM\Entity]
class TmpCarga#51194
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPF', type: 'string', length: 11, nullable: true, options: ['fixed' => true])]
    private $cpf;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_CLASSIFICACAO_CONCURSO', type: 'integer', nullable: true)]
    private $nrClassificacaoConcurso;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_ANO_CONCURSO', type: 'integer', nullable: true)]
    private $nrAnoConcurso;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TMP_CARGA_#51194_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     */
    public function setCpf(?string $cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return int|null
     */
    public function getNrClassificacaoConcurso(): ?int
    {
        return $this->nrClassificacaoConcurso;
    }

    /**
     * @param int|null $nrClassificacaoConcurso
     */
    public function setNrClassificacaoConcurso(?int $nrClassificacaoConcurso): void
    {
        $this->nrClassificacaoConcurso = $nrClassificacaoConcurso;
    }

    /**
     * @return int|null
     */
    public function getNrAnoConcurso(): ?int
    {
        return $this->nrAnoConcurso;
    }

    /**
     * @param int|null $nrAnoConcurso
     */
    public function setNrAnoConcurso(?int $nrAnoConcurso): void
    {
        $this->nrAnoConcurso = $nrAnoConcurso;
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
