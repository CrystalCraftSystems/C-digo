<?php


class ExibirHorarioC{
  public function retornar(){
    
    $registros = (new HorariosBanco())->ListarHorario();
    require __DIR__."/../Public/horarios.php";
  }
}