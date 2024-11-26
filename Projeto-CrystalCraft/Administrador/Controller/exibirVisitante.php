<?php


class ExibirVisitante{
  public function retornar(){
    
    $visitantes = (new VisitantesBanco())->ListarVisitanteMorador();
    require __DIR__."/../Public/visitantesAdm.php";
  }
}