<?php


class EditarFuncionario
{
    public function retornar()
    {

    
        $funcionario = (new FuncionariosBanco)->buscarPorIdFuncionario($_GET['idFuncionario']);
        require __DIR__."/../Public/editarFuncionarios.php";

        }
}