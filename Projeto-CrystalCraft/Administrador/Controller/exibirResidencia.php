<?php


class ExibirResidencia{
  public function retornar(){
    
    $residencias = (new ResidenciasBanco())->listarResidenciaMorador();
    require __DIR__."/../Public/residenciasAdm.php";
  }
}