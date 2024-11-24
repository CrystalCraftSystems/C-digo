<?php


class AtualizarHorario
{
    public function retornar()
    {


        $atualizar = (new HorariosBanco())->AtualizarHorario($_POST['idRegistro'], $_POST['dataRegistro'],$_POST['horaEntrada'],$_POST['horaSaida'],$_POST['placaVeiculo'],$_POST['idVisitanteHorario']);




        if (empty($atualizar)) {
            die("Não foi possível atualizar o registro");
        }

        $mensagem = '
    <div class="notification is-success">
        <button class="delete"></button>
           Registro atualizado!
    </div>
    <a href="./index.php">Voltar! </a>';
        echo $mensagem;
        }
}