<?php
    session_start();
    if(empty($_SESSION['id'])){
        $_SESSION['msg'] = "Área restrita. Faça login" ;
        header("Location: index.php");
    }
    include_once("conexao.php");

    $btnAtualizar = filter_input(INPUT_GET, 'btnAtualizar', FILTER_SANITIZE_STRING);

    if($btnAtualizar){
        $query = "SELECT estoque_minimo, estoque_maximo FROM produto WHERE id = '".$_GET['produto']."' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $estoque_max = mysqli_fetch_assoc($result)['estoque_maximo'];
        $query = "SELECT qtde FROM estoque WHERE id_produto = '".$_GET['produto']."' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $estoque_qtde = mysqli_fetch_assoc($result)['qtde'];

        if(($estoque_qtde + $_GET['qtde']) > $estoque_max){
            $_SESSION['msg'] = "Quntidade a ser armazenada é inválida.";
        }else{
            $query = "INSERT INTO entrada_produto (id_produto, qtde, valor_unitario, data_entrada) VALUES ('".$_GET['produto']."', '".$_GET['qtde']."', '".$_GET['valor_unit']."', '".$_GET['data_entrada']."')";
            $result = mysqli_query($conn, $query);

            if($result){
                $_SESSION['msg'] = "Estoque atualizado com sucesso.";
            }else{
                $_SESSION['msg'] = "Problema ao atualizar o estoque";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Compra</title>
    <meta charset="utf-8">
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
    <form method="get" action="" class="container" style="width: 400px;">
        <label for="produto">Produto</label>
        <select id="produto" name="produto" class="form-control">
            <?php
                $query = "SELECT id,descricao FROM produto";
                $resultado = mysqli_query($conn,$query);
                if($resultado){
                    while($linha = mysqli_fetch_assoc($resultado)){
                        echo "<option value='".$linha['id']."'>".$linha['descricao']."</option>";
                    }
                }
            ?>
        </select>
        <br>
        <label for="qtde">Quantidade: </label>
        <input type="number" id="qtde" name="qtde" min="1" value="1" class="form-control"/>
        <br>
        <label for="valor_unit">Valor unitário: </label>
        <input type="number" id="valor_unit" name="valor_unit" step="0.01" value="0.01" class="form-control" />
        <br>
        <label for="data_entrada">Data de entrada: </label>
        <input type="date" id="data_entrada" name="data_entrada" value="<?php echo date('Y-m-d');?>" class="form-control"/>
        <br>
        <input type="submit" class="btn btn-lg btn-primary" name="btnAtualizar" value="Atualizar" />
    </form>
</body>
</html>

