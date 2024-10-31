<?php

namespace AguPessoas\Backend\Gateways\SuperSapiens\Outputs;

class ComponenteDigitalOutput
{
    public string $type;
    public string $id;
    public string $context;
    public string $fileName;
    public string $hash;
    public int $numeracaoSequencial;
    public int $interacoes;
    public string $conteudo;
    public int $tamanho;
    public int $nivelComposicao;
    public string $mimetype;
    public string $extensao;
    public bool $editavel;
    public bool $convertidoPdf;
    public bool $assinado;
    public int $statusVerificacaoVirus;
    public string $highlights;
    public int $componenteDigitalId;
    public string $uuid;
    public string $criadoEm;
    public string $atualizadoEm;

    public function __construct(array $data)
    {
        $this->type = $data['@type'];
        $this->id = $data['@id'];
        $this->context = $data['@context'];
        $this->fileName = $data['fileName'];
        $this->hash = $data['hash'];
        $this->numeracaoSequencial = $data['numeracaoSequencial'];
        $this->interacoes = $data['interacoes'];
        $this->conteudo = $data['conteudo'];
        $this->tamanho = $data['tamanho'];
        $this->nivelComposicao = $data['nivelComposicao'];
        $this->mimetype = $data['mimetype'];
        $this->extensao = $data['extensao'];
        $this->editavel = $data['editavel'];
        $this->convertidoPdf = $data['convertidoPdf'];
        $this->assinado = $data['assinado'];
        $this->statusVerificacaoVirus = $data['statusVerificacaoVirus'];
        $this->highlights = $data['highlights'];
        $this->componenteDigitalId = $data['id'];
        $this->uuid = $data['uuid'];
        $this->criadoEm = $data['criadoEm'];
        $this->atualizadoEm = $data['atualizadoEm'];
    }
}
