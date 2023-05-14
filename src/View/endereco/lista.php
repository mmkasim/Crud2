<?php
include_once('../../conexao.php');
include_once('../../Model/EnderecoDAO.php');
include_once('../../Model/EnderecoModel.php');

//instancia as classes
$enderecodao = new EnderecoDAO();
$enderecos = [];

if (@$_GET['action'] != 'listar' && @$_GET['msg'] != 'errorlistar') {
    $enderecos = $enderecodao->read();
}


?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Static Tables</title>

    <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../../../assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="../../../assets/css/animate.css" rel="stylesheet">
    <link href="../../../assets/css/style.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="../../../assets/img/profile_small.jpg" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="../../../assets/#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David
                                            Williams</strong>
                                    </span> <span class="text-muted text-xs block">Art Director <b
                                            class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="../../../assets/profile.html">Profile</a></li>
                                <li><a href="../../../assets/contacts.html">Contacts</a></li>
                                <li><a href="../../../assets/mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="../../../assets/login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>
                        <a href="../../../assets/index.html"><i class="fa fa-th-large"></i> <span
                                class="nav-label">Dashboards</span>
                            <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../../../assets/index.html">Dashboard v.1</a></li>
                            <li><a href="../../../assets/dashboard_2.html">Dashboard v.2</a></li>
                            <li><a href="../../../assets/dashboard_3.html">Dashboard v.3</a></li>
                            <li><a href="../../../assets/dashboard_4_1.html">Dashboard v.4</a></li>
                            <li><a href="../../../assets/dashboard_5.html">Dashboard v.5 </a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="../categoria/lista.php"><i class="fa fa-diamond"></i> <span
                                class="nav-label">Categorias</span></a>
                    </li>
                    <li>
                        <a href="./lista.php"><i class="fa fa-diamond"></i> <span class="nav-label">Endereços</span></a>
                    </li>


                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="../../../assets/#"><i
                                class="fa fa-bars"></i> </a>


                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                        </li>



                        <li>
                            <a href="../../../assets/login.html">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Enderecos</h2>

                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Lista de enderecos </h5>

                                <a href="./form.php" class="btn btn-info btn-sm pull-right" type="button"><i
                                        class="fa fa-plus"></i><strong> Nova</strong>
                                </a>


                            </div>
                            <div class="ibox-content">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>Ações</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- acessando o objeto read dentro da dao -->
                                        <?php foreach ($enderecos as $endereco) : ?>
                                        <tr>
                                            <td> <?php echo $endereco->getId(); ?> </td>
                                            <td> <?php echo $endereco->getCep(); ?> </td>
                                            <td>
                                                <a href="./form.php?id=<?php echo $endereco->getId(); ?>"
                                                    class="btn btn-info btn-sm m-r-sm" type="button"><i
                                                        class="fa fa-paste"></i>
                                                    Editar</a>
                                                <a href="../../Controller/Endereco.php?del=<?php echo $endereco->getId(); ?>"
                                                    class="btn btn-danger btn-sm" type="button"><i
                                                        class="fa fa-close"></i>
                                                    Excluir</a>

                                            </td>

                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2017
                </div>
            </div>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="../../../assets/js/jquery-3.1.1.min.js"></script>
    <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../../../assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../../../assets/js/inspinia.js"></script>
    <script src="../../../assets/js/plugins/pace/pace.min.js"></script>

    <!-- Toastr script -->
    <script src="../../../assets/js/plugins/toastr/toastr.min.js"></script>

    <script type="text/javascript">
    $(function() {

        $('#showtoast').click(function() {
            var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
            var msg = $('#message').val();
            var title = $('#title').val() || '';
            var $showDuration = $('#showDuration');
            var $hideDuration = $('#hideDuration');
            var $timeOut = $('#timeOut');
            var $extendedTimeOut = $('#extendedTimeOut');
            var $showEasing = $('#showEasing');
            var $hideEasing = $('#hideEasing');
            var $showMethod = $('#showMethod');
            var $hideMethod = $('#hideMethod');
            var toastIndex = toastCount++;
            toastr.options = {
                closeButton: $('#closeButton').prop('checked'),
                debug: $('#debugInfo').prop('checked'),
                progressBar: $('#progressBar').prop('checked'),

                positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
                onclick: null,
                preventDuplicates: true
            };

        });
        <?php if (isset($_GET['action']) && isset($_GET['msg'])) : ?>


        // Mensagens de cadastro
        <?php if ($_GET['action'] == 'cadastrado' && $_GET['msg'] == 'success') : ?>

        toastr.success('Endereco salva com sucesso!')

        <?php endif; ?>
        <?php if ($_GET['action'] == 'cadastrar' && $_GET['msg'] == 'error') : ?>

        toastr.error('Erro ao cadastrar endereco!')

        <?php endif; ?>

        // Mensagens de atualização
        <?php if ($_GET['action'] == 'atualizado' && $_GET['msg'] == 'success') : ?>

        toastr.success('Endereco atualizada com sucesso!')

        <?php endif; ?>
        <?php if ($_GET['action'] == 'atualizar' && $_GET['msg'] == 'error') : ?>

        toastr.error('Erro ao atualizar endereco!')

        <?php endif; ?>

        // Mensagens de exclusao
        <?php if ($_GET['action'] == 'deletado' && $_GET['msg'] == 'success') : ?>

        toastr.success('Endereco excluída com sucesso!')

        <?php endif; ?>
        <?php if ($_GET['action'] == 'deletar' && $_GET['msg'] == 'error') : ?>

        toastr.error('Erro ao deletar a endereco!')

        <?php endif; ?>




        <?php if ($_GET['action'] == 'listar' && $_GET['msg'] == 'errorlistar') : ?>

        toastr.error('Erro ao buscar a(s) endereco(s)!')

        <?php endif; ?>

        <?php if ($_GET['action'] == 'buscar' && $_GET['msg'] == 'error') : ?>

        toastr.error('Erro ao buscar a endereco!')

        <?php endif; ?>





        <?php endif; ?>

    })
    </script>

</body>

</html>