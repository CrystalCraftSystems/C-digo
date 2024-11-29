<?php


class AtualizarResidencia
{
    public function retornar()
    {


        $atualizar = (new ResidenciasBanco())->AtualizarResidencia($_POST['idResidencia'], $_POST['numResidencia'],$_POST['bloco'],$_POST['idMoradorResidencia']);




        if (isset($atualizar)&&(($_POST['idMoradorResidencia']==null)|| ($_POST['idMoradorResidencia']!=null))) {

            $mensagem = '
    <div class="notification is-success">
        <button class="delete"></button>
            Residência atualizada!
    </div>
    <a href="./index.php?menu=residenciasAdm" class="button is-black is-rounded is-medium is-fullwidth">Voltar!</a>';
        echo $mensagem;

        }else {
            die("Não foi possível atualizar a residência");
        
        }
        }
}