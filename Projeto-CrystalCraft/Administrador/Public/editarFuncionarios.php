<?php require __DIR__ . "/cabecalhoAdm.php"; ?>

<style>
    h1 {
        font-family: 'Candara';
    }
</style>


<div class="box">
<h1 class="title has-text-centered"><strong>Editar funcionário<strong></h1>
    <form action="./index.php?acao=atualizar-funcionario" method="post">
        

    <input class="input" type="hidden" name="idFuncionario" value="<?= !empty($funcionario) ? $funcionario->getIdFuncionario():''?>">

            <label class="label">Nome</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o nome do funcionário" name="nomeFuncionario" value= "<?= !empty($funcionario) ? $funcionario->getNomeFuncionario():''?>">
            </div>
      

        <div class="field">
            <label class="label">CPF</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o CPF do funcionário" name="cpfFuncionario" value= "<?= !empty($funcionario) ? $funcionario->getCpfFuncionario():''?>">
            </div>
        </div>

        <div class="field">
            <label class="label">Data de nascimento</label>
            <div class="control">
                <input class="input" type="date" placeholder="Digite a data de nascimento" name="dataNascimentoFuncionario" value= "<?= !empty($funcionario) ? $funcionario->getDataNascimentoFuncionario():''?>">
            </div>
        </div>

        <div class="field">
            <label class="label">Função</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite a função do funcionário" name="funcaoFuncionario" value= "<?= !empty($funcionario) ? $funcionario->getFuncaoFuncionario():''?>">
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