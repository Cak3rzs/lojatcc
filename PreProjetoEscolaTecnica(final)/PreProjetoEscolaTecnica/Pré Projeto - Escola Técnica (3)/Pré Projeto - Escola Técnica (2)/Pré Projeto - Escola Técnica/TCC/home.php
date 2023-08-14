<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abafá</title>
    <link rel="stylesheet" href="style.css">
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
                            <li><a href="#Home">Home</a></li>
                            <li><a href="#Service">Destaque</a></li>
                            <li><a href="#Contact">Cadastro</a></li>
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
                        <h1 class="color-azul text-gd">Nossas Coleções</h1>
                        <p class="color-azul text-pq">Nossa empresa é responsável e compromissada
                            com o seu estilo. Explore nossas coleções e se sinta confortável em entrar em contato com a marca Abafa.</p>
                        <button>Compre Agora</button>
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


    <section class="max-width bg2" id="About">
        <div class="container">
            <div class="titulo">
                <h2 class="text-md color-cinza-1">Coleções</h2>
                <div class="line">
                    <div class="text-titulo">Conjuntos</div>
                </div>
            </div>
            <div class="down">
            <div class="box">
        <a href="conjuntos.php"> <!-- Adicione o link para a página "conjuntos.php" -->
            <img src="image/fotoroupa13.jpg" alt="">
            <div class="text">
                <h2 class="color-branco">Roupas</h2>
                <p class="color-branco">Roupa Simples </p>
                <i class="fa fa-long-arrow-right"></i>
            </div>
    </div>
    <div class="box">
        <!-- <a href="conjuntos.php"> --> <!-- Adicione o link para a página "conjuntos.php" -->
            <img src="image/fotoroupa17.jpg" alt="">
            <div class="text">
                <h2 class="color-branco">Conjunto Feminino</h2>
                <p class="color-branco">Roupa Simples </p>
                <i class="fa fa-long-arrow-right"></i>
            </div>
        </a>
    </div>
    
    <div class="box">
        <img src="image/fotoroupa5.jpg" alt="">
        <div class="text">
            <h2 class="color-branco">Conjunto Masculino</h2>
            <p class="color-branco">Roupa Simples</p>
            <i class="fa fa-long-arrow-right"></i>
        </div>
    </div>
</div>
</div>

                </div>
            </div>
        </div>
    </section>

    <section class="max-width bg" id="Service">
        <div class="container">
            <div class="content">
                <div class="titulo">
                    <h2 class="text-md color-cinza-1">Destaque</h2>
                    <div class="line">
                        <div class="text-titulo">Promoções</div>
                    </div>
                </div>
                    <input type="radio" name="slider" id="item-1" checked>
                    <input type="radio" name="slider" id="item-2">
                    <input type="radio" name="slider" id="item-3">
                    <div class="cards">
                        <label class="card" for="item-1" id="song-1">
                            <img src="image/fotoroupa11.jpg" alt="">
                            <button>Comprar Agora</button>
                        </label>

                        <label class="card" for="item-2" id="song-2">
                            <img src="image/fotoroupa7.jpg">
                            <button>Comprar Agora</button>
                        </label>

                        <label class="card" for="item-3" id="song-3">
                            <img src="image/fotoroupa10.jpg">
                            <button>Comprar Agora</button>
                        </label>
                    </div>
            </div>
        </div>
    </section>

    <section class="max-width bg2" id="Contact">
        <div class="container">
            <div class="titulo">
                <h2 class="text-md color-cinza-1">Cadastre-se</h2>
                <div class="line">
                    <div class="text-titulo">Fale Conosco</div>
                </div>
            </div>
            <div class="content">
                <div class="left">
                    <div class="box">
                        <h1>Cadastre-se no nosso site!</h1>
                        <form action="perfil.php" method="POST">
                        <input type="submit" value="Entrar">
                        
</form>
            <form action="cadastro.php" method="POST">
            <input type="submit" value="Criar conta">
</form>

                    </div>
                </div>
                <div class="right">
                    <div class="box">
                        <h1>Nosso Endereço</h1>
                        <div class="info">
                            <div class="icons">
                                <i class="fa-solid fa-envelope"></i>
                                <i class="fa-solid fa-phone"></i>
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="text">
                                <p>abafa@gmail.com</p>
                                <p> 61 995846288</p>
                                <p>Brasília, Brasil</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="container">
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