<?php


class EditarVisitanteAdm
{
    public function retornar()
    {

    
        //$visitante = (new VisitantesBanco)->buscarPorIdVisitante($_GET['idVisitante']);
       

        $visitante = new EditarVisitante(); $visitante->retornar();
        require __DIR__."/../Public/editarVisitantes.php";

        }
}