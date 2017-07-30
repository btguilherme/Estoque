<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="extra.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Bem-vindo amigo!</title>
</head>
<body>
<div class="page-header">
	<h1>Bem-vindo ao Sistema de Estoque!</h1>
	<p>Para utilizar o sistema, você deve fazer login ou <a href="cadastrar_usuario.php">cadastrar-se</a>!</p>
</div>
<div class="container">
	<?php
        if(isset($_SESSION['msg'])){
            echo "<p style='color: red;'>".$_SESSION['msg']."</p>";
            unset($_SESSION['msg']);
        }
    ?>
	<form method="post" action="valida.php">
		<h2>Log in</h2>
		<p>
		<label for="usuario">Usuário:</label>
		<input type="text" id="usuario" name="usuario" placeholder="Insira seu nome de usuário" required="true" class="form-control" autofocus="true">
		</p>

		<p>
		<label for="senha">Senha:</label>
		<input type="password" id="senha" name="senha" placeholder="Insira sua senha" required="true" class="form-control">
		</p>

		<input type="submit" name="btnLogin" value="Acessar" class="btn btn-lg btn-primary btn-block">
	</form>
</div>
</body>
</html>