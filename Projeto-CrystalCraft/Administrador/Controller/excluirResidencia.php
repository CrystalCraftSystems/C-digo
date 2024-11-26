<?php

class ExcluirResidencia{
    public function retornar(){
    $residencias = (new ResidenciasBanco())->excluirResidencia($_GET['idResidencia']);                   
    if (empty($residencias)) {
        die("Não foi possível excluir a residência");
    }

    $mensagem = '
<div class="notification is-success">
    <button class="delete"></button>
        Residência excluída.
</div>
  <a href="./index.php?menu=residenciasAdm" class="button is-black is-rounded is-medium is-fullwidth">Voltar!</a>';
    echo $mensagem;
    }
}