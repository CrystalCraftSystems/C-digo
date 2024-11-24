<?php require __DIR__ . "/../header.php"; ?>
<style>
    h2 {
        font-family: Arial, sans-serif;
        background-color: black;
        color: white;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-image: url("FundoLogin.jpg");
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        display: flex;
        overflow: hidden;
        width: 800px;
        max-width: 100%;
    }

    .left {
        background: #f7f7f7;
        padding: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
    }

    .left img {
        width: 100%;
        max-width: 300px;
    }

    .right {
        padding: 40px;
        flex: 1;
    }

    .right h1 {
        margin: 0 0 20px;
        font-size: 30px;
        color: #333;
        text-align: center;
    }

    .right form {
        display: flex;
        flex-direction: column;
    }

    .right form input {
        margin-bottom: 20px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .right form button {
        padding: 10px;
        font-size: 16px;
        background: black;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .right form button:hover {
        background: #218838;
    }
</style>
<div>
    <h2>➥ Responsável:</h2>
    <img src="logoCrystalCraft.jpeg" width="140px">
</div>

<section class="section">
    <div class="container">

        <div class="left">
            <img src="logoSistemaSFundo.png">
        </div>

        <div class="right">

            <form action="index.php?acao=login" method="post">

                <h1><strong>Login</strong></h1>

                <input class="input" type="text" placeholder="🔑 Digite o seu ID" name="idUsuario" />

                <input class="input" type="email" placeholder="✉️ Digite o seu email" name="emailUsuario" />

                <input class="input" type="password" placeholder="🔒 Digite a sua senha" name="senha" />

                <button type="submit">Entrar</button>

            </form>
        </div>


    </div>
</section>
<?php require __DIR__ . "/../footer.php";
?>