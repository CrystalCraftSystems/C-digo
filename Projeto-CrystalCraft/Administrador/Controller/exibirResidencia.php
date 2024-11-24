<?php


class ExibirResidencia{
  public function retornar(){
    
    $residencias = (new ResidenciasBanco())->ListarResidencia();
    require __DIR__."/../Public/residenciasAdm.php";
  }
}