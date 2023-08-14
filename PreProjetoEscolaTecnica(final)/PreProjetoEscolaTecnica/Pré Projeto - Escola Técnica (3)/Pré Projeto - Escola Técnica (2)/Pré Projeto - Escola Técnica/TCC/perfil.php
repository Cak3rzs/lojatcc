<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Incluir o arquivo de configuração do banco de dados
require_once "config.php";

// Definir variáveis vazias para os campos
$nome = $email = $cpf = "";

// Preparar e executar a consulta para obter os dados do perfil do usuário
$sql = "SELECT nome, email, cpf FROM perfis WHERE id = ?";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("i", $_SESSION["id"]);
    if ($stmt->execute()) {
        $stmt->store_result();

        // Verificar se o perfil existe
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($nome, $email, $cpf);
            $stmt->fetch();
        }
    }
    $stmt->close();
}

// Processar a atualização do perfil
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os campos foram preenchidos
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cpf"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];

        // Preparar e executar a atualização do perfil
        $sql = "UPDATE perfis SET nome = ?, email = ?, cpf = ? WHERE id = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssi", $nome, $email, $cpf, $_SESSION["id"]);
            if ($stmt->execute()) {
                // Atualização bem-sucedida, redirecionar para o perfil
                header("location: perfil.php");
                exit;
            } else {
                $error = "Erro ao atualizar o perfil.";
            }
            $stmt->close();
        }
    } else {
        $error = "Todos os campos são obrigatórios.";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="styleperfil.css">
</head>
<body>
    <div class="container">
        <h1>Perfil do Usuário</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($cpf); ?>" readonly>
            </div>
            <div class="form-group">
                <input type="submit" value="Salvar">
            </div>
        </form>
    </div>
</body>
</html>