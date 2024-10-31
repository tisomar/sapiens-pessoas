<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quesito
 */
#[ORM\Table(name: 'QUESITO')]
#[ORM\Entity]
class Quesito
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_QUESITO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único para os quesitos que vão ser usados para compor a forma de classificaç??o em listas de antiguidade ou de precedência.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'QUESITO_ID_QUESITO_seq', allocationSize: 1, initialValue: 1)]
    private $idQuesito;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_QUESITO', type: 'string', length: 200, nullable: false, options: ['comment' => 'Nome do quesito que vai ser usado para compor a forma de classificação em listas de antiguidade ou de precedência.'])]
    private $nmQuesito;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_COLUNA_APRESENTACAO', type: 'string', length: 30, nullable: false, options: ['comment' => 'Nome da coluna da tabela LISTA_APURACAO cujo valor vai ser apresentado para este quesito quando for exibida a listas de antiguidade ou de precedência.'])]
    private $nmColunaApresentacao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_COLUNA_ORDENACAO', type: 'string', length: 30, nullable: false, options: ['comment' => 'Nome da coluna da tabela LISTA_APURACAO cujo valor vai ser usado para fins de ordenação para este quesito quando for exibida a listas de antiguidade ou de precedência.'])]
    private $nmColunaOrdenacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_ALIAS_APRESENTACAO', type: 'string', length: 30, nullable: true, options: ['comment' => 'Alias que deve ser usado nas consultas para a coluna de apresentação.'])]
    private $nmAliasApresentacao;

    /**
     * @return int
     */
    public function getIdQuesito(): int
    {
        return $this->idQuesito;
    }

    /**
     * @param int $idQuesito
     */
    public function setIdQuesito(int $idQuesito): void
    {
        $this->idQuesito = $idQuesito;
    }

    /**
     * @return string
     */
    public function getNmQuesito(): string
    {
        return $this->nmQuesito;
    }

    /**
     * @param string $nmQuesito
     */
    public function setNmQuesito(string $nmQuesito): void
    {
        $this->nmQuesito = $nmQuesito;
    }

    /**
     * @return string
     */
    public function getNmColunaApresentacao(): string
    {
        return $this->nmColunaApresentacao;
    }

    /**
     * @param string $nmColunaApresentacao
     */
    public function setNmColunaApresentacao(string $nmColunaApresentacao): void
    {
        $this->nmColunaApresentacao = $nmColunaApresentacao;
    }

    /**
     * @return string
     */
    public function getNmColunaOrdenacao(): string
    {
        return $this->nmColunaOrdenacao;
    }

    /**
     * @param string $nmColunaOrdenacao
     */
    public function setNmColunaOrdenacao(string $nmColunaOrdenacao): void
    {
        $this->nmColunaOrdenacao = $nmColunaOrdenacao;
    }

    /**
     * @return string|null
     */
    public function getNmAliasApresentacao(): ?string
    {
        return $this->nmAliasApresentacao;
    }

    /**
     * @param string|null $nmAliasApresentacao
     */
    public function setNmAliasApresentacao(?string $nmAliasApresentacao): void
    {
        $this->nmAliasApresentacao = $nmAliasApresentacao;
    }


}
