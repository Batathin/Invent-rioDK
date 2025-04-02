<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventário_dw";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$items = [];


$sql = "SELECT * FROM equipment_items";
$result = $conn->query($sql);


if ($result === false) {
    echo "Erro na consulta: " . $conn->error;
    exit;
}

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $items[] = $row; 
    }
}


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Souls Equipment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #2a2a2a;
            color: #d4af37;
            font-family: 'Times New Roman', Times, serif;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .equipment-container, .inventory-container {
            padding: 20px;
            background: #1a1a1a;
            border: 3px solid #604c2f;
            border-radius: 8px;
        }

        .item-slot {
            width: 80px;
            height: 80px;
            background-color: #3a3a3a;
            border: 2px solid #604c2f;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
            position: relative;
            cursor: pointer;
        }

        .item-slot img {
            max-width: 100%;
            max-height: 100%;
        }

        .stats-panel {
            background-color: #1a1a1a;
            border: 3px solid #604c2f;
            padding: 20px;
        }

        .form-panel {
            background-color: #1a1a1a;
            border: 3px solid #604c2f;
            padding: 10px;
            margin-top: 20px;
        }

        .nav-tabs .nav-link {
            color: #d4af37;
            background-color: #3a3a3a;
            border-color: #604c2f;
        }

        .nav-tabs .nav-link.active {
            background-color: #604c2f;
            color: white;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col-md-8 {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-4 {
            flex: 0 0 30%; /* A coluna de detalhes terá 30% da largura */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="equipment-container">

        <ul class="nav nav-tabs" id="inventoryTabs" role="tablist">
            <li class="nav-items" role="presentation">
                <button class="nav-link active" id="items-tab" data-bs-toggle="tab" data-bs-target="#items" type="button" role="tab">Itens</button>
            </li>
            <li class="nav-add" role="presentation">
                <button class="nav-link" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab" onclick="clearStats()">Adicionar Itens</button>
            </li>
        </ul>


        <div class="tab-pane fade show active" id="items" role="tabpanel">
            <div class="row">

                <div class="col-md-8">
                    <div class="row">
                        <?php if (!empty($items)): ?>
                            <?php foreach ($items as $item): ?>
                                <div class="col-4 item-slot" onclick="updateStats(<?php echo $item['id']; ?>)">
                                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Não há itens no banco de dados.</p>
                        <?php endif; ?>
                    </div>
                </div>

              
                <div class="col-md-4 stats-panel">
                    <h4 class="text-center">Status</h4>
                    <p id="stat-info">Clique em um item para ver os detalhes.</p>
                    <div id="itemImageContainer">
                    <img id="itemImage" src="" alt="Imagem do item" style="max-width: 100%; height: auto; display: none;">
                    </div>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="add" role="tabpanel">
                <h4 class="text-center">Adicionar Novo Item</h4>
                <form action="add_item.php" method="POST">
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Nome do Item*</label>
                        <input type="text" class="form-control" id="itemName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="itemType" class="form-label">Tipo de Item*</label>
                        <select class="form-select" id="itemType" name="type" required>
                            <option value="Arma">Arma</option>
                            <option value="Consumível">Consumível</option>
                            <option value="Anel">Anel</option>
                            <option value="Escudo">Escudo</option>
                            <option value="Capacete">Capacete</option>
                            <option value="Peitoral">Peitoral</option>
                            <option value="Luvas">Luvas</option>
                            <option value="Calças">Calças</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="itemDamage" class="form-label">Dano</label>
                        <input type="number" class="form-control" id="itemDamage" name="damage">
                    </div>
                    <div class="mb-3">
                        <label for="itemDefense" class="form-label">Defesa</label>
                        <input type="number" class="form-control" id="itemDefense" name="defense">
                    </div>
                    <div class="mb-3">
                        <label for="itemWeight" class="form-label">Peso</label>
                        <input type="number" class="form-control" id="itemWeight" name="weight" step="0.1">
                    </div>
                    <div class="mb-3">
                        <label for="itemDurability" class="form-label">Durabilidade</label>
                        <input type="number" class="form-control" id="itemDurability" name="durability">
                    </div>
                    <div class="mb-3">
                        <label for="itemEffect" class="form-label">Efeito/Habilidade (se houver)</label>
                        <input type="text" class="form-control" id="itemEffect" name="effect">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Imagem*</label>
                        <input type="text" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar Item</button>
                </form>
            </div>
        </div>
</div>

<script>
    // Função para limpar o status
function clearStats() {
    // Limpar o texto de status
    document.getElementById("stat-info").innerText = "Clique em um item para ver os detalhes.";

    // Ocultar a imagem do item
    const itemImage = document.getElementById("itemImage");
    itemImage.style.display = "none";  // Esconder a imagem do item

    // Resetando o item atual
    currentItemId = null;
}

// Função para atualizar os detalhes do item
let currentItemId = null;  // Armazenar o ID do item atual para verificação

function updateStats(itemId) {
    // Verifica se o item clicado é o mesmo que o atualmente ativo
    if (currentItemId === itemId) {
        // Se for o mesmo item, limpa as informações e volta ao estado original
        document.getElementById("stat-info").innerText = "Clique em um item para ver os detalhes.";
        const itemImage = document.getElementById("itemImage");
        itemImage.style.display = "none";  // Oculta a imagem do item
        currentItemId = null;  // Resetando o item atual
        return;  // Não faz mais nada, simplesmente volta ao estado inicial
    }

    // Caso contrário, faz a requisição para carregar os detalhes do novo item
    fetch('get_item_stats.php?id=' + itemId)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById("stat-info").innerText = data.error;
                const itemImage = document.getElementById("itemImage");
                itemImage.style.display = "none";
            } else {
                let statsText = `Nome: ${data.name}\nTipo: ${data.type}\n`;
                if (data.damage) statsText += `Dano: ${data.damage}\n`;
                if (data.defense) statsText += `Defesa: ${data.defense}\n`;
                if (data.weight) statsText += `Peso: ${data.weight}\n`;
                if (data.durability) statsText += `Durabilidade: ${data.durability}\n`;
                if (data.effect) statsText += `Efeito/Habilidade: ${data.effect}`;

                // Atualizar texto dos detalhes
                document.getElementById("stat-info").innerText = statsText;

                // Atualizar imagem do item
                const itemImage = document.getElementById("itemImage");
                itemImage.src = data.image;
                itemImage.style.display = "block";  // Exibir a imagem
                currentItemId = itemId;  // Armazenar o ID do item atual
            }
        })
        .catch(error => {
            document.getElementById("stat-info").innerText = "Erro ao carregar os detalhes do item.";
            const itemImage = document.getElementById("itemImage");
            itemImage.style.display = "none";
        });
}



</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
