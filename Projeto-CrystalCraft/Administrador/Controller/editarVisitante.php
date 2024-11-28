<?php


class EditarVisitanteAdm
{
    public function retornar()
    {

    
        $visitante = (new VisitantesBanco)->buscarPorIdVisitante($_GET['idVisitante']);
     var_dump($visitante);
        require __DIR__."/../Public/editarVisitantes.php";

        }
}