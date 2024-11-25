<?php


class AtualizarFuncionario
{
    public function retornar()
    {


        $atualizar = (new FuncionariosBanco())->AtualizarFuncionario($_POST['idFuncionario'], $_POST['nomeFuncionario'],$_POST['cpfFuncionario'],$_POST['dataNascimentoFuncionario'],$_POST['funcaoFuncionario']);




        if (empty($atualizar)) {
            die("Não foi possível atualizar o funcionário");
        }

        $mensagem = '
    <div class="notification is-success">
        <button class="delete"></button>
            Funcionário atualizado!
    </div>
    <a href="./index.php?menu=funcionariosAdm">Voltar! </a>';
        echo $mensagem;
        }
}