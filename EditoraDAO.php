<?php
/*
    Criação da classe Editora com o CRUD
*/
class EditoraDAO{
    
    public function create(Editora $editora) {
        try {
            $sql = "INSERT INTO editora (                   
                  nome)
                  VALUES (
                  :nome)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $editora->getNome());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir editora <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM editora order by nome asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEditora($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function update(Editora $editora) {
        try {
            $sql = "UPDATE editora set
                  nome=:nome                                                                       
                  WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $editora->getNome());            
            $p_sql->bindValue(":id", $editora->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e + $sql <br>";
        }
    }

    public function delete(Editora $editora) {
        try {
            $sql = "DELETE FROM editora WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $editora->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir editora<br> $e <br>";
        }
    }


    

    private function listaEditora($row) {
        $editora = new Editora();
        $editora->setId($row['id']);
        $editora->setNome($row['nome']);
        return $editora;
    }
 }

 ?>
