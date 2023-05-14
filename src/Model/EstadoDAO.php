<?php
/*
    Criação da classe Estado com o CRUD
*/
class EstadoDAO
{

    public function read()
    {
        try {
            $sql = "SELECT * FROM estado";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEstados($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            header("Location: ../View/endereco/lista.php?action=listar&msg=errorlistar");
            exit;
        }
    }

    public function readById(Estado $estado)
    {
        try {
            $sql = "SELECT id, nome, uf FROM estado WHERE id=:id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $estado->getId());
            $p_sql->execute();
            $result = $p_sql->fetchAll(PDO::FETCH_OBJ);
            $estado->setId($result[0]->id);
            $estado->setNome($result[0]->nome);
            $estado->setUf($result[0]->uf);
            return $estado;
        } catch (Exception $e) {
            header("Location: ../View/endereco/lista.php?action=buscar&msg=error");
            exit;
        }
    }

    private function listaEstados($row)
    {
        $estado = new Estado();
        $estado->setId($row['id']);
        $estado->setNome($row['nome']);
        $estado->setUf($row['uf']);


        return $estado;
    }
}
