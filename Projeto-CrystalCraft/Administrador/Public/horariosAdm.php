<?php require __DIR__ . "/cabecalhoAdm.php"; ?>

<style>
    h1 {
        font-family: 'Candara';
    }
</style>

<section class="section">
    <div class="container">
    <h1 class="title has-text-centered"><strong>Listagem de horários de entrada e saída<strong></h1><br>
        <table class="table is-fullwidth is-striped">
            <thead>
                <tr>
                    <th>ID Visitante</th>
                    <th>ID Registro</th>
                    <th>Placa do veículo</th>
                    <th>Data do registro</th>
                    <th>Hora da entrada</th>
                    <th>Hora da saída</th>
                </tr>
            </thead>
            <tbody>
          
                <?php if (isset($registros)): ?>
                    
                    <?php foreach ($registros as $registro): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($registro->getIdVisitante()); ?></td>
                            <td><?php echo htmlspecialchars($registro->getIdRegistro()); ?></td>
                            <td><?php echo htmlspecialchars($registro->getPlacaVeiculo()); ?></td>
                            <td><?php echo htmlspecialchars($registro->getDataRegistro()); ?></td>
                            <td><?php echo htmlspecialchars($registro->getHoraEntrada()); ?></td>
                            <td><?php echo htmlspecialchars($registro->getHoraSaida()); ?></td>
                           
                            <td>
                                <a class="button is-small is-info" href="./index.php?acao=editar-horario&idRegistro=<?=$registro->getIdRegistro()?>">Editar</a>
                                <a class="button is-small is-danger" href="./index.php?acao=excluir-horario&idRegistro=<?=$registro->getIdRegistro()?>">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="has-text-centered"><strong>Base de dados vazia!</strong></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

<br>
<br>


<div class="box">
<h1 class="title has-text-centered"><strong>Registrar horários de entrada e saída<strong></h1>
    <form action="./index.php?acao=cad-horario" method="post">
       
    <div class="field">
            <label class="label">ID do visitante</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o ID do visitante" name="idVisitanteHorario" required>
            </div>
        </div>

        <div class="field">
            <label class="label">ID do registro</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o ID" name="idRegistro" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Placa do veículo</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite a placa do veículo" name="placaVeiculo">
            </div>
        </div>

        <div class="field">
            <label class="label">Data do registro</label>
            <div class="control">
                <input class="input" type="date" placeholder="Digite a data do registro" name="dataRegistro" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Horário de entrada</label>
            <div class="control">
                <input class="input" type="time" placeholder="Digite o horário da entrada" name="horaEntrada">
            </div>
        </div>

        <div class="field">
            <label class="label">Horário saída</label>
            <div class="control">
                <input class="input" type="time" placeholder="Digite o horário da saída" name="horaSaida">
            </div>
        </div>



            <br>
       

        <div class="field">
            <div class="control">
                <input type="submit" class="button is-black is-fullwidth" value="Confirmar">
            </div>
        </div>
</div>

    </form>

    <?php require __DIR__."/../../footer.php"; ?>