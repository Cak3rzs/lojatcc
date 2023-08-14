<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abafá - Catálogos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
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
                        <li><a href="home.php">Home</a></li>
                        <li><a href="#About">Novidades</a></li>
                        <li><a href="cadastro.php">Cadastro</a></li>
                    </ul>
                </div>
            </nav>
            <div class="call">
                <div class="left">
                    <h1 class="color-azul text-gd">Roupas e Conjuntos</h1>
                    <p class="color-azul text-pq">Bem-vindo ao universo da moda onde a nossa empresa, empenhada e dedicada ao seu estilo pessoal, espera encantá-lo. Prepare-se para explorar nossas coleções exclusivas, cuidadosamente criadas para expressar a sua individualidade com elegância e conforto incomparáveis.</p>
                    <button>Compre Agora</button>
                </div>
                <div class="right">
                    <div class="imagem">
                        <img src="image/prancheta\1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <button id="back-to-top">Home</button>
    </header>

    <section>
        <div class="container">
            <div class="titulo">
                <h2 class="text-md color-cinza-1">Coleções</h2>
                <div class="line"></div><br><br>
                <div class="owl-carousel">
                    <div class="item">
                        <img src="image/fotoroupa13.jpg" alt="">
                        <div class="text">
                            <h2 class="color-branco">Roupas</h2>
                            <p class="color-branco">Roupa Simples</p>
                            <p class="color-branco">Preço: $49.99</p>
                            <p class="color-branco">Descrição: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <button onclick="addToCart('Roupas', 'Roupa Simples', 49.99)">Adicionar ao Carrinho</button>
                        </div>
                    </div>
                    <div class="item">
                        <img src="image/fotoroupa17.jpg" alt="">
                        <div class="text">
                            <h2 class="color-branco">Conjunto Feminino</h2>
                            <p class="color-branco">Roupa Simples</p>
                            <p class="color-branco">Preço: $59.99</p>
                            <p class="color-branco">Descrição: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <button onclick="addToCart('Conjunto Feminino', 'Roupa Simples', 59.99)">Adicionar ao Carrinho</button>
                        </div>
                    </div>
                    <div class="item">
                        <img src="image/fotoroupa2.jpg" alt="">
                        <div class="text">
                            <h2 class="color-branco">Conjunto Masculino</h2>
                            <p class="color-branco">Roupa Simples</p>
                            <p class="color-branco">Preço: $39.99</p>
                            <p class="color-branco">Descrição: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <button onclick="addToCart('Conjunto Masculino', 'Roupa Simples', 39.99)">Adicionar ao Carrinho</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        });

        function addToCart(itemName, itemDescription, itemPrice) {
            console.log('Item adicionado ao carrinho:');
            console.log('Nome: ' + itemName);
            console.log('Descrição: ' + itemDescription);
            console.log('Preço: ' + itemPrice);
        }
    </script>
</body>