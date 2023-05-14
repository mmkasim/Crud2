<?php
include_once('../conexao.php');
include_once('../Model/EnderecoModel.php');
include_once('../Model/EnderecoDAO.php');

//instancia as classes
$endereco = new Endereco();
$enderecodao = new EnderecoDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);


//se a operação for gravar entra nessa condição
if (isset($_POST['cadastrar'])) {
    $endereco->setCep($d['cep']);
    $endereco->setEndereco($d['endereco']);
    $endereco->setNumero($d['numero']);
    $endereco->setComplemento($d['complemento']);
    $endereco->setBairro($d['bairro']);
    $endereco->setFk_usuario_cpf($d['fk_usuario_cpf']);
    $endereco->setFk_cidade_id($d['fk_cidade_id']);


    $enderecodao->create($endereco);
    header("Location: ../View/endereco/lista.php?action=cadastrado&msg=success");
}
// se a requisição for editar
else if (isset($_POST['editar'])) {

    $endereco->setCep($d['cep']);
    $endereco->setEndereco($d['endereco']);
    $endereco->setNumero($d['numero']);
    $endereco->setComplemento($d['complemento']);
    $endereco->setBairro($d['bairro']);
    $endereco->setFk_usuario_cpf($d['fk_usuario_cpf']);
    $endereco->setFk_cidade_id($d['fk_cidade_id']);

    $endereco->setId($d['id']);

    $enderecodao->update($endereco);

    header("Location: ../View/endereco/lista.php?action=atualizado&msg=success");
}
// se a requisição for deletar
else if (isset($_GET['del'])) {

    $endereco->setId($_GET['del']);

    $enderecodao->delete($endereco);

    header("Location: ../View/endereco/lista.php?action=deletado&msg=success");
} else {
    header("Location: ../View/endereco/lista.php");
}
