document.write('\
<!DOCTYPE html>\
<html lang="pt-br">\
<head>\
    <meta charset="utf-8">\
    <meta http-equiv="X-UA-Compatible" content="IE=edge">\
    <meta name="viewport" content="width=device-width, initial-scale=1">\
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">\
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>\
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>\
    <title>Menu</title>\
    <style>\
        .theme-dropdown .dropdown-menu {\
            position: static;\
            display: block;\
            margin-bottom: 20px;\
        }\
    </style>\
</head>\
<body>\
    <!-- Fixed navbar -->\
    <nav class="navbar navbar-inverse navbar-fixed-top">\
      <div class="container">\
        <div class="navbar-header">\
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">\
            <span class="sr-only">Toggle navigation</span>\
            <span class="icon-bar"></span>\
            <span class="icon-bar"></span>\
            <span class="icon-bar"></span>\
          </button>\
        </div>\
        <div id="navbar" class="navbar-collapse collapse">\
          <ul class="nav navbar-nav">\
            <li class="active"><a href="inicial.php">Página inicial</a></li>\
            <li><a href="cadastrar_produto.php">Cadastrar novo produto</a></li>\
            <li class="dropdown">\
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Atualizar estoque <span class="caret"></span></a>\
              <ul class="dropdown-menu">\
                <li><a href="entrada.php">Entrada de produto (compra)</a></li>\
                <li><a href="saida.php">Saída de produto (venda)</a></li>\
              </ul>\
            </li>\
            <li><a href="status.php">Status do estoque</a></li>\
          </ul>\
          <ul class="nav navbar-nav navbar-right">\
            <li><a href="sair.php">Sair</a></li>\
          </ul>\
        </div><!--/.nav-collapse -->\
      </div>\
    </nav>\
</body>\
</html>\
');


