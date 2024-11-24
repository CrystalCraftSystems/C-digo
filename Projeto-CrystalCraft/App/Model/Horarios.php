<?php

class Horarios{
    
    public $visitante;
    private string $idRegistro;
    private string $dataRegistro;
    private string $horaEntrada;
    private string $horaSaida;
    private string $placaVeiculo;

    public function setVisitante (Visitantes $visitante) { 
        $this->visitante = $visitante;
     }
    
     public function getIdVisitante(): string { 
        return $this->visitante->getIdVisitante();
     }


    public function getIdRegistro():string
    {
        return $this->idRegistro;
    }

    public function setIdRegistro(string $idRegistro)
    {
        $this->idRegistro = $idRegistro;
    }
 
    public function getDataRegistro():string
    {
        return $this->dataRegistro;
    }

 
    public function setDataRegistro(string $dataRegistro)
    {
        $this->dataRegistro = $dataRegistro;
    }

    public function getHoraEntrada():string
    {
        return $this->horaEntrada;
    }
 
    public function setHoraEntrada(string $horaEntrada)
    {
        $this->horaEntrada = $horaEntrada;
    }

    public function getHoraSaida():string
    {
        return $this->horaSaida;
    }

    public function setHoraSaida(string $horaSaida)
    {
        $this->horaSaida = $horaSaida;
    }

    public function getPlacaVeiculo():string
    {
        return $this->placaVeiculo;
    }

    public function setPlacaVeiculo(string $placaVeiculo)
    {
        $this->placaVeiculo = $placaVeiculo;
    }
}

?>