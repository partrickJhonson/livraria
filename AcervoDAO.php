<?php
/*
    Criação da classe Acervo com o CRUD
*/
class AcervoDAO{
    
    public function create(Acervo $acervo) {
        try {
            $sql = "INSERT INTO acervo (                   
                  autor,titulo,ano,preco,editora)
                  VALUES (
                  :autor,:titulo,:ano,:preco,:editora)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":autor", $acervo->getAutor());
            $p_sql->bindValue(":titulo", $acervo->getTitulo());
            $p_sql->bindValue(":ano", $acervo->getAno());
            $p_sql->bindValue(":preco", $acervo->getPreco());
            $p_sql->bindValue(":editora", $acervo->getEditora());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir acervo <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT id,autor,titulo,ano,preco,quantidade,tipo, (select nome from editora where id=editora )as editora FROM acervo order by autor asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaAcervos($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    public function readP(String $pesquisa) {
        try {
            $sql = "SELECT id,autor,titulo,ano,preco,quantidade,tipo, (select nome from editora where id=editora )as editora FROM acervo where autor LIKE '%$pesquisa%'";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaAcervos($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    
    public function update(Acervo $acervo) {
        try {
            $sql = "UPDATE acervo set
                
                  autor=:autor,
                  titulo=:titulo,
                  ano=:ano,
                  preco=:preco,
                  editora=:editora,
                  quantidade=:quantidade,
                  tipo=:tipo
                                                                       
                  WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":autor", $acervo->getAutor());
            $p_sql->bindValue(":titulo", $acervo->getTitulo());
            $p_sql->bindValue(":ano", $acervo->getAno());
            $p_sql->bindValue(":preco", $acervo->getPreco());
            $p_sql->bindValue(":editora", $acervo->getEditora());
            $p_sql->bindValue(":quantidade", $acervo->getQuantidade());
            $p_sql->bindValue(":tipo", $acervo->getTipo());
            
            $p_sql->bindValue(":id", $acervo->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(Acervo $acervo) {
        try {
            $sql = "DELETE FROM acervo WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $acervo->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir acervo<br> $e <br>";
        }
    }


    

    private function listaAcervos($row) {
        $acervo = new Acervo();
        $acervo->setId($row['id']);
        $acervo->setAutor($row['autor']);
        $acervo->setTitulo($row['titulo']);
        $acervo->setAno($row['ano']);
        $acervo->setPreco($row['preco']);
        $acervo->setEditora($row['editora']);
        $acervo->setQuantidade($row['quantidade']);
        $acervo->setTipo($row['tipo']);

        return $acervo;
    }
 }

 ?>
