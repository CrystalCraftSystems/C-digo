<?php


class ExibirHorario{
  public function retornar(){
    
    $registros = (new HorariosBanco())->ListarHorario();
    require __DIR__."/../Public/horariosAdm.php";
  }
}