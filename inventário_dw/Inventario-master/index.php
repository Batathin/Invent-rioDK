<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #212121; /* Fundo mais escuro para maior contraste */
        color: #F5F5F5; /* Texto claro para contraste com o fundo escuro */
        font-family: 'Arial', sans-serif;
      }
      .container {
        max-width: 450px;
        margin-top: 80px;
        background: #333; /* Fundo do formulário mais claro */
        border: 2px solid #FFD700; /* Borda dourada */
        border-radius: 8px;
        padding: 20px;
      }
      .card {
        background: transparent;
        border: none;
      }
      .btn-custom {
        background-color:rgb(212, 194, 55); /* Laranja mais claro para o botão */
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        padding: 10px 0;
      }
      .btn-custom:hover {
        background-color:rgb(212, 146, 55);; /* Laranja escuro ao passar o mouse */
        color: #fff;
      }
      .input-group-text {
        background-color: #444; /* Fundo escuro para os campos */
        color: #FFD700; /* Cor dourada para os ícones e textos */
        border: 1px solid #FFD700; /* Borda dourada */
      }
      input {
        background-color: #444; /* Fundo escuro para os campos */
        color:rgb(192, 172, 157); /* Texto claro para facilitar a leitura */
        border: 1px solid #FFD700; /* Borda dourada */
        border-radius: 5px;
        padding: 10px;
      }
      label {
        color: #FFD700; /* Texto dourado */
        font-weight: bold;
      }
      .row {
        margin-bottom: 10px;
      }
      .alert {
        color:rgb(255, 0, 0);
        background-color: #333;
        border-color: #FFD700;
        text-align: center;
      }
      .create-account-link {
        color: #d4af37;
        text-decoration: none;
        font-size: 14px;
      }
      .create-account-link:hover {
        text-decoration: underline;
      }
      .form-control:focus {
        border-color: #FFD700; /* Cor dourada ao focar nos campos */
        box-shadow: 0 0 5px rgba(255, 140, 0, 0.5);
      }
    </style>
  </head>
  <body class="text-center">
    <?php
      session_start();
      $servername = "localhost";
      $database = "inventário_dw";
      $username = "root";
      $password = "";

      $conn = mysqli_connect($servername, $username, $password, $database);
      if (!$conn) {
        die("Conexão falhou: ".mysqli_connect_error());
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['UserName'];
        $senha = $_POST['Senha'];

        $sql_logar = "SELECT * FROM inventário WHERE UserName='$nome' AND Senha='$senha'";
        $exe_logar = mysqli_query($conn, $sql_logar) or die (mysqli_error($conn));
        $num_logar = mysqli_num_rows($exe_logar);

        if ($num_logar == !true){
          $_SESSION['msg'] = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
          header("Location: index.php?login");
        } else {
          $informacao = mysqli_fetch_assoc($exe_logar);
          $_SESSION['Senha'] = $informacao['Senha'];
          $_SESSION['UserName'] = $informacao['UserName'];

          if ($_SESSION['Senha'] == $senha && $_SESSION['UserName'] == $nome){
            header("Location: paginainicial.php");
          }
        }
      }
    ?>
    
    <div class="container shadow p-3 mb-5 bg-white rounded card">
      <form action="" method="post">
        <div class="row shadow p-3 mb-5 bg-white rounded card p-4">      
          <label for="UserName">Nome de usuário:</label>
          <input type="text" id="UserName" name="UserName" maxlength="50" required>
        </div>
        <div class="row shadow p-3 mb-5 bg-white rounded card p-4">
          <label for="Senha">Senha:</label>
          <input type="password" id="Senha" name="Senha" minlength="8" maxlength="100" required>
        </div>
        <div class="row shadow p-3 mb-5 bg-white rounded card p-4">
          <button class="btn btn-custom w-100" type="submit">Entrar</button>
        </div>       
      </form>

      <div class="row">
        <p>Não tem uma conta? <a href="create.php" class="create-account-link">Crie sua conta aqui</a></p>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
