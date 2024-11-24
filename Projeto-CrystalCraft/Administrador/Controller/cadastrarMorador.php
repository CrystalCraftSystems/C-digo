<?php


class cadastrarMorador{
    public function retornar(){
   
      $morador = (new MoradoresBanco())->cadastrarMorador($_POST['idMorador'],$_POST['nomeMorador'], $_POST['cpfMorador'], $_POST['idResidenciaMorador']);
      if($morador){
        $mensagem = '
        <div class="notification is-success">
            <button class="delete"></button>
                Morador cadastrado.
        </div>';
            echo $mensagem;

      }else{
      $mensagem = '
      <div class="notification is-success">
          <button class="delete"></button>
              Morador não cadastrado.
      </div>';
      echo $mensagem;
      }
    }
}