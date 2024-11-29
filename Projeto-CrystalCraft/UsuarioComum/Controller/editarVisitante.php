<?php 
class EditarVisitante
{
    public function retornar()
    {

    
        $visitante = (new VisitantesBanco)->buscarPorIdVisitante($_GET['idVisitante']);
     
        require __DIR__."/../Public/editarVisitantes.php";

        }
} 
?>