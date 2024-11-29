<?php require __DIR__ . "/cabecalhoAdm.php"; ?>

<style>
    h1 {
        font-family: 'Candara';
    }
</style>

<section class="section">
    <div class="container">
    <h1 class="title has-text-centered"><strong>Listagem de funcionários<strong></h1><br>
        <table class="table is-fullwidth is-striped">
            <thead>
                <tr>
                    <th>ID Funcionário</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de nascimento</th>
                    <th>Função</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
          
                <?php if (isset($funcionarios)): ?>
                    
                    <?php foreach ($funcionarios as $funcionario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($funcionario->getIdFuncionario()); ?></td>
                            <td><?php echo htmlspecialchars($funcionario->getNomeFuncionario()); ?></td>
                            <td><?php echo htmlspecialchars($funcionario->getCpfFuncionario()); ?></td>
                            <td><?php echo htmlspecialchars($funcionario->getDataNascimentoFuncionario()); ?></td>
                            <td><?php echo htmlspecialchars($funcionario->getFuncaoFuncionario()); ?></td>
                           
                            <td>
                                <a class="button is-small is-info" href="./index.php?acao=editar-funcionario&idFuncionario=<?=$funcionario->getIdFuncionario()?>">Editar</a>
                                <a class="button is-small is-danger" href="./index.php?acao=excluir-funcionario&idFuncionario=<?=$funcionario->getIdFuncionario()?>">Excluir</a>
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
<h1 class="title has-text-centered"><strong>Cadastrar funcionário<strong></h1>
    <form action="./index.php?acao=cad-funcionario" method="post">
        <div class="field">

        <div class="field">
            <label class="label">ID do funcionário</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o ID do funcionário" name="idFuncionario" required>
            </div>
        </div>

            <label class="label">Nome</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o nome do funcionário" name="nomeFuncionario" required>
            </div>
        </div>

        <div class="field">
            <label class="label">CPF</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o CPF do funcionário" name="cpfFuncionario" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Data de nascimento</label>
            <div class="control">
                <input class="input" type="date" placeholder="Digite a data de nascimento" name="dataNascimentoFuncionario" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Função</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite a função do funcionário" name="funcaoFuncionario" required>
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