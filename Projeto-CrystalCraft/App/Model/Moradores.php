<?php

class Moradores{

    private string $idMorador;
    private string $nomeMorador;
    private string $cpfMorador;
    public array $residencias = [];
    

 
    public function getidMorador():string
    {
        return $this->idMorador;
    }

    public function setidMorador(string $idMorador)
    {
        $this->idMorador = $idMorador;
    }

    public function getCpfMorador():string
    {
        return $this->cpfMorador;
    }

    public function setCpfMorador(string $cpfMorador)
    {
        $this->cpfMorador = $cpfMorador;
    }

    public function getNomeMorador():string
    {
        return $this->nomeMorador;
    }

    public function setNomeMorador(string $nomeMorador)
    {
        $this->nomeMorador = $nomeMorador;
    }
}

?>