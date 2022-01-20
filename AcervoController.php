<?php
include_once "../conexao/Conexao.php";
include_once "../model/Acervo.php";
include_once "../dao/AcervoDAO.php";

//instancia as classes
$acervo = new Acervo();
$acervodao = new AcervoDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $acervo->setAutor($d['autor']);
    $acervo->setTitulo($d['titulo']);
    $acervo->setAno($d['ano']);
    $acervo->setPreco($d['preco']);
    $acervo->setEditora($d['editora']);
    $acervo->setQuantidade($d['quantidade']);
    $acervo->setTipo($d['tipo']);

    

    $acervodao->create($acervo);

    header("Location: ../../");
} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $acervo->setAutor($d['autor']);
    $acervo->setTitulo($d['titulo']);
    $acervo->setAno($d['ano']);
    $acervo->setPreco($d['preco']);
    $acervo->setId($d['id']);
    $acervo->setEditora($d['editora']);
    $acervo->setQuantidade($d['quantidade']);
    $acervo->setTipo($d['tipo']);
    

    $acervodao->update($acervo);

    header("Location: ../../");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $acervo->setId($_GET['del']);

    $acervodao->delete($acervo);

    header("Location: ../../");
}else{
    header("Location: ../../");
}