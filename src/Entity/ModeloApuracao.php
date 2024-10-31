<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeloApuracao
 */
#[ORM\Table(name: 'MODELO_APURACAO')]
#[ORM\Entity]
class ModeloApuracao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_MODELO_APURACAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único dos modelos de apuração de listas de antiguidade ou precedência.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MODELO_APURACAO_ID_MODELO_APUR', allocationSize: 1, initialValue: 1)]
    private $idModeloApuracao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_MODELO_APURACAO', type: 'string', length: 200, nullable: false, options: ['comment' => 'Nome dos  modelos de apuração de listas de antiguidade ou precedência.'])]
    private $nmModeloApuracao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'CPF de quem incluiu ou alterou a opção. Existe para fins de auditoria.'])]
    private $nrCpfOperador;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'IN_MODELO_BLOQUEADO', type: 'integer', nullable: true, options: ['comment' => 'Indica se o modelo de apuração está de acordo com a respectiva norma e não pode mais ser alterado nem em sua descrição e nem na configuração de quesitos.'])]
    private $inModeloBloqueado = '0';

    /**
     * @return int
     */
    public function getIdModeloApuracao(): int
    {
        return $this->idModeloApuracao;
    }

    /**
     * @param int $idModeloApuracao
     */
    public function setIdModeloApuracao(int $idModeloApuracao): void
    {
        $this->idModeloApuracao = $idModeloApuracao;
    }

    /**
     * @return string
     */
    public function getNmModeloApuracao(): string
    {
        return $this->nmModeloApuracao;
    }

    /**
     * @param string $nmModeloApuracao
     */
    public function setNmModeloApuracao(string $nmModeloApuracao): void
    {
        $this->nmModeloApuracao = $nmModeloApuracao;
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
     * @return int|string|null
     */
    public function getInModeloBloqueado(): int|string|null
    {
        return $this->inModeloBloqueado;
    }

    /**
     * @param int|string|null $inModeloBloqueado
     */
    public function setInModeloBloqueado(int|string|null $inModeloBloqueado): void
    {
        $this->inModeloBloqueado = $inModeloBloqueado;
    }


}
