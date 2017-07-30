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
    <meta charset="utf-8">
    <title>Página inicial</title>
</head>
<body>
    <script src="menu.js"></script>
    <div class="jumbotron">
      <div class="container">
            <h1>Bem-vindo ao sistema de estoque, desenvolvido por <a href="mailto:btguilherme@msn.com">Guilherme Camargo</a></h1>
            <p>
            Este projeto foi desenvolvido com o objetivo de demonstrar minha capacidade de programar em HTML e PHP. 
            Este mesmo projeto está disponível em meu repositório do <a href="https://github.com/btguilherme/" target="_blank">GitHub</a> para qualquer pessoa que quiser analisar o código ou até mesmo reproduzí-lo. 
            O código SQL utilizado neste projeto foi reaproveitado <a href="http://www.devmedia.com.br/implementando-controle-de-estoque-no-mysql-com-triggers-e-procedures/26352" target="_blank">deste</a> site.
            </p>
            <p>
            Aproveitando o espaço, disponibilizo aqui meu currículo caso haja algum interesse:
            </p>
        </div>
    </div>
    <center><iframe src="GC-Curriculum_web.pdf" width="800" height="700"></iframe></center>
    <br><br><br>
</body>
</html>
