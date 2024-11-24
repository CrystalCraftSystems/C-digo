<?php


class ExibirMorador{
  public function retornar(){
    
    $moradores = (new MoradoresBanco())->ListarMorador();
    require __DIR__."/../Public/moradoresAdm.php";
  }
}