<?php

class ExcluirMorador{
    public function retornar(){
    $moradores = (new MoradoresBanco())->excluirMorador($_GET['idMorador']);                   
    if (empty($moradores)) {
        die("Não foi possível excluir o morador");
    }

    $mensagem = '
<div class="notification is-success">
    <button class="delete"></button>
        Morador excluído.
</div>
<a href="./index.php">Voltar! </a>';
    echo $mensagem;
    }
}