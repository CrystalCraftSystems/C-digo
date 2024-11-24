<?php

class cadastrarUsuario{
    public function retornar(){
      $usuario = (new UsuariosBanco())->cadastrarUsuario($_POST['idUsuario'],$_POST['nomeUsuario'],$_POST['senha'], $_POST['emailUsuario'], $_POST['cpfUsuario'], $_POST['dataNascimentoUsuario'],$_POST['permissao']);
      if($usuario){
        $mensagem = '
        <div class="notification is-success">
            <button class="delete"></button>
                Usuário cadastrado.
        </div>';
            echo $mensagem;

      }else{
      $mensagem = '
      <div class="notification is-success">
          <button class="delete"></button>
              Usuário não cadastrado.
      </div>';
      echo $mensagem;
      }
    }
}