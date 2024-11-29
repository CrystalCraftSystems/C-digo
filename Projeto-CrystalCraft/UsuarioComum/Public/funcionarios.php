<?php require __DIR__."/cabecalho.php"; ?>
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
<?php require __DIR__."/../../footer.php"; ?>