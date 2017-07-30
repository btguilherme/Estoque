<?php
session_start();
ob_start();
$btnCadastrar = filter_input(INPUT_POST, 'btnCadastrar', FILTER_SANITIZE_STRING);
if ($btnCadastrar) {
	include_once "conexao.php";
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

	$query = "SELECT usuario FROM usuario WHERE usuario='".$dados['usuario']."'";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) != 0){
		$_SESSION['msg'] = "Nome de usuário já cadastrado.";
	}else{
		$query = "INSERT INTO usuario (nome, email, usuario, senha, nascimento) VALUES ('".$dados['nome']."', '".$dados['email']."', '".$dados['usuario']."', '".$dados['senha']."', '".$dados['nascimento']."')";

		$resultado_usuario = mysqli_query($conn, $query);

		if(mysqli_insert_id($conn)){
			$_SESSION['msg'] = "Usuário cadastrado com sucesso";
			header("Location: index.php");
		}else{
			$_SESSION['msg'] = "Erro ao cadastrar usuário";
			header("Location: index.php");
		}
	}
}
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
	<title>Cadastro de usuário</title>
</head>
<body>

<form action="" method="post" class="container">
	<h1>Cadastro de usuário</h1>
	<?php
        if(isset($_SESSION['msg'])){
            echo "<p style='color: red;'>".$_SESSION['msg']."</p>";
            unset($_SESSION['msg']);
        }
    ?>
	<p>
	<label for="nome">Nome:</label>
	<input type="text" id="nome" name="nome" placeholder="Insira seu nome" required="true" class="form-control" autofocus="true">
	</p>
	
	<p>
	<label for="email">E-mail:</label>
	<input type="email" id="email" name="email" placeholder="Insira seu e-mail" required="true" class="form-control">
	</p>

	<p>
	<label for="usuario">Usuário:</label>
	<input type="text" id="usuario" name="usuario" placeholder="Insira seu nome de usuário" required="true" class="form-control">
	</p>

	<p>
	<label for="senha">Senha:</label>
	<input type="password" id="senha" name="senha" placeholder="Insira sua senha" required="true" class="form-control">
	</p>

	<p>
	<label for="nascimento">Nascimento:</label>
	<input type="date" id="nascimento" name="nascimento" placeholder="Insira sua data de nascimento" required="true" class="form-control">
	</p>

	<input type="submit" name="btnCadastrar" value="Cadastrar" class="btn btn-lg btn-primary btn-block">
	
</form>

</body>
</html>