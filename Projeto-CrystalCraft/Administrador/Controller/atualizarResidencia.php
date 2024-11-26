<?php


class AtualizarResidencia
{
    public function retornar()
    {


        $atualizar = (new ResidenciasBanco())->AtualizarResidencia($_POST['idResidencia'], $_POST['numResidencia'],$_POST['bloco'],$_POST['idMoradorResidencia']);




        if (empty($atualizar)) {
            die("Não foi possível atualizar a residência");
        }

        $mensagem = '
    <div class="notification is-success">
        <button class="delete"></button>
            Residência atualizada!
    </div>
    <a href="./index.php?menu=residenciasAdm" class="button is-black is-rounded is-medium is-fullwidth">Voltar!</a>';
        echo $mensagem;
        }
}