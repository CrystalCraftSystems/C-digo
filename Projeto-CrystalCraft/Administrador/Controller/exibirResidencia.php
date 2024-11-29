<?php


class ExibirResidencia{
  public function retornar(){
    
    $residencias = (new ResidenciasBanco())->listarResidencia();
   
    require __DIR__."/../Public/residenciasAdm.php";
  }
}