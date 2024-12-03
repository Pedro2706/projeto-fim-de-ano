<?php
// Inclui o arquivo de configuração
include_once('config.php');

// Verifica se o formulário foi enviado
if (isset($_POST['update'])) {
    // Sanitiza os dados do formulário para evitar injeção de SQL
    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

    // Prepara a consulta SQL utilizando prepared statements
    $sqlUpdate = "UPDATE usuarios SET id=? ,nome=?, email=?, senha=?,cep=?, tipo=? WHERE id=?";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("sssssssi", $id, $nome, $email, $senha ,$cep, $tipo);

    // Executa a consulta
    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $stmt->error;
    }

    // Fecha o statement
    $stmt->close();
}

// Redireciona para a lista de clientes
header('Location: listacliente.php');
?>

<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "escola";
$dbname = "pizzaria";
// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para editar um usuário
function editarUsuario($usuario_id, $novo_nome, $novo_email, $novo_tipo) {
    global $conn;
    
    $sql = "UPDATE usuarios SET nome = ?, email = ?, tipo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $novo_nome, $novo_email, $novo_tipo, $usuario_id);
    
    if ($stmt->execute()) {
        echo "Usuário atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar usuário: " . $stmt->error;
    }
    
    $stmt->close();
}

// Exemplo de uso
$usuario_id = 1; // ID do usuário a ser atualizado
$novo_nome = "Novo Nome";
$novo_email = "novoemail@example.com";
$novo_tipo = "usuario_comum";

editarUsuario($usuario_id, $novo_nome, $novo_email, $novo_tipo);

// Fechando a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro de Cliente</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background: url(imagem.jpg);
            background-size: 600px;
             background-repeat: no-repeat;
             background-position-x: center;
        }
        h1{
            text-align: center;
        }
        header{
            background-color: palevioletred;
             padding: 10px 0;
            text-align: center;
            }
        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #45e05f;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #435dd1;
        }
        header{
    background-color: palevioletred;
    padding: 10px 0;
    text-align: center;
    }

    nav ul{
    list-style: none;

    }

        nav ul li{
    display: inline;
    margin-right: 20px;
    }
    nav ul li a{
    text-decoration: none;
    color: #151414;
    font-weight: bold;
    }

    </style>
</head>
<body>
    <header>
        <h1>INDIVIDEO</h1>
        <nav>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="cardapio.html">CARDÁPIO</a></li>
                <li><a href="contato.html">CONTATO</a></li>
                
              </ul>
        </nav>
       
    </header>
    <h1>Cadastro de Cliente</h1>
    <body>
    <a href="listacliente.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Editar Cliente</b></legend>
                <br>
        <label for="id">id:</label>
        <input type="number" id="id" name="id" required>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">cpf:</label>
        <input type="number" id="cpf" name="cpf" required>

        <label for="email">data de nascimento:</label>
        <input type="nember" id="datanasc" name="cpf" required>

        <label for="email">cep:</label>
        <input type="number" id="cep" name="cep" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>


        </select>
        <label for="tipo">tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="" disabled selected>Selecione o tipo</option>
            <option value="0">0</option>
            <option value="1">1</option>
           
        </select>
        <br><br>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>

</html>
<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "escola";
$dbname = "pizzaria";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para editar um usuário
function editarUsuario($usuario_id, $novo_nome, $novo_email, $novo_tipo) {
    global $conn;
    
    $sql = "UPDATE usuarios SET nome = ?, email = ?, tipo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $novo_nome, $novo_email, $novo_tipo, $usuario_id);
    
    if ($stmt->execute()) {
        echo "Usuário atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar usuário: " . $stmt->error;
    }
    
    $stmt->close();
}

// Exemplo de uso
$usuario_id = 1; // ID do usuário a ser atualizado
$novo_nome = "Novo Nome";
$novo_email = "novoemail@example.com";
$novo_tipo = "usuario_comum";

editarUsuario($usuario_id, $novo_nome, $novo_email, $novo_tipo);

// Consulta para pegar os dados dos usuários
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lista de Cliente</title>

    <style>
        body {
            background: url(peixe.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
            color: rgba(0, 0, 0, 0.6);
            text-align: center;
        }

        .table-bg {
            background-color: #191970;
            border-radius: 15px 15px 0 0;
        }

        .box-search {
            display: flex;
            justify-content: center;
            gap: 0.1%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
         
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
</nav>

<br>

<h1>Lista de Clientes</h1>

<br>

<div class="box-search">
    <button onclick="searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6
            </svg>
        </button>
</div>

<div class="m-5">
    <table class="table text-white table-bg">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Senha</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">CEP</th>
                <th scope="col">tipo</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($user_data = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$user_data['Nome']."</td>";
                    echo "<td>".$user_data['Email']."</td>";
                    echo "<td>".$user_data['Senha']."</td>";
                    echo "<td>".$user_data['Data de Nascimento']."</td>";
                    echo "<td>".$user_data['Cep']."</td>";
                    echo "<td>".$user_data['ipo']."</td>";
                      
                   "<a class='btn btn-sm btn-primary' href='edit.php?cpf=".$user_data['cpf']."' title='Editar'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                        </svg>
                    </a> 
                    <a class='btn btn-sm btn-danger' href='delete.php?cpf=".$user_data['cpf']."' title='Deletar'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0z'/>
                        </svg>
                    </a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Nenhum usuário encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>