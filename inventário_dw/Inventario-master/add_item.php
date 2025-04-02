<html>
<head></head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventário_dw";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ;
    $type = $_POST['type'];
    $damage = $_POST['damage'] ?? NULL;
    $defense = $_POST['defense'] ?? NULL;
    $weight = $_POST['weight'] ?? NULL;
    $durability = $_POST['durability'] ?? NULL;
    $effect = $_POST['effect'] ?? NULL;
    $image = $_POST['image'];

    if (empty($name) || empty($type) || empty($image)) {
        die("Erro: Nome, Tipo e Imagem são obrigatórios.");
    }
    
    $sql = "INSERT INTO equipment_items (name, type, damage, defense, weight, durability, effect, image)
            VALUES ('$name', '$type', '$damage', '$defense', '$weight', '$durability', '$effect','$image')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo item adicionado com sucesso!";
        header("Refresh: 1; url=" . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</body>
</html>