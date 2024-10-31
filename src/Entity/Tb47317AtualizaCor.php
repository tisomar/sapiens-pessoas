<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tb47317AtualizaCor
 */
#[ORM\Table(name: 'TB_47317_ATUALIZA_COR')]
#[ORM\Entity]
class Tb47317AtualizaCor
{
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: true)]
    private $idServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'MATRICULA', type: 'string', length: 20, nullable: true)]
    private $matricula;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NOME', type: 'string', length: 100, nullable: true)]
    private $nome;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPF', type: 'string', length: 11, nullable: true, options: ['fixed' => true])]
    private $cpf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'COR', type: 'string', length: 50, nullable: true)]
    private $cor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'AVALIAÇÃO_DTI', type: 'string', length: 100, nullable: true)]
    private $avaliaÇÃoDti;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_47317_ATUALIZA_COR_ID_TABLE', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int|null
     */
    public function getIdServidor(): ?int
    {
        return $this->idServidor;
    }

    /**
     * @param int|null $idServidor
     */
    public function setIdServidor(?int $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return string|null
     */
    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    /**
     * @param string|null $matricula
     */
    public function setMatricula(?string $matricula): void
    {
        $this->matricula = $matricula;
    }

    /**
     * @return string|null
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     */
    public function setNome(?string $nome): void
    {
        $this->nome = $nome;
    }

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
     * @return string|null
     */
    public function getCor(): ?string
    {
        return $this->cor;
    }

    /**
     * @param string|null $cor
     */
    public function setCor(?string $cor): void
    {
        $this->cor = $cor;
    }

    /**
     * @return string|null
     */
    public function getAvaliaÇÃoDti(): ?string
    {
        return $this->avaliaÇÃoDti;
    }

    /**
     * @param string|null $avaliaÇÃoDti
     */
    public function setAvaliaÇÃoDti(?string $avaliaÇÃoDti): void
    {
        $this->avaliaÇÃoDti = $avaliaÇÃoDti;
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
