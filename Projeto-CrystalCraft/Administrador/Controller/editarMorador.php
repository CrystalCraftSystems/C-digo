<?php


class EditarMorador
{
    public function retornar()
    {

    
        $morador = (new MoradoresBanco)->buscarPorIdMorador($_GET['idMorador']);
        require __DIR__."/../Public/editarMorador.php";

        }
}