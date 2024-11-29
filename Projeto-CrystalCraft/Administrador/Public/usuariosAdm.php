<?php require __DIR__ . "/cabecalhoAdm.php"; ?>

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
                            <td>
                                <a class="button is-small is-info" href="./index.php?acao=editar-usuario&idUsuario=<?=$usuario->getIdUsuario()?>">Editar</a>
                                <a class="button is-small is-danger" href="./index.php?acao=excluir-usuario&idUsuario=<?=$usuario->getIdUsuario()?>">Excluir</a>
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

    <h1 class="title has-text-centered"><strong>Cadastrar usuário<strong></h1>
    <form action="./index.php?acao=cad-usuario" method="POST" >
    <div class="field">
            <label class="label">ID do Usuário</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o ID do usuário" name="idUsuario" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Nome</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o nome do usuário" name="nomeUsuario" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o email do usuário" name="emailUsuario" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Senha</label>
            <div class="control">
                <input class="input" type="password" placeholder="Digite a senha do usuário" name="senha" required>
            </div>
        </div>

        <div class="field">
            <label class="label">CPF</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o CPF do usuário" name="cpfUsuario" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Data de Nascimento do Usuário</label>
            <div class="control">
                <input class="input" type="date" placeholder="Digite a data de nascimento " name="dataNascimentoUsuario" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Possui permissão especial?</label>
            
                <div class="control is-flex is-justify-content-space-around">
                  
                <label class="radio">
                <input type="radio" name="permissao" value="1" <?= !empty($usuario) && $usuario->getPermissaoEspecial() == 1 ? 'checked' :''?> required>
                        Sim
                    </label>
                    <label class="radio">
                    <input type="radio" name="permissao" value="0" <?= !empty($usuario) && $usuario->getPermissaoEspecial() == 0 ? 'checked' :''?> >
                        Não
                    </label>
                </div>
                
            </div>
            <br>
       

        <div class="field">
            <div class="control">
                <input type="submit" class="button is-black is-fullwidth" value="Confirmar">
            </div>
        </div>
    </form>
</div>

<?php require __DIR__."/../../footer.php"; ?>