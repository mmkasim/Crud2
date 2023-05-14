<?php
/*
    Criação da classe Cidade com o CRUD
*/
class CidadeDAO
{

    public function read(Estado $estado)
    {
        try {
            $sql = "SELECT * FROM cidade where fk_estado_id=:id";
            $result = Conexao::getConexao()->query($sql);
            $result->bindValue(":id", $estado->getId());
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaCidades($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            header("Location: ../View/endereco/lista.php?action=listar&msg=errorlistar");
            exit;
        }
    }

    public function readById(Cidade $cidade)
    {
        try {
            $sql = "SELECT id, nome FROM cidade WHERE id=:id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $cidade->getId());
            $p_sql->execute();
            $result = $p_sql->fetchAll(PDO::FETCH_OBJ);
            $cidade->setId($result[0]->id);
            $cidade->setNome($result[0]->nome);
            return $cidade;
        } catch (Exception $e) {
            header("Location: ../View/endereco/lista.php?action=buscar&msg=error");
            exit;
        }
    }

    private function listaCidades($row)
    {
        $cidade = new Cidade();
        $cidade->setId($row['id']);
        $cidade->setNome($row['nome']);


        return $cidade;
    }
}
