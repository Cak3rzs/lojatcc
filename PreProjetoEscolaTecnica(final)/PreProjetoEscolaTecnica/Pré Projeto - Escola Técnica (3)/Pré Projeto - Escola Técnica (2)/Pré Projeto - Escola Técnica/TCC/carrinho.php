<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylecarrinho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
<body>
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="stylecarrinho.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>




  <header class="max-width bg" id="Home">
    <div class="container">
      <nav class="menu">
        <div class="logo"></div>
        <div class="desktop-menu">
          <ul>
            <li><a href="home.php" class="btn-voltar"><i class="fas fa-home"></i></a></li>
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
          <h1 class="color-azul text-gd">Seu Carrinho</h1>
          <p class="color-azul text-pq"> Aqui, você pode reunir todos os produtos desejados de forma simples e rápida.
            Compre com tranquilidade, sabendo que suas transações são protegidas.</p>
          <button onclick="checkout()">Compre Agora</button>
        </div>
        <div class="right">
          <div class="imagem">

          </div>

        </div>
      </div>
    </div>
    <button id="back-to-top">^</button>
  </header>

  <section class="max-width" id="Service">
  <div class="container">
    <div class="content">
      <div class="titulo">
        <h2 class="text-md color-cinza-1">Seus Produtos</h2>
        <div class="line">
          <div class="text-titulo"></div>
        </div>
      </div>
      <input type="radio" name="slider" id="item-1" checked>
      <input type="radio" name="slider" id="item-2">
      <input type="radio" name="slider" id="item-3">
      <div class="cards">
        <label class="card" for="item-1" id="song-1">
          <img src="image/p1.jpg" alt="">
          <button onclick="addToCart({ id: 1, name: 'Produto 1', category: 'Categoria 1', price: 10, quantity: 1 })">Comprar</button>
        </label>

        <label class="card" for="item-2" id="song-2">
          <img src="image/p2.jpg">
          <button onclick="addToCart({ id: 2, name: 'Produto 2', category: 'Categoria 2', price: 20, quantity: 1 })">Comprar</button>
        </label>

        <label class="card" for="item-3" id="song-3">
          <img src="image/fotousavel5.jpg">
          <button onclick="addToCart({ id: 3, name: 'Produto 3', category: 'Categoria 3', price: 30, quantity: 1 })">Comprar</button>
        </label>
      </div>
    </div>
  </div>
</section>

  <section class="max-width bg" id="Cart">
    <div class="container">
      <div class="content">
        <div class="titulo">
          <h2 class="text-md color-cinza-1">Carrinho de Compras</h2>
          <div class="line">
            <div class="text-titulo"></div>
          </div>
        </div>
        <table>
          <thead>
            <tr>
              <th>Produto</th>
              <th>Quantidade</th>
              <th>Preço Unitário</th>
              <th>Preço Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="cart-items">
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" class="total">Total de Produtos: <span id="total-products">0</span></td>
              <td colspan="2" class="total">Total a Pagar: R$ <span id="total-price">0,00</span></td>
            </tr>
          </tfoot>
        </table>
        <button onclick="checkout()">Finalizar Compra</button>
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
    btn.addEventListener("click", function () {
      window.scrollTo(0, 0);
    });

    var cartItems = [];

    function addToCart(product) {
      var existingItem = cartItems.find(function (item) {
        return item.id === product.id;
      });

      if (existingItem) {
        existingItem.quantity++;
      } else {
        cartItems.push(product);
      }

      updateCart();
      localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    function removeItem(id) {
      cartItems = cartItems.filter(function (item) {
        return item.id !== id;
      });

      updateCart();
    }

    function updateCart() {
      var cartItemsContainer = document.getElementById('cart-items');
      cartItemsContainer.innerHTML = '';

      var totalProducts = 0;
      var totalPrice = 0;

      for (var i = 0; i < cartItems.length; i++) {
        var item = cartItems[i];

        var tr = document.createElement('tr');
        tr.innerHTML = `
          <td class="product">
            <img src="image/p${item.id}.jpg" alt="Imagem do produto">
            <div class="info">
              <div class="name">${item.name}</div>
              <div class="category">${item.category}</div>
            </div>
          </td>
          <td>
            <div class="qty">
              <button onclick="decrementQuantity(${item.id})">-</button>
              <span>${item.quantity}</span>
              <button onclick="incrementQuantity(${item.id})">+</button>
            </div>
          </td>
          <td>R$ ${item.price.toFixed(2).replace('.', ',')}</td>
          <td>R$ ${(item.price * item.quantity).toFixed(2).replace('.', ',')}</td>
          <td>
            <button onclick="removeItem(${item.id})" class="remove">Remover</button>
          </td>
        `;

        cartItemsContainer.appendChild(tr);

        totalProducts += item.quantity;
        totalPrice += item.price * item.quantity;
      }

      document.getElementById('total-products').textContent = totalProducts;
      document.getElementById('total-price').textContent = totalPrice.toFixed(2).replace('.', ',');
    }

    function incrementQuantity(id) {
      var item = cartItems.find(function (item) {
        return item.id === id;
      });

      if (item) {
        item.quantity++;
        updateCart();
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
      }
    }

    function decrementQuantity(id) {
      var item = cartItems.find(function (item) {
        return item.id === id;
      });

      if (item) {
        if (item.quantity > 1) {
          item.quantity--;
          updateCart();
          localStorage.setItem('cartItems', JSON.stringify(cartItems));
        }
      }
    }

      function checkout() {
  // Implementar a lógica para finalizar a compra

  // Exibir um alerta informando que a compra foi finalizada
  var messageElement = document.getElementById('checkout-message');
messageElement.textContent = "Compra finalizada com sucesso!";

  // Limpar o carrinho e o armazenamento local
  cartItems = [];
  updateCart();
  localStorage.removeItem('cartItems');
}
  
  </script>

    

    <footer>
        <div class="container">
            <img src="image/logo-roupa.png" alt="">
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
     <!-- Script JavaScript -->
  <script>
    // Variável para armazenar os itens do carrinho
    var cartItems = [];

    // Função para adicionar um item ao carrinho
    function addToCart(product) {
      // Verifica se o item já existe no carrinho
      var existingItem = cartItems.find(function (item) {
        return item.id === product.id;
      });

      if (existingItem) {
        // Se o item já existe, incrementa a quantidade
        existingItem.quantity++;
      } else {
        // Caso contrário, adiciona o item ao carrinho
        cartItems.push(product);
      }

      // Atualiza o carrinho
      updateCart();
      // Salva os itens do carrinho no localStorage
      localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    // Função para remover um item do carrinho
    function removeItem(id) {
      cartItems = cartItems.filter(function (item) {
        return item.id !== id;
      });

      // Atualiza o carrinho
      updateCart();
    }

    // Função para atualizar o carrinho
    function updateCart() {
      var cartItemsContainer = document.getElementById('cart-items');
      cartItemsContainer.innerHTML = '';

      var totalProducts = 0;
      var totalPrice = 0;

      // Percorre os itens do carrinho
      for (var i = 0; i < cartItems.length; i++) {
        var item = cartItems[i];

        // Cria uma nova linha na tabela para o item
        var tr = document.createElement('tr');
        tr.innerHTML = 
          <td class="product">
            <img src="${item.image}" alt="Imagem do produto">
            <div class="info">
              <div class="name">${item.name}</div>
              <div class="category">${item.category}</div>
            </div>
          </td>
          <td>
            <div class="qty">
              <button onclick="decrementQuantity(${item.id})">-</button>
              <span>${item.quantity}</span>
              <button onclick="incrementQuantity(${item.id})">+</button>
            </div>
          </td>
          <td>R$ ${item.price.toFixed(2).replace('.', ',')}</td>
          <td>R$ ${(item.price * item.quantity).toFixed(2).replace('.', ',')}</td>
          <td>
            <button onclick="removeItem(${item.id})" class="remove">Remover</button>
          </td>
        ;

        cartItemsContainer.appendChild(tr);

        totalProducts += item.quantity;
        totalPrice += item.price * item.quantity;
      }

      // Atualiza o total de produtos e o total a pagar
      document.getElementById('total-products').textContent = totalProducts;
      document.getElementById('total-price').textContent = 'R$ ' + totalPrice.toFixed(2).replace('.', ',');
    }

    
    function decrementQuantity(id) {
      for (var i = 0; i < cartItems.length; i++) {
        if (cartItems[i].id === id) {
          if (cartItems[i].quantity > 1) {
            cartItems[i].quantity--;
          }
          break;
        }
      }

      // Atualiza o carrinho
      updateCart();
    }

    
    function incrementQuantity(id) {
      for (var i = 0; i < cartItems.length; i++) {
        if (cartItems[i].id === id) {
          cartItems[i].quantity++;
          break;
        }
      }

      // Atualiza o carrinho
      updateCart();
    }

 
    
      
      function checkout() {
  // Implementar a lógica para finalizar a compra

  // Exibir um alerta informando que a compra foi finalizada
  alert("Compra finalizada com sucesso!");

  // Limpar o carrinho e o armazenamento local
  cartItems = [];
  updateCart();
  localStorage.removeItem('cartItems');
  var messageElement = document.getElementById('checkout-message');
messageElement.textContent = "Compra finalizada com sucesso!";
}

  

    
    function init() {
      // Obtém os itens do carrinho do localStorage, se existirem
      var cartItemsFromStorage = localStorage.getItem('cartItems');
      if (cartItemsFromStorage) {
        cartItems = JSON.parse(cartItemsFromStorage);
      } else {
        cartItems = [];
      }

      // Atualiza o carrinho
      updateCart();
    }

    // Inicializa a página
    init();
  </script>
  <script>
  function checkout() {
    // Aqui você pode adicionar o código para processar a compra

    // Exemplo de código para exibir o aviso de compra finalizada
    alert("Compra finalizada com sucesso!");
  }
</script>
</body>
</html>