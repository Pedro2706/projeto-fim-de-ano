<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho de Compras</title>
  <link rel="stylesheet" href="style4.css">
</head>
<body>
  <h1>Loja de Produtos</h1>

  <div class="produtos">
    <div class="produto" data-id="1">
      <img src="produto1.jpg" alt="Produto 1">
      <h3>Produto 1</h3>
      <p>Preço: R$ 20,00</p>
      <button class="adicionar">Adicionar ao Carrinho</button>
    </div>
    <form action="produto.php" method="post">
    <input type="hidden" name="itensCarrinho" id="itens-carrinho">
    <!-- Outros campos do formulário -->
    <input type="submit" value="Fazer Pedido">
</form>
<div class="produto" data-id="2">
      <img src="produto2.jpg" alt="Produto 2">
      <h3>Produto 2</h3>
      <p>Preço: R$ 35,00</p>
      <button class="adicionar">Adicionar ao Carrinho</button>
    </div>

    <div class="produto" data-id="3">
      <img src="produto3.jpg" alt="Produto 3">
      <h3>Produto 3</h3>
      <p>Preço: R$ 50,00</p>
      <button class="adicionar">Adicionar ao Carrinho</button>
    </div>
  </div>

  <h2>Carrinho de Compras</h2>
  <div id="carrinho">
    <h2>Itens no Carrinho</h2>
    <ul id="lista-carrinho">
        <!-- Itens do carrinho serão adicionados aqui dinamicamente -->
    </ul>
    <p id="total">Total: R$ 0,00</p>
    <button id="finalizar-compra" type="submit">Finalizar Compra</button>
</div>


  <script src="script.js"></script>

  <form action="produto.php" method="post">
    <input type="hidden" name="itensCarrinho" id="itens-carrinho">
    <!-- Outros campos do formulário -->
    <input type="submit" value="Fazer Pedido">
</form>

</body>
</html>