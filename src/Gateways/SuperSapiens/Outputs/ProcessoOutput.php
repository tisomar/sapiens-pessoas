<?php

namespace AguPessoas\Backend\Gateways\SuperSapiens\Outputs;

class ProcessoOutput
{
    public string $type;
    public string $id;
    public string $context;
    public int $unidadeArquivistica;
    public int $tipoProtocolo;
    public bool $semValorEconomico;
    public bool $protocoloEletronico;
    public string $NUP;
    public string $NUPFormatado;
    public bool $visibilidadeExterna;
    public string $dataHoraAbertura;
    public string $titulo;
    public string $chaveAcesso;
    public bool $acessoRestrito;
    public bool $hasBookmark;
    public bool $hasFundamentacaoRestricao;
    public int $processoId;
    public string $uuid;
    public string $criadoEm;
    public string $atualizadoEm;

    public function __construct(array $data)
    {
        $this->type = $data['@type'];
        $this->id = $data['@id'];
        $this->context = $data['@context'];
        $this->unidadeArquivistica = $data['unidadeArquivistica'];
        $this->tipoProtocolo = $data['tipoProtocolo'];
        $this->semValorEconomico = $data['semValorEconomico'];
        $this->protocoloEletronico = $data['protocoloEletronico'];
        $this->NUP = $data['NUP'];
        $this->NUPFormatado = $data['NUPFormatado'];
        $this->visibilidadeExterna = $data['visibilidadeExterna'];
        $this->dataHoraAbertura = $data['dataHoraAbertura'];
        $this->titulo = $data['titulo'];
        $this->chaveAcesso = $data['chaveAcesso'];
        $this->acessoRestrito = $data['acessoRestrito'];
        $this->hasBookmark = $data['hasBookmark'];
        $this->hasFundamentacaoRestricao = $data['hasFundamentacaoRestricao'];
        $this->processoId = $data['id'];
        $this->uuid = $data['uuid'];
        $this->criadoEm = $data['criadoEm'];
        $this->atualizadoEm = $data['atualizadoEm'];
    }
}
