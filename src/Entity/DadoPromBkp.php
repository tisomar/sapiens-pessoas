<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

/**
 * Class DadoPromBkp.
 *
 * @author Advocacia-Geral da União <agupessoas@agu.gov.br>
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[ORM\Table(name: 'dado_prom_bkp')]
class DadoPromBkp
{
    #[ManyToOne(targetEntity: DadoPromocao::class)]
    #[JoinColumn(name: 'id_dado_promocao', referencedColumnName: 'id')]
    private DadoPromocao|null $dadoPromocao = null;

    /**
     * @return DadoPromocao|null
     */
    public function getDadoPromocao(): ?DadoPromocao
    {
        return $this->dadoPromocao;
    }

    /**
     * @param DadoPromocao|null $dadoPromocao
     */
    public function setDadoPromocao(?DadoPromocao $dadoPromocao): void
    {
        $this->dadoPromocao = $dadoPromocao;
    }
}