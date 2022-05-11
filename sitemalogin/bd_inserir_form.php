<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>
<body>
    <?php
        require "bd_conectar.php";

        $nome = $_POST['nome_Usuario'];
        $cpf = $_POST['cpf_Usuario'];
        $numero = $_POST['numero_Usuario'];
        $email = $_POST['email_Usuario'];
        $senha = $_POST['senha_Usuario'];

    ?>
</body>
</html>