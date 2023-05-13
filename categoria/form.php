<?php
include_once('../conexao.php');
include_once('./DAO.php');
include_once('./Model.php');
$id = @$_GET['id'];

//instancia as classes
$categoriadao = new CategoriaDAO();
$categoria = new Categoria();
$categoria->setId($id);
if (isset($id)) {
    $categoria = $categoriadao->readById($categoria);
};

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Basic Form</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="../img/profile_small.jpg" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="../#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David
                                            Williams</strong>
                                    </span> <span class="text-muted text-xs block">Art Director <b
                                            class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="../profile.html">Profile</a></li>
                                <li><a href="../contacts.html">Contacts</a></li>
                                <li><a href="../mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="../login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>
                        <a href="../index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span>
                            <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="../index.html">Dashboard v.1</a></li>
                            <li><a href="../dashboard_2.html">Dashboard v.2</a></li>
                            <li><a href="../dashboard_3.html">Dashboard v.3</a></li>
                            <li><a href="../dashboard_4_1.html">Dashboard v.4</a></li>
                            <li><a href="../dashboard_5.html">Dashboard v.5 </a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="./lista.php"><i class="fa fa-diamond"></i> <span
                                class="nav-label">Categorias</span></a>
                    </li>


                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="../#"><i
                                class="fa fa-bars"></i> </a>


                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                        </li>



                        <li>
                            <a href="../login.html">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Categorias</h2>

                </div>
                <div class="col-lg-2">

                </div>
            </div>


            <div class="wrapper wrapper-content animated fadeInRight">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5><?php echo $categoria->getId() ? 'Editando categoria' : 'Nova categoria' ?></h5>

                            </div>
                            <div class="ibox-content">
                                <form method="post" action="./Controle.php" class="form-horizontal">
                                    <div class="form-group"><label class="col-sm-2 control-label">Nome</label>

                                        <div class="col-sm-10"><input type="text" name="nome"
                                                value="<?php echo $categoria->getNome() ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="hr-line"></div>
                                    <input type="hidden" name="id" value="<?= $categoria->getId() ?>" />

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2" align="right">
                                            <a href="./lista.php" class="btn btn-white" type="button">Cancel</a>
                                            <!-- isso aqui é um if e else ternario dentro do name -->
                                            <button class="btn btn-primary" type="submit"
                                                name="<?php echo $categoria->getId() ? 'editar' : 'cadastrar' ?>">Salvar</button>
                                        </div>
                                    </div>
                                </form>
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
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="../js/plugins/iCheck/icheck.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
    </script>
</body>

</html>