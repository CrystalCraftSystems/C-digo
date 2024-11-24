<?php

class ExcluirVisitante{
    public function retornar(){
    $visitantes = (new VisitantesBanco())->excluirVisitante($_GET['idVisitante']);                   
    if (empty($visitantes)) {
        die("Não foi possível excluir o visitante");
    }

    $mensagem = '
<div class="notification is-success">
    <button class="delete"></button>
        Visitante excluído.
</div>
<a href="./index.php">Voltar! </a>';
    echo $mensagem;
    }
}