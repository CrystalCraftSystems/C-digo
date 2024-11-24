<?php


class cadastrarVisitante{
    public function retornar(){
    
      $visitante = (new VisitantesBanco())->cadastrarVisitante($_POST['idVisitante'],$_POST['nomeVisitante'], $_POST['descricaoVisitante'], $_POST['idMoradorVisitante']);
      if($visitante){
        $mensagem = '
        <div class="notification is-success">
            <button class="delete"></button>
                Visitante cadastrado.
        </div>';
            echo $mensagem;

      }else{
      $mensagem = '
      <div class="notification is-success">
          <button class="delete"></button>
              Visitante não cadastrado.
      </div>';
      echo $mensagem;
      }
    }
}