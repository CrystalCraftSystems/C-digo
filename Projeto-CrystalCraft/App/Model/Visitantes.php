<?php

class Visitantes{

    public string $idVisitante;
    private string $nomeVisitante;
    private string $descricaoVisitante;
    public array $moradores = [];

    
    public function getIdVisitante():string
    {
        return $this->idVisitante;
    }

    public function setIdVisitante(string $idVisitante)
    {
        $this->idVisitante = $idVisitante;
    }

    public function getNomeVisitante():string
    {
        return $this->nomeVisitante;
    }

    public function setNomeVisitante(string $nomeVisitante)
    {
        $this->nomeVisitante = $nomeVisitante;
    }
 
    public function getDescricaoVisitante():string
    {
        return $this->descricaoVisitante;
    }

    public function setDescricaoVisitante(string $descricaoVisitante)
    {
        $this->descricaoVisitante = $descricaoVisitante;
    }



    public function getMoradores()
    {
        return $this->moradores;
    }

    public function setMoradores($moradores)
    {
        $this->moradores[] = $moradores;
    }
}

?>