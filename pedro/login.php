<?php
include_once('config.php');

// Verifica se houve um envio de formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Validação básica (adicione mais validações conforme necessário)
    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Prepare a consulta SQL para evitar injeção
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email=? AND senha=?");
        $stmt->bind_param("ss", $email, $senha); // Assumindo que email e senha são strings

        // Executa a consulta
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Verifica o tipo de usuário
                if ($row['tipo'] == 1) {
                    // Login válido para administrador, redireciona para adm.php
                    header("Location: admin.php");
                } else {
                    // Login válido para outro tipo de usuário, redireciona para home
                    header("Location: produto.php");
                }
            } else {
                echo "Email ou senha inválidos.";
            }
        } else {
            // Trata erros na execução da consulta
            echo "Erro ao realizar a consulta: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
<header>
        <h1>PIRATAS A BOMBORDO</h1>
        <img id="logo" src="image/th.jpeg" alt="Logo da Pizzaria">
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
                <li><a href="login.php">login</a></li>
                <li><a href="sobrenos.php">Sobre Nós</a></li>
                <li><a href="produto.php">Pizzas, Bebidas, Sobremesas</a></li>
        </nav>
    </header>
    <hr> 
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>