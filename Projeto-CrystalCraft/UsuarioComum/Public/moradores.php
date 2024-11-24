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
                </tr>
            </thead>
            <tbody>
          
                <?php if (isset($moradores)): ?>
                    
                    <?php foreach ($moradores as $morador): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($morador->getIdMorador()); ?></td>
                            <td><?php echo htmlspecialchars($morador->getNomeMorador()); ?></td>
                            <td><?php echo htmlspecialchars($morador->getCpfMorador()); ?></td>
                            <td><?php echo htmlspecialchars($morador->getIdResidencia()); ?></td>
                           
                        
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