<?php


class ExibirUsuarioC{
  public function retornar(){
    
    $usuarios = (new UsuariosBanco())->ListarUsuario();
    require __DIR__."/../Public/usuarios.php";
  }
}