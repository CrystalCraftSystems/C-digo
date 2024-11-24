<?php


class ExibirResidenciaC{
  public function retornar(){
    
    $residencias = (new ResidenciasBanco())->ListarResidencia();
    require __DIR__."/../Public/residencias.php";
  }
}