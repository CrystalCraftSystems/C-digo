<?php


class cadastrarFuncionario{
    public function retornar(){
   
      $funcionario = (new FuncionariosBanco())->cadastrarFuncionario($_POST['idFuncionario'],$_POST['nomeFuncionario'], $_POST['cpfFuncionario'], $_POST['dataNascimentoFuncionario'],$_POST['funcaoFuncionario']);
      if($funcionario){
        $mensagem = '
        <div class="notification is-success">
            <button class="delete"></button>
                Funcionário cadastrado.
        </div>';
            echo $mensagem;

      }else{
      $mensagem = '
      <div class="notification is-success">
          <button class="delete"></button>
              Funcionário não cadastrado.
      </div>';
      echo $mensagem;
      }
    }
}