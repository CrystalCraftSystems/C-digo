<?php

class Moradores{

    private string $idMorador;
    private string $nomeMorador;
    private string $cpfMorador;
    public  $residencia;
    
 public function setResidencia(Residencias $residencia) { 
    $this->residencia = $residencia;
 }

 public function getidResidencia(): string { 
    return $this->residencia->getidResidencia();
 }
 
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