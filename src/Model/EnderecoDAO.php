<?php
/*
    Criação da classe Endereco com o CRUD
*/
class EnderecoDAO
{

    public function create(Endereco $endereco)
    {
        try {
            $sql = "INSERT INTO endereco
            (cep, endereco, numero, complemento, bairro, fk_usuario_cpf, fk_cidade_id)
            VALUES(:cep, :endereco, :numero, :complemento, :bairro, :fk_usuario_cpf, :fk_cidade_id);
            ";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":cep", $endereco->getCep());
            $p_sql->bindValue(":endereco", $endereco->getEndereco());
            $p_sql->bindValue(":numero", $endereco->getNumero());
            $p_sql->bindValue(":complemento", $endereco->getComplemento());
            $p_sql->bindValue(":bairro", $endereco->getBairro());
            $p_sql->bindValue(":fk_usuario_cpf", $endereco->getFk_usuario_cpf());
            $p_sql->bindValue(":fk_cidade_id", $endereco->getFk_cidade_id());

            return $p_sql->execute();
        } catch (Exception $e) {
            // print_r($e);
            header("Location: ../View/endereco/lista.php?action=cadastrar&msg=error");
            exit;
        }
    }

    public function read()
    {
        try {
            $sql = "SELECT id, cep, endereco, numero, complemento, bairro, fk_usuario_cpf, fk_cidade_id FROM endereco;";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEnderecos($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            header("Location: ../View/endereco/lista.php?action=listar&msg=errorlistar");
            exit;
        }
    }

    public function readById(Endereco $endereco)
    {
        try {
            $sql = "SELECT id, cep, endereco, numero, complemento, bairro, fk_usuario_cpf, fk_cidade_id FROM endereco WHERE id=:id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $endereco->getId());
            $p_sql->execute();
            $result = $p_sql->fetchAll(PDO::FETCH_OBJ);
            $endereco->setId($result[0]->id);
            $endereco->setCep($result[0]->cep);
            $endereco->setEndereco($result[0]->endereco);
            $endereco->setNumero($result[0]->numero);
            $endereco->setComplemento($result[0]->complemento);
            $endereco->setBairro($result[0]->bairro);
            $endereco->setFk_usuario_cpf($result[0]->fk_usuario_cpf);
            $endereco->setFk_cidade_id($result[0]->fk_cidade_id);
            return $endereco;
        } catch (Exception $e) {
            header("Location: ../View/endereco/lista.php?action=buscar&msg=error");
            exit;
        }
    }

    public function update(Endereco $endereco)
    {
        try {
            $sql = "UPDATE endereco
            SET cep=:cep, endereco=:endereco, numero=:numero, complemento=:complemento, bairro=:bairro, fk_usuario_cpf=:fk_usuario_cpf, fk_cidade_id=:fk_cidade_id WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);

            $p_sql->bindValue(":cep", $endereco->getCep());
            $p_sql->bindValue(":endereco", $endereco->getEndereco());
            $p_sql->bindValue(":numero", $endereco->getNumero());
            $p_sql->bindValue(":complemento", $endereco->getComplemento());
            $p_sql->bindValue(":bairro", $endereco->getBairro());
            $p_sql->bindValue(":fk_usuario_cpf", $endereco->getFk_usuario_cpf());
            $p_sql->bindValue(":fk_cidade_id", $endereco->getFk_cidade_id());

            $p_sql->bindValue(":id", $endereco->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            header("Location: ../View/endereco/lista.php?action=atualizar&msg=error");
            exit;
        }
    }

    public function delete(Endereco $endereco)
    {
        try {
            $sql = "DELETE FROM endereco WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $endereco->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            header("Location: ../View/endereco/lista.php?action=deletar&msg=error");
            exit;
        }
    }




    private function listaEnderecos($row)
    {
        $endereco = new Endereco();
        $endereco->setId($row['id']);

        $endereco->setCep($row['cep']);
        $endereco->setEndereco($row['endereco']);
        $endereco->setNumero($row['numero']);
        $endereco->setComplemento($row['complemento']);
        $endereco->setBairro($row['bairro']);
        $endereco->setFk_usuario_cpf($row['fk_usuario_cpf']);
        $endereco->setFk_cidade_id($row['fk_cidade_id']);


        return $endereco;
    }
}
