<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Endereco
 */
#[ORM\Table(name: 'ENDERECO')]
#[ORM\Index(name: 'ix_endereco_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_3ED34A42A4C20307', columns: ['ID_MUNICIPIO'])]
#[ORM\Index(name: 'IDX_3ED34A42AB4A9807', columns: ['ID_TIPO_ENDERECO'])]
#[ORM\Index(name: 'IDX_3ED34A4261D8523B', columns: ['ID_UF_ENDERECO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Endereco implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_ENDERECO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela ENDERECO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_ENDERECO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DS_ENDERECO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o endereço completo ou logradouro da localização residencial ou comercial do servidor ou unidade.'])]
    protected ?string $logradouro;

    #[ORM\Column(name: 'DS_COMPLEMENTO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o complemento, algo que será necessário específicar para uma melhor localização (Referência) para o endereço cadastrado.'])]
    protected ?string $complemento;

    #[ORM\Column(name: 'NM_BAIRRO', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome para o Bairro, que é uma comunidade ou região dentro de um município (cidade).'])]
    protected ?string $bairro;

    #[ORM\Column(name: 'NR_CEP', type: 'string', length: 8, nullable: true, options: ['comment' => 'Número para identificação do código de endereçamento postal (CEP) representando a localidade no sentido de facilitar o encaminhamento e a entrega das correspondências.'])]
    protected ?string $cep;

    #[ORM\JoinColumn(name: 'ID_MUNICIPIO', referencedColumnName: 'ID_MUNICIPIO')]
    #[ORM\ManyToOne(targetEntity: 'Municipio')]
    protected ?Municipio $municipio;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_TIPO_ENDERECO', referencedColumnName: 'ID_TIPO_ENDERECO')]
    #[ORM\ManyToOne(targetEntity: 'TipoEndereco')]
    protected ?TipoEndereco $tipoEndereco;

    #[ORM\JoinColumn(name: 'ID_UF_ENDERECO', referencedColumnName: 'ID_UF')]
    #[ORM\ManyToOne(targetEntity: 'Uf')]
    protected ?Uf $uf;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $idEndereco): void
    {
        $this->id = $idEndereco;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(?string $dsEndereco): void
    {
        $this->logradouro = $dsEndereco;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $dsComplemento): void
    {
        $this->complemento = $dsComplemento;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $nmBairro): void
    {
        $this->bairro = $nmBairro;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $nrCep): void
    {
        $this->cep = $nrCep;
    }

    public function getMunicipio(): ?Municipio
    {
        return $this->municipio;
    }

    public function setMunicipio(?Municipio $municipio): void
    {
        $this->municipio = $municipio;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getTipoEndereco(): TipoEndereco
    {
        return $this->tipoEndereco;
    }

    public function setTipoEndereco(TipoEndereco $tipoEndereco): void
    {
        $this->tipoEndereco = $tipoEndereco;
    }

    public function getUf(): Uf
    {
        return $this->uf;
    }

    public function setUf(Uf $uf): void
    {
        $this->uf = $uf;
    }


}
