<?php require __DIR__."/cabecalho.php"; ?>

<style>
    h1 {
        font-family: 'Candara';
    }
</style>

<section class="section">
    <div class="container">
    <h1 class="title has-text-centered"><strong>Listagem de usuários<strong></h1><br>
        <table class="table is-fullwidth is-striped">
            <thead>
                <tr>
                    <th>ID Usuário</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Data de nascimento</th>
                    <th>Permissão Especial</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
          
                <?php if (isset($usuarios)): ?>
                    
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario->getIdUsuario()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getNomeUsuario()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getSenha()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getEmailUsuario()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getCpfUsuario()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getDataNascimentoUsuario()); ?></td>
                            <td><?= $usuario->getPermissaoEspecial() == "1"?"Sim":"Não" ?></td>
                            
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