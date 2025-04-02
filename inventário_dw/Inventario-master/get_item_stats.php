<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventário_dw";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $itemId = $_GET['id'];

    $sql = "SELECT * FROM equipment_items WHERE id = $itemId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
        echo json_encode($item);
    } else {
        echo json_encode(null); // Retorna null se não encontsrar o item
    }
} else {
    echo json_encode(null); // Se não receber o id, retorna null
}

$conn->close();
?>
