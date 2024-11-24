<?php


class ExibirVisitante{
  public function retornar(){
    
    $visitantes = (new VisitantesBanco())->ListarVisitante();
    require __DIR__."/../Public/visitantesAdm.php";
  }
}