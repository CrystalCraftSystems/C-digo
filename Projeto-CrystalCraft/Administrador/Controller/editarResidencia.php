<?php


class EditarResidencia
{
    public function retornar()
    {

    
        $residencia = (new ResidenciasBanco)->buscarPorIdResidencia($_GET['idResidencia']);
        var_dump($residencia);
        require __DIR__."/../Public/editarResidencias.php";

        }
}