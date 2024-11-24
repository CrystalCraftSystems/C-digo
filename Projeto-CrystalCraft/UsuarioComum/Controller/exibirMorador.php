<?php


class ExibirMoradorC{
  public function retornar(){
    
    $moradores = (new MoradoresBanco())->ListarMorador();
    require __DIR__."/../Public/moradores.php";
  }
}