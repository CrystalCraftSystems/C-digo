<?php


class ExibirVisitanteC{
  public function retornar(){
    
    $visitantes = (new VisitantesBanco())->ListarVisitanteMorador();
    require __DIR__."/../Public/visitantes.php";
  }
}