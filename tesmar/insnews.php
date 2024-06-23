<?php

$host = 'localhost';
$dbname = 'seu_banco_de_dados';
$username = 'seu_usuario';
$password = 'sua_senha';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        $stmt = $conn->prepare("INSERT INTO assinantes (email) VALUES (:email)");

        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo "Inscrição na newsletter realizada com sucesso!";
    }
} catch(PDOException $e) {
    echo "Você errou alguma coisa ai ein, tenta denovo: " . $e->getMessage();
}
?>
