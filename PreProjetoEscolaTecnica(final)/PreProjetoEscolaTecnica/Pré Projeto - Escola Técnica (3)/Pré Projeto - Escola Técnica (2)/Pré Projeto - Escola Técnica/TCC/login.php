<?php
session_start();

// Verificar se o usuário já está autenticado
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: perfil.php");
    exit;
}

// Incluir o arquivo de configuração do banco de dados
require_once "config.php";

// Definir variáveis vazias para o nome de usuário e senha
$username = $password = "";
$username_err = $password_err = "";

// Processar o envio do formulário de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o nome de usuário está vazio
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, insira o nome de usuário.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Verificar se a senha está vazia
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor, insira a senha.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validar as credenciais de login
    if (empty($username_err) && empty($password_err)) {
        // Preparar a consulta SQL
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = $username;

            // Executar a consulta
            if ($stmt->execute()) {
                $stmt->store_result();

                // Verificar se o nome de usuário existe e obter a senha hash correspondente
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        // Verificar a senha
                        if (password_verify($password, $hashed_password)) {
                            // Senha correta, iniciar uma nova sessão
                            session_start();

                            // Armazenar dados na sessão
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirecionar para a página de perfil
                            header("location: perfil.php");
                        } else {
                            // Senha incorreta
                            $password_err = "A senha digitada está incorreta.";
                        }
                    }
                } else {
                    // Nome de usuário não encontrado
                    $username_err = "Nenhuma conta encontrada com esse nome de usuário.";
                }
            } else {
                echo "Oops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        $stmt->close();
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abafá</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
<body>

    <header class="max-width bg" id="Home">
            <div class="container">
                <nav class="menu">
                    <div class="logo"></div>
                    <div class="desktop-menu">
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="cadastro.php">Cadastro</a></li>
                            <li><a href="carrinho.php"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>

                    <div class="mobile-menu" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                        <ul id="myLinks">
                            <li><a href="#Home">Home</a></li>
                            <li><a href="#About">Novidades</a></li>
                            <li><a href="#Service">Destaque</a></li>
                            <li><a href="#Contact">Contato</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="call">
                    <div class="left">
                        <h1 class="color-azul text-gd">Faça seu login logo abaixo:</h1>
                    </div>
                    <div class="right">
                        <div class="imagem">
                            <img src="image/prancheta\1.png" alt=""> <!-- Imagem principal do começo-->
                        </div>
    
                    </div>
                </div>
            </div>
            <button id="back-to-top" >Home</button>
    </header>
    <section class="max-width" id="Contact">>
    <div class="container">
                <div class="titulo">
                    <br>
                    <div class="line">
                    <div class="text-titulo"></div>
</div>
<div class="content">
                <div class="left">
                    <div class="box">
                    <div class="content">
                    <h1 class="color-azul text-gd">Login</h1>
                    <div class="left">  
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form">
    <div class="form-group">
        <input type="text" id="username" placeholder="Nome de usuário" name="username" value="<?php echo $username; ?>" class="form-control">
        <span class="error"><?php echo $username_err; ?></span>
    </div>
    <div class="form-group">
        <input type="password" id="password" placeholder="Senha" name="password" class="form-control">
        <span class="error"><?php echo $password_err; ?></span>
    </div>
    <div>
        <input type="submit" value="Login" class="btn-login">
    </div>
    <p>Ainda não possui uma conta? <a href="cadastro.php">Registre-se</a>.</p>
</form>
</div>
    </div>
                   
</section>
<!-- <section class="max-width" id="Contact">
        <div class="container">
            <div class="titulo"> 
                <br>
                
                <h2 class="text-md color-cinza-1">Cadastre-se</h2>
                <div class="line">
                    <div class="text-titulo"></div>
                </div>
            </div>
            <div class="content">
                <div class="left">
                    <div class="box">
                    <div class="content">
    <h1 class="color-azul text-gd">Crie sua conta</h1>
                    <div class="left">  
                        <p class="color-azul text-pq"> Aqui você pode criar uma conta para aproveitar ao máximo nosso site ❤</p>
    </div>
    <form action="cadastro.php" method="POST">
                        <input type="text" placeholder="Nome Completo" name="nome">
                        <input type="email" placeholder="Seu E-mail" name="email">
                        <input type="password" placeholder="Sua Senha" name="senha">
                        <input type="number" placeholder="Seu CPF" name="cpf">
                        <input type="submit" value="Criar conta">

    </form>
                    
                    </div>
                </div>
</div>
</section>-->
   

    <footer>
        
        <div class="container">
            <img src="image/fotologo.png" alt="">
            <p class="text-pq">Copyright © 2023 <span class="color-laranja">FRONT</span> All Rights Reserved</p>
            <p class="text-pq">Tel: +55 61 995846288</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>


       function myFunction() {
            var x = document.getElementById("myLinks");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
}

            var btn = document.querySelector("#back-to-top");
            btn.addEventListener("click", function() {
                window.scrollTo(0, 0);
            });
    </script>
</body>
</html>