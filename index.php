<?php
include_once "./app/conexao/Conexao.php";
include_once "./app/dao/AcervoDAO.php";
include_once "./app/model/Acervo.php";
include_once "./app/dao/EditoraDAO.php";
include_once "./app/model/Editora.php";
header('Access-Control-Allow-Origin: *');

//instancia as classes
$acervo = new Acervo();
$acervodao = new AcervoDAO();
$editora = new Editora();
$editoradao = new EditoraDAO();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type"text/css" href="style.css"> 
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
    
    <script src = "jquery.js"> </script>
    <title>Controle de Acervo Página de Cadastro</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
            <a class="navbar-brand" href="#">
            Página de Cadastro
        </div>
    </nav>
    <div class="container">
       <h1>Cadas de Itens do Acervo</h1> 
       <form method="POST" action="pesquisar.php">
            <input type="text" name="pesquisar" placeholder="PESQUISAR">
            <a href="app/controller/AcervoController.php?del=<?= $acervo->getId() ?>">
            <button class="btn btn-primary" type="submit" name="cadastrar">Pesquisa</button>
             </a>
        </form>
        <form action="app/controller/AcervoController.php" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <label>Autor</label>
                    <input type="text" name="autor" value="" autofocus class="form-control" require />
                </div>
                <div class="col-md-5">
                    <label>Titulo</label>
                    <input type="text" name="titulo" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Ano</label>
                    <input type="number" name="ano" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Preço</label>
                    <input type="boolean" name="preco" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Id da Editora</label>
                    <input type="text" name="editora" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>Tipo</label>
                    <input type="number" name="tipo" value="" class="form-control" require />
                </div>                                
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
                </div>
            </div>
        </form>
        <hr>

    </div>
    <div class="container">
        <form action="app/controller/EditoraController.php" method="POST">
        <h1>Cadastro de Editora</h1>    
        <div class="row">
                <div class="col-md-3">
                    <label>Nome</label>
                    <input type="text" name="nome" value="" autofocus class="form-control" require />
                </div>                            
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome Editora</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($editoradao->read() as $editora) : ?>
                        <tr>
                            <td><?= $editora->getId() ?></td>
                            <td><?= $editora->getNome() ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>