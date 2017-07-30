<?php
    session_start();
    if(empty($_SESSION['id'])){
        $_SESSION['msg'] = "Área restrita. Faça login" ;
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Status</title>
    <meta charset="utf-8">
</head>
<body>
    <script src="menu.js"></script>
    <br><br><br>
    <div class="container" style="width: 600px;">
        <?php
        	include_once('conexao.php');
        	$query = "SELECT e.id_produto, p.descricao, e.qtde, e.valor_unitario FROM estoque e, produto p where e.id_produto = p.id";
        	$result = mysqli_query($conn, $query);

        	if($result){
        		while($linha = mysqli_fetch_assoc($result)){
        			echo "<label class='label label-default'>id_produto: ".$linha['id_produto']."</label><br>";
    			    echo "<label class='label label-primary'>Descrição do produto: ".$linha['descricao']."</label><br>";
    			    echo "<label class='label label-info'>Quantidade em estoque: ".$linha['qtde']."</label><br>";
    			    echo "<label class='label label-warning'>Valor unitário: ".$linha['valor_unitario']."</label><br>";
    			    echo "<hr>";
        		}
        	}
        ?>
    </div>
</body>
</html>