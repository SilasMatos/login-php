<?php
include ('conexao.php');
if(isset($_POST['email']) || isset($_POST['senha'])){
    if(strlen($_POST['email']) == 0){
        echo "Preencha seu email";
    }else if(strlen($_POST['senha']) == 0){
        echo "Preencha sua senha";
    }else{
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" .$mysqli->error);
        
    $quantidade = $sql_query->num_rows;


    if($quantidade == 1){
        $usuario = $sql_query->fetch_assoc();
    }else{
        echo "Falha ao logar! E-mail ou senha incorretos";
    }
    
    
    
    }



}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">

    <title>Login</title>
</head>

<body>


    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Cadastre-se</h1>

                <input type="text" placeholder="Nome" />
                <input type="email" placeholder="Email" />
                <input type="senha" placeholder="Senha" />

                <label for="conta" id="conta">Conta:</label>

                <select name="contas" id="opcao_conta">

                    <option value="trp">Professor</option>

                    <option value="tpa">Aluno</option>

                </select>

                <button id="sing-up-low">Criar</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Entrar</h1>


                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Senha" />
                <a href="#">Esqueceu sua senha?</a>
                <button><a href="index.php?r=inicio" id="link-txt">Entrar</a></button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bem vindo de volta!</h1>
                    <p>Para se manter conectado conosco, faça o login com suas informações pessoais</p>
                    <button class="ghost" id="signIn">Entrar</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Seja bem Vindo!</h1>
                    <p>Use sua conta como Aluno(a) ou Professor(a) para entrar.</p>
                    <button class="ghost" id="signUp">Cadastre-se</button>
                </div>
            </div>
        </div>
    </div>

    <script src="login.js"></script>

</body>

</html>