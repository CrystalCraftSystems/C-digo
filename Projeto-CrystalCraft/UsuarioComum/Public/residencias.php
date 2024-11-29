<?php require __DIR__."/cabecalho.php"; ?>

<style>
    h1 {
        font-family: 'Candara';
    }
</style>

<section class="section">
    <div class="container">
    <h1 class="title has-text-centered"><strong>Listagem de residências<strong></h1><br>
        <table class="table is-fullwidth is-striped">
            <thead>
                <tr>
                    <th>ID Residência</th>
                    <th>Número</th>
                    <th>Bloco</th>
                    <th>ID Morador</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
          
                <?php if (isset($residencias)): ?>
                    
                    <?php foreach ($residencias as $residencia): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($residencia->getIdResidencia()); ?></td>
                            <td><?php echo htmlspecialchars($residencia->getNumResidencia()); ?></td>
                            <td><?php echo htmlspecialchars($residencia->getBloco()); ?></td>
                            <td><?php echo htmlspecialchars($residencia->getIdMorador()); ?></td>
                        
                            
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