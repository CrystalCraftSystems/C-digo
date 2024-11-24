<?php


class ExibirFuncionarioC{
  public function retornar(){
    
    $funcionarios = (new FuncionariosBanco())->ListarFuncionario();
    require __DIR__."/../Public/funcionarios.php";
  }
}