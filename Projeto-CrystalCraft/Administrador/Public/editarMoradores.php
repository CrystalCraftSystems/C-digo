<?php require __DIR__ . "/cabecalhoAdm.php"; ?>

<style>
    h1 {
        font-family: 'Candara';
    }
</style>

<div class="box">
<h1 class="title has-text-centered"><strong>Cadastrar morador<strong></h1>
    <form action="./index.php?acao=atualizar-moradorAdm" method="post">

    <input class="input" type="hidden" name="idMorador" value="<?= !empty($morador) ? $morador->getIdMorador():''?>">

    <div class="field">

    <label class="label">Nome</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite o nome do morador" name="nomeMorador" value= "<?= !empty($morador) ? $morador->getNomeMorador():''?>">
    </div>
</div>

<div class="field">
    <label class="label">CPF</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite o CPF do morador" name="cpfMorador" value= "<?= !empty($morador) ? $morador->getCpfMorador():''?>">
    </div>
</div>

<div class="field">
    <label class="label">ID da residência</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite o ID da residência do morador" name="idResidenciaMorador" value= "<?= !empty($morador) ? $morador->getIdResidencia():''?>">
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