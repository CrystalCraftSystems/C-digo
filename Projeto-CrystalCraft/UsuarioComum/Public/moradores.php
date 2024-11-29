<?php require __DIR__."/cabecalho.php"; ?>

<style>
    h1 {
        font-family: 'Candara';
    }
</style>

<section class="section">
    <div class="container">
    <h1 class="title has-text-centered"><strong>Listagem de moradores<strong></h1><br>
        <table class="table is-fullwidth is-striped">
            <thead>
                <tr>
                    <th>ID Morador</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>ID residência</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
          
            <?php if (isset($moradores)): ?>
                    
                    <?php foreach ($moradores as $morador): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($morador['morador']); ?></td>
                            <td><?php echo htmlspecialchars($morador['NOMEMORADOR']); ?></td>
                            <td><?php echo htmlspecialchars($morador['CPFMORADOR']); ?></td>
                            <td><?php echo htmlspecialchars ($morador['residencia']); ?></td>
                           
                            <td>
                                <a class="button is-small is-info" href="./index.php?acao=editar-morador&idMorador=<?=$morador['morador']?>">Editar</a>
                                <a class="button is-small is-danger" href="./index.php?acao=excluir-morador&idMorador=<?=$morador['morador']?>">Excluir</a>
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
<?php require __DIR__."/../../footer.php"; ?>