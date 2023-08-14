<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc_escola";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se as chaves existem no array $_POST
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"])) {
        // Obter os valores dos campos do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // Inserir os dados no banco de dados
        $sql = "INSERT INTO perfis (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if ($conn->query($sql) === TRUE) {
            // Cadastro bem-sucedido
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            header("Location: perfil.php");
            // Redirecionar para a página de login, por exemplo:
            // header("Location: login.php");
        } else {
            // Erro no cadastro
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abafá</title>
    <link rel="stylesheet" href="stylecadastro.css">
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
                        <h1 class="color-azul text-gd">Cadastro:</h1>
                        <p class="color-azul text-pq">De forma simples, você pode criar sua conta preenchendo o formulário abaixo:</p>
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
<br>
<br>
    <section class="max-width" id="Contact">
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
</section>
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

    
    