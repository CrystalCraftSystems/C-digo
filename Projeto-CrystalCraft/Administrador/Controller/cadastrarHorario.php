<?php


class cadastrarHorario{
    public function retornar(){
   
      $horario = (new HorariosBanco())->cadastrarHorario($_POST['idVisitanteHorario'],$_POST['idRegistro'], $_POST['dataRegistro'], $_POST['horaEntrada'],$_POST['horaSaida'], $_POST['placaVeiculo']);
      if($horario){
        $mensagem = '
        <div class="notification is-success">
            <button class="delete"></button>
                Registro de entrada/saída cadastrado com sucesso.
        </div>';
            echo $mensagem;

      }else{
      $mensagem = '
      <div class="notification is-success">
          <button class="delete"></button>
               Registro de entrada/saída não foi cadastrado.
      </div>';
      echo $mensagem;
      }
    }
}