<?php

class ExcluirFuncionario{
    public function retornar(){
    $funcionarios = (new FuncionariosBanco())->excluirFuncionario($_GET['idFuncionario']);                   
    if (empty($funcionarios)) {
        die("Não foi possível excluir o funcionário");
    }

    $mensagem = '
<div class="notification is-success">
    <button class="delete"></button>
        Funcionário excluído.
</div>
<a href="./index.php">Voltar! </a>';
    echo $mensagem;
    }
}