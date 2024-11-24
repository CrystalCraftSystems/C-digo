<?php


class EditarResidencia
{
    public function retornar()
    {

    
        $residencia = (new ResidenciasBanco)->buscarPorIdResidencias($_GET['idResidencia']);
        require __DIR__."/../Public/editarResidencias.php";

        }
}