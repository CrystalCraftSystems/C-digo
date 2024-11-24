<?php


class ExibirUsuario{
  public function retornar(){
    
    $usuarios = (new UsuariosBanco())->ListarUsuario();
    require __DIR__."/../Public/usuariosAdm.php";
  }
}