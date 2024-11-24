<?php


class validarUsuario
{
    public function retornar()
    {
        

        if ($_POST['idUsuario'] == "") {
            $mensagem = '
        <div class="notification is-danger">
            <button class="delete"></button>
                ID do usuário está vazio
        </div>';
            die($mensagem);
        }

        if ($_POST['emailUsuario'] == "") {
            $mensagem = '
        <div class="notification is-danger">
            <button class="delete"></button>
                Email vazio
        </div>';
            die($mensagem);
        }
        if ($_POST['senha'] == "") {
            $mensagem = '
        <div class="notification is-danger">
            <button class="delete"></button>
                Senha vazia
        </div>';
            die($mensagem);
        }


        $usuarioExiste = (new UsuariosBanco())->verificarSeExiste($_POST['idUsuario'], $_POST['emailUsuario'], $_POST['senha']);

        if (empty($usuarioExiste)) {
            die("Este usuário não existe!");
        }
        $_SESSION['login'] = true;
        $mensagem = '
    <div class="notification is-success">
        <button class="delete"></button>
            Usuário logado
    </div>';
        echo $mensagem;
        $usuarios = (new UsuariosBanco())->ListarUsuario();

        $user = (new UsuariosBanco())->verificarSeAdmin($_POST['idUsuario']);
        
        if ($user) {
           $_SESSION['login']=true;
           $_SESSION['adm'] = true;
           
        } else {
            $_SESSION['login']=true; // É uma variavel global inicializada pela sessão
            $_SESSION['adm'] = false;
           
        }

    }
}