<?php


class EditarUsuario
{
    public function retornar()
    {

    
        $usuario = (new UsuariosBanco)->buscarPorIdUsuario($_GET['idUsuario']);
        require __DIR__."/../Public/editarUsuarios.php";

        }
}