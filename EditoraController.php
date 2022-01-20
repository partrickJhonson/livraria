<?php
include_once "../conexao/Conexao.php";
include_once "../model/Editora.php";
include_once "../dao/EditoraDAO.php";

//instancia as classes
$editora = new Editora();
$editoradao = new EditoraDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $editora->setNome($d['nome']); 
    $editoradao->create($editora);

    header("Location: ../../");
} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $editora->setNome($d['nome']);
    $editoradao->update($editora);

    header("Location: ../../");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $editora->setId($_GET['del']);

    $editoradao->delete($editora);

    header("Location: ../../");
}else{
    header("Location: ../../");
}