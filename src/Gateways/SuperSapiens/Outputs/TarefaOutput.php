<?php

namespace AguPessoas\Backend\Gateways\SuperSapiens\Outputs;

class TarefaOutput
{
    public string $type;
    public string $id;
    public string $context;
    public bool $urgente;
    public string $dataHoraInicioPrazo;
    public string $dataHoraFinalPrazo;
    public bool $locked;
    public string $dataHoraDistribuicao;
    public bool $redistribuida;
    public bool $distribuicaoAutomatica;
    public bool $livreBalanceamento;
    public string $auditoriaDistribuicao;
    public int $tipoDistribuicao;
    public bool $isRelevante;
    public int $tarefaId;
    public string $uuid;
    public string $criadoEm;
    public string $atualizadoEm;

    public function __construct(array $data)
    {
        $this->type = $data['@type'];
        $this->id = $data['@id'];
        $this->context = $data['@context'];
        $this->urgente = $data['urgente'];
        $this->dataHoraInicioPrazo = $data['dataHoraInicioPrazo'];
        $this->dataHoraFinalPrazo = $data['dataHoraFinalPrazo'];
        $this->locked = $data['locked'];
        $this->dataHoraDistribuicao = $data['dataHoraDistribuicao'];
        $this->redistribuida = $data['redistribuida'];
        $this->distribuicaoAutomatica = $data['distribuicaoAutomatica'];
        $this->livreBalanceamento = $data['livreBalanceamento'];
        $this->auditoriaDistribuicao = $data['auditoriaDistribuicao'];
        $this->tipoDistribuicao = $data['tipoDistribuicao'];
        $this->isRelevante = $data['isRelevante'];
        $this->tarefaId = $data['id'];
        $this->uuid = $data['uuid'];
        $this->criadoEm = $data['criadoEm'];
        $this->atualizadoEm = $data['atualizadoEm'];
    }
}