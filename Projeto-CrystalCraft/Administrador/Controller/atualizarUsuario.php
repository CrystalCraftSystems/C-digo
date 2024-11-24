<?php


class AtualizarUsuario
{
    public function retornar()
    {


        $atualizar = (new UsuariosBanco())->AtualizarUsuario($_POST['idUsuario'], $_POST['nomeUsuario'],$_POST['senha'],$_POST['emailUsuario'],$_POST['cpfUsuario'],$_POST['dataNascimentoUsuario'],$_POST['permissaoEspecial']);




        if (empty($atualizar)) {
            die("Não foi possível atualizar o usuário");
        }

        $mensagem = '
    <div class="notification is-success">
        <button class="delete"></button>
            Usuário atualizado!
    </div>
    <a href="./index.php">Voltar! </a>';
        echo $mensagem;
        }
}