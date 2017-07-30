<?php
    session_start();
    ob_start();
    if(empty($_SESSION['id'])){
        $_SESSION['msg'] = "Área restrita. Faça login" ;
        header("Location: index.php");
    }

    $btnCadProd = filter_input(INPUT_POST, 'btnCadProd', FILTER_SANITIZE_STRING);

    if($btnCadProd){
        include_once("conexao.php"); 
        if($_POST['estoque_min'] >= $_POST['estoque_max']){
            $_SESSION['msg'] = "Valor do estoque mínimo deve ser maior que valor do estoque máximo.";
        }else{
            $query = "SELECT * from produto WHERE descricao LIKE '".$_POST['descricao']."'";
            $result = mysqli_query($conn, $query);
            if(mysqli_fetch_assoc($result)){
                $_SESSION['msg'] = "Produto já está cadastrado";
            }else{
                $query = "INSERT INTO produto (descricao, estoque_minimo, estoque_maximo) VALUES ('".$_POST['descricao']."','".$_POST['estoque_min']."','".$_POST['estoque_max']."')";
                $result = mysqli_query($conn, $query);

                if(mysqli_insert_id($conn)){
                    $_SESSION['msg'] = "Produto cadastrado com sucesso";
                }else{
                    $_SESSION['msg'] = "Erro ao cadastrar produto";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastrar novo produto</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="range.css">
    <link rel="stylesheet" href="extra.css">
</head>
<body>
    <script src="menu.js"></script>
    <br><br><br>
    <?php
        if(isset($_SESSION['msg'])){
            echo "<p style='color: red;'>".$_SESSION['msg']."</p>";
            unset($_SESSION['msg']);
        }
    ?>
    <form method="post" action="" class="container" style="width: 500px;">
        <label for="descricao">Descrição do produto:</label>
        <input type="text" id="descricao" name="descricao" rows="10" cols="30" required="true" autofocus="true" class="form-control" />
        <br>
        <label for="estoque_min">Estoque mínimo:</label>
        <input type="range" id="estoque_min" name="estoque_min" min="1" max="50" oninput="estoque_min_out.value = estoque_min.value" required="true">
        <output name="estoque_min_out" id="estoque_min_out">25</output>
        <br>
        <label for="estoque_max">Estoque máximo:</label>
        <input type="range" id="estoque_max" name="estoque_max" min="1" max="50" oninput="estoque_max_out.value = estoque_max.value" required="true">
        <output name="estoque_max_out" id="estoque_max_out">25</output>
        <br>
        <input type="submit" class="btn btn-lg btn-primary" name="btnCadProd" value="Cadastrar" />
    </form>

    
</body>
</html>
