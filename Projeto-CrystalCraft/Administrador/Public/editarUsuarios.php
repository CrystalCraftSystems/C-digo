<?php require __DIR__ . "/cabecalhoAdm.php"; ?>

<style>
    h1 {
        font-family: 'Candara';
    }
</style>

<div class="box">

    <h1 class="title has-text-centered"><strong>Editar usuário<strong></h1>
    <form action="./index.php?acao=atualizar-usuarioAdm" method="POST" >
    
         
                <input class="input" type="hidden" name="idUsuario" value="<?= !empty($usuario) ? $usuario->getIdUsuario():''?>">
           
      
        <div class="field">
            <label class="label">Nome</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o nome do usuário" name="nomeUsuario" value= "<?= !empty($usuario) ? $usuario->getNomeUsuario():''?>">
            </div>
        </div>
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o email do usuário" name="emailUsuario" value= "<?= !empty($usuario) ? $usuario->getEmailUsuario():''?>">
            </div>
        </div>
        <div class="field">
            <label class="label">Senha</label>
            <div class="control">
                <input class="input" type="password" placeholder="Digite a senha do usuário" name="senha" value= "<?= !empty($usuario) ? $usuario->getSenha():''?>" required>
            </div>
        </div>

        <div class="field">
            <label class="label">CPF</label>
            <div class="control">
                <input class="input" type="text" placeholder="Digite o CPF do usuário" name="cpfUsuario" value="<?= !empty($usuario) ? $usuario->getCpfUsuario():''?>">
            </div>
        </div>
        <div class="field">
            <label class="label">Data de Nascimento do Usuário</label>
            <div class="control">
                <input class="input" type="date" placeholder="Digite a data de nascimento " name="dataNascimentoUsuario" value= "<?= !empty($usuario) ? $usuario->getDataNascimentoUsuario():''?>">
            </div>
        </div>

        <div class="field">
            <label class="label">Possui permissão especial?</label>
            
                <div class="control is-flex is-justify-content-space-around">
                  
                <label class="radio">
                <input type="radio" name="permissaoEspecial" value="1" <?= !empty($usuario) && $usuario->getPermissaoEspecial() == 1 ? 'checked' :''?> required>
                        Sim
                    </label>
                    <label class="radio">
                    <input type="radio" name="permissaoEspecial" value="0" <?= !empty($usuario) && $usuario->getPermissaoEspecial() == 0 ? 'checked' :''?> >
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