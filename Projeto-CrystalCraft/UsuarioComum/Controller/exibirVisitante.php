<?php


class ExibirVisitanteC{
  public function retornar(){
    
    $visitantes = (new VisitantesBanco())->ListarVisitante();
    require __DIR__."/../Public/visitantes.php";
  }
}