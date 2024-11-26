<?php


class AtualizarVisitante
{
    public function retornar()
    {


        $atualizar = (new VisitantesBanco())->AtualizarVisitante($_POST['idVisitante'], $_POST['nomeVisitante'],$_POST['descricaoVisitante'],$_POST['idMoradorVisitante']);




        if (empty($atualizar)) {
            die("Não foi possível atualizar o visitante");
        }

        $mensagem = '
    <div class="notification is-success">
        <button class="delete"></button>
           Visitante atualizado!
    </div>
    <a href="./index.php?menu=visitantes" class="button is-black is-rounded is-medium is-fullwidth">Voltar!</a>';
        echo $mensagem;
        }
}