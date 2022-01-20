<?php

class Acervo{
    
    private $id;
    private $autor;
    private $titulo;
    private $ano;
    private $preco;
    private $editora;
    private $quantidade;
    private $tipo;
    
    function getId() {
        return $this->id;
    }

    function getAutor() {
        return $this->autor;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAno() {
        return $this->ano;
    }

    function getPreco() {
        return $this->preco;
    }
    function getEditora() {
        return $this->editora;
    }
    function getQuantidade() {
        return $this->quantidade;
    }
    function getTipo() {
        return $this->tipo;
    }    
    function setId($id) {
        $this->id = $id;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }
    function setEditora($editora) {
        $this->editora = $editora;
    }    
    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }        

    
}

