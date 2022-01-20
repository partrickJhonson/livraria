<?php
    include_once "./app/conexao/Conexao.php";
include_once "./app/conexao/Conexao.php";
include_once "./app/dao/AcervoDAO.php";
include_once "./app/model/Acervo.php";
include_once "./app/dao/EditoraDAO.php";
include_once "./app/model/Editora.php";

//instancia as classes
$acervo = new Acervo();
$acervodao = new AcervoDAO();	
	$pesquisar = $_POST['pesquisar'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type"text/css" href="style.css"> 
    <title>>Controle de Acervo Página de Pesquisa</title>
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
			Página de Pesquisa
        </div>
    </nav>
    <div class="container">
        <hr>
        <form method="POST" action="pesquisar.php">
            <input type="text" name="pesquisar" placeholder="PESQUISAR">
            <a href="app/controller/AcervoController.php?del=<?= $acervo->getId() ?>">
            <button class="btn btn-primary" type="submit" name="cadastrar">Pesquisa</button>
             </a>
        </form>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Autor</th>
                        <th>Titulo</th>
                        <th>Ano</th>
                        <th>Preco</th>
                        <th>Editora</th>
                        <th>Quantidade</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acervodao->readP($pesquisar) as $acervo) : ?>
                        <tr>
                            <td><?= $acervo->getId() ?></td>
                            <td><?= $acervo->getAutor() ?></td>
                            <td><?= $acervo->getTitulo() ?></td>
                            <td><?= $acervo->getAno() ?></td>
                            <td><?= $acervo->getPreco()?></td>
                            <td><?= $acervo->getEditora()?></td>
                            <td><?= $acervo->getQuantidade()?></td>
                            <td><?= $acervo->getTipo()?></td>
                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $acervo->getId() ?>">
                                    Editar
                                </button>
                                <a href="app/controller/AcervoController.php?del=<?= $acervo->getId() ?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="editar><?= $acervo->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controller/AcervoController.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Autor</label>
                                                    <input type="text" name="autor" value="<?= $acervo->getAutor() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-7">
                                                    <label>Titulo</label>
                                                    <input type="text" name="titulo" value="<?= $acervo->getTitulo() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Quantidade</label>
                                                    <input type="number" name="quantidade" value="<?= $acervo->getQuantidade() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Preco</label>
                                                    <input type="boolean" name="preco" value="<?= $acervo->getPreco() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Editora</label>
                                                    <input type="text" name="editora" value="<?= $acervo->getEditora() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Tipo</label>
                                                    <input type="number" name="tipo" value="<?= $acervo->getTipo() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $acervo->getId() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Atualizar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>