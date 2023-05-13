<?php
include_once('../conexao.php');
include_once('../Model/CategoriaModel.php');
include_once('../Model/CategoriaDAO.php');

//instancia as classes
$categoria = new Categoria();
$categoriadao = new CategoriaDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);


//se a operação for gravar entra nessa condição
if (isset($_POST['cadastrar'])) {
    $categoria->setNome($d['nome']);
    $categoriadao->create($categoria);
    header("Location: ../View/categoria/lista.php?action=cadastrado&msg=success");
}
// se a requisição for editar
else if (isset($_POST['editar'])) {

    $categoria->setNome($d['nome']);
    $categoria->setId($d['id']);

    $categoriadao->update($categoria);

    header("Location: ../View/categoria/lista.php?action=atualizado&msg=success");
}
// se a requisição for deletar
else if (isset($_GET['del'])) {

    $categoria->setId($_GET['del']);

    $categoriadao->delete($categoria);

    header("Location: ../View/categoria/lista.php?action=deletado&msg=success");
} else {
    header("Location: ../View/categoria/lista.php");
}
