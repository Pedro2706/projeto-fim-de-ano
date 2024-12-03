<?php

include_once('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Pegar os dados do formulário
$pizzas = isset($_POST['pizza']) ? implode(", ", $_POST['pizza']) : 'Nenhuma'; // Combinar as pizzas selecionadas em uma string
$bebida = $_POST['bebida'];
$sobremesa = $_POST['sobremesa'];

// Inserir os dados no banco de dados
$stmt = $conexao->prepare("INSERT INTO pedidos (pizza, bebida, sobremesa) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $pizzas, $bebida, $sobremesa);

if ($stmt->execute()) {
    echo "Pedido realizado com sucesso!<br>";
    echo "<h2>Seu Pedido:</h2>";

    // Exibir imagens relacionadas ao pedido
    echo "<h3>Pizzas</h3>";
    if (isset($_POST['pizza'])) {
        foreach ($_POST['pizza'] as $pizza) {
            echo "<div class='card'>";
            echo "<img src='image/{$pizza}.png' alt='{$pizza}' style='width: 150px; height: 100px;'><br>";
            echo "</div>"; 
        }
    } else {
        echo "Nenhuma pizza selecionada.<br>";
    }

    echo "<h3>Bebida</h3>";
    if ($bebida) {
        echo "<img src='image/{$bebida}.png' alt='{$bebida}' style='width: 150px; height: 100px;'><br>";
    } else {
        echo "Nenhuma bebida selecionada.<br>";
    }

    echo "<h3>Sobremesa</h3>";
    if ($sobremesa) {
        echo "<img src='image/{$sobremesa}.jpeg' alt='{$sobremesa}' style='width: 150px; height: 100px;'><br>";
    } else {
        echo "Nenhuma sobremesa selecionada.<br>";
    }
} else {
    echo "Erro ao realizar o pedido: " . $conexao->error;
}

$stmt->close();
$conexao->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Faça seu pedido!</title>
    <link rel="stylesheet" href="produto.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="login.php">login</a></li>
                <li><a href="sobrenos.php">Sobre Nós</a></li>
                <li><a href="produto.php">Pizzas, Bebidas, Sobremesas</a></li>
            </ul>
        </nav>
    </header>
    <h1>Faça seu Pedido!</h1>
    <form action="produto.php" method="post">
        <h2>Pizzas</h2>
            <hr>
            <section class="pizza-section">
            <div>
                <input type="checkbox" name="pizza[]" value="Margherita" id="pizza-margherita">
                <div id="card">
                    <label for="pizza-margherita">
                        <img src="image/margherita.png" alt="Margherita" style="width: 150px; height: 100px;">
                        <p>Margherita  R$ 50,00</p>
                    </label>
                        
                </div>
            </div>
            <div>
                <input type="checkbox" name="pizza[]" value="Calabresa" id="pizza-calabresa">
                <div id="card">
                    <label for="pizza-calabresa">
                        <img src="image/calabresa.png" alt="Calabresa" style="width: 150px; height: 100px;">
                        <p>Calabresa  R$ 25,00</p>
                    </label>
                </div>
            </div>
            <div>
                <input type="checkbox" name="pizza[]" value="Portuguesa" id="pizza-portuguesa">
                <div id="card">
                    <label for="pizza-portuguesa">
                        <img src="image/portuguesa.png" alt="Portuguesa" style="width: 150px; height: 100px;">
                        <p>Portuguesa  R$ 35,00</p>
                    </label>
                </div>
            </div>
            <div>
                <input type="checkbox" name="pizza[]" value="Vegetariana" id="pizza-vegetariana">
                <div id="card">
                    <label for="pizza-vegetariana">
                        <img src="image/vegetariana.png" alt="Vegetariana" style="width: 150px; height: 100px;">
                        <p>Vegetariana  R$ 40,00</p>
                    </label>
                </div>
            </div>
        </section>
        <hr>
        
        <h2>Bebidas</h2>
        <section class="beverage-section">
            <div>
                <input type="radio" name="bebida" value="Coca" id="bebida-coca">
                <label for="bebida-coca">
                    <img src="image/coca.png" alt="Coca-Cola" style="width: 150px; height: 100px;">
                    <p>Coca-Cola  R$ 12,00</p>
                </label>
            </div>
            <div>
                <input type="radio" name="bebida" value="Suco" id="bebida-suco">
                <label for="bebida-suco">
                    <img src="image/suco.png" alt="Suco de Laranja" style="width: 150px; height: 100px;">
                    <p> Suco de Laranja  R$ 8,00</p>
                </label>
            </div>
            <div>
                <input type="radio" name="bebida" value="agua" id="bebida-agua">
                <label for="bebida-agua">
                    <img src="image/agua.png" alt="Água" style="width: 150px; height: 100px;">
                    <p> Água R$ 5,00</p>
                </label>
            </div>
            <div>
                <input type="radio" name="bebida" value="guarana" id="bebida-guarana">
                <label for="bebida-guarana">
                    <img src="image/guarana.png" alt="Guarana" style="width: 150px; height: 100px;">
                    <p> GuaranáR$ 11,00</p>
                </label>
            </div>
            <div>
                <input type="radio" name="bebida" value="sprite" id="bebida-sprite">
                <label for="bebida-sprite">
                    <img src="image/sprite.png" alt="Sprite" style="width: 150px; height: 100px;">
                    <p>Sprite  R$ 10,00</p>
                </label>
            </div>
        </section>
        <h2>Sobremesas</h2>
        <hr>       
        <section class="dessert-section">
           
                <input type="radio" name="sobremesa" value="Brownie" id="Brownie">
                <label for="Brownie">
                    <img src="image/brownie.png" alt="Brownie" style="width: 150px; height: 100px;">
                    <p>Brownie  R$ 15,00</p>
                </label>
                <input type="radio" name="sobremesa" value="tiramisu" id="tiramisu">
                <label for="tiramisu">
                    <img src="image/tiramisu.png" alt="tiramisu" style="width: 150px; height: 100px;">
                    <p>Tiramisu  R$ 17,00</p>
                </label>
                <input type="radio" name="sobremesa" value="pudim" id="pudim">
                <label for="pudim">
                    <img src="image/pudim.png" alt="pudim" style="width: 150px; height: 100px;">
                    <p>Pudim  R$ 19,00</p>
                </label>
                <input type="radio" name="sobremesa" value="bolo" id="bolo">
                <label for="bolo">
                    <img src="image/bolo.png" alt="bolo" style="width: 150px; height: 100px;">
                    <p>Bolo  R$ 18,00</p>
                </label>
                <input type="radio" name="sobremesa" value="mousse" id="mousse">
                <label for="mousse">
                    <img src="image/mousse.png" alt="mousse" style="width: 150px; height: 100px;">
                    <p>Mousse R$ 14,00</p>
                </label>
                <input type="radio" name="sobremesa" value="sorvete" id="sorvete">
                <label for="sorvete">
                    <img src="image/sorvete.png" alt="sorvete" style="width: 150px; height: 100px;">
                    <p>Sorvete  R$ 16,00</p>
                </label>
            
            
        </section>

        <input type="submit" value="Fazer Pedido">
    </form>
</body>
</html>