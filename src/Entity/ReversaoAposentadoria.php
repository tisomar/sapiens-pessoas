<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReversaoAposentadoria
 */
#[ORM\Table(name: 'REVERSAO_APOSENTADORIA')]
#[ORM\Entity]
class ReversaoAposentadoria
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR_REVERSAO', type: 'integer', nullable: false, options: ['comment' => 'Código do Servidor a ser removido na atualização do robô.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'REVERSAO_APOSENTADORIA_ID_SERV', allocationSize: 1, initialValue: 1)]
    private $idServidorReversao;

    /**
     * @return int
     */
    public function getIdServidorReversao(): int
    {
        return $this->idServidorReversao;
    }

    /**
     * @param int $idServidorReversao
     */
    public function setIdServidorReversao(int $idServidorReversao): void
    {
        $this->idServidorReversao = $idServidorReversao;
    }


}
