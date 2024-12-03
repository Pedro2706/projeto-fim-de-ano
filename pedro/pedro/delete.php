<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "esccola";
$dbname = "projeto_pc";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para excluir um usuário
function excluirUsuario($usuario_id) {
    global $conn;
    
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    
    if ($stmt->execute()) {
        echo "Usuário excluído com sucesso.";
    } else {
        echo "Erro ao excluir usuário: " . $stmt->error;
    }
    
    $stmt->close();
}

// Exemplo de uso
$usuario_id = 1; // ID do usuário a ser excluído

excluirUsuario($usuario_id);

// Fechando a conexão
$conn->close();
?>
