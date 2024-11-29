<?php require __DIR__ . "/cabecalhoAdm.php"; ?>

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
                            <td><?php echo htmlspecialchars($morador['IDRESIDENCIA']); ?></td>

                           
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

<br>
<br>


<div class="box">
<h1 class="title has-text-centered"><strong>Cadastrar morador<strong></h1>
    <form action="./index.php?acao=cad-morador" method="post">

    <div class="field">
    <label class="label">ID do morador</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite o ID do morador" name="idMorador" required>
    </div>
</div>

    <div class="field">

    <label class="label">Nome</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite o nome do morador" name="nomeMorador" required>
    </div>
</div>

<div class="field">
    <label class="label">CPF</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite o CPF do morador" name="cpfMorador" required>
    </div>
</div>

<div class="field">
    <label class="label">ID da residência</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite o ID da residência do morador" name="idResidenciaMorador" required>
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