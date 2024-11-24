<?php


class ExibirFuncionario{
  public function retornar(){
    
    $funcionarios = (new FuncionariosBanco())->ListarFuncionario();
    require __DIR__."/../Public/funcionariosAdm.php";
  }
}