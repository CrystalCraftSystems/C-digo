<?php require __DIR__ . "/cabecalhoAdm.php"; ?>

<style>
    h1 {
        font-family: 'Candara';
    }
</style>

<div class="box">
<h1 class="title has-text-centered"><strong>Editar visitantes<strong></h1>
    <form action="./index.php?acao=atualizar-visitanteAdm" method="post">

    <input class="input" type="hidden" name="idVisitante" value="<?= !empty($visitante) ? $visitante['IDVISITANTE']:''?>">

<div class="field">
    <label class="label">Nome</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite o nome do visitante" name="nomeVisitante" value= "<?= !empty($visitante) ? $visitante['NOMEVISITANTE']:''?>">
    </div>
</div>

<div class="field">
    <label class="label">Descrição</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite a descrição do visitante" name="descricaoVisitante" value= "<?= !empty($visitante) ? $visitante['DESCRICAOVISITANTE']:''?>">
    </div>
</div>

<div class="field">
    <label class="label">ID do morador visitado</label>
    <div class="control">
        <input class="input" type="text" placeholder="Digite o ID do morador visitado" name="idMoradorVisitante" value= "<?= !empty($visitante) ? $visitante['IDMORADOR']:''?>">
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