<?php
/*
    Criação da classe Categoria com o CRUD
*/
class CategoriaDAO
{

    public function create(Categoria $categoria)
    {
        try {
            $sql = "INSERT INTO categoria (nome) VALUES(:nome)";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $categoria->getNome());

            return $p_sql->execute();
        } catch (Exception $e) {
            // print_r($e);
            header("Location: lista.php?action=cadastrar&msg=error");
            exit;
        }
    }

    public function read()
    {
        try {
            $sql = "SELECT * FROM categoria order by id asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaCategorias($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            header("Location: lista.php?action=listar&msg=errorlistar");
            exit;
        }
    }

    public function readById(Categoria $categoria)
    {
        try {
            $sql = "SELECT id, nome FROM categoria WHERE id=:id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $categoria->getId());
            $p_sql->execute();
            $result = $p_sql->fetchAll(PDO::FETCH_OBJ);
            $categoria->setId($result[0]->id);
            $categoria->setNome($result[0]->nome);
            return $categoria;
        } catch (Exception $e) {
            header("Location: lista.php?action=buscar&msg=error");
            exit;
        }
    }

    public function update(Categoria $categoria)
    {
        try {
            $sql = "UPDATE categoria set
                
                  nome=:nome                  
                                                                       
                  WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $categoria->getNome());

            $p_sql->bindValue(":id", $categoria->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            header("Location: lista.php?action=atualizar&msg=error");
            exit;
        }
    }

    public function delete(Categoria $categoria)
    {
        try {
            $sql = "DELETE FROM categoria WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $categoria->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            header("Location: lista.php?action=deletar&msg=error");
            exit;
        }
    }




    private function listaCategorias($row)
    {
        $categoria = new Categoria();
        $categoria->setId($row['id']);
        $categoria->setNome($row['nome']);


        return $categoria;
    }
}