<?php

class ExcluirUsuario{
    public function retornar(){
    $usuarios = (new UsuariosBanco())->excluirUsuario($_GET['idUsuario']);                   
    if (empty($usuarios)) {
        die("Não foi possível excluir o usuário");
    }

    $mensagem = '
<div class="notification is-success">
    <button class="delete"></button>
        Usuário excluído.
</div>
<a href="./index.php">Voltar! </a>';
    echo $mensagem;
    }
}