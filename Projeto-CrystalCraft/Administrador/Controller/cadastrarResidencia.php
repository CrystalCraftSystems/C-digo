<?php

class cadastrarResidencia{
    public function retornar(){
    
      $residencia = (new ResidenciasBanco())->cadastrarResidencia($_POST['idResidencia'],$_POST['numResidencia'], $_POST['bloco'],  $_POST['idMoradorResidencia']);
      if($residencia){
        $mensagem = '
        <div class="notification is-success">
            <button class="delete"></button>
                Residência cadastrada.
        </div>';
            echo $mensagem;

      }else{
      $mensagem = '
      <div class="notification is-success">
          <button class="delete"></button>
              Residência não cadastrada.
      </div>';
      echo $mensagem;
      }
    }
}