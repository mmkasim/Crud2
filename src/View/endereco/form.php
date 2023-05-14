<?php
include_once('../../conexao.php');
include_once('../../Model/EnderecoDAO.php');
include_once('../../Model/EstadoDAO.php');
include_once('../../Model/EnderecoModel.php');
include_once('../../Model/EstadoModel.php');

$id = @$_GET['id'];

//instancia as classes
$enderecodao = new EnderecoDAO();
$estadodao = new EstadoDAO();
$endereco = new Endereco();
$estado = new Estado();
$endereco->setId($id);
if (isset($id)) {
    $endereco = $enderecodao->readById($endereco);
};
$estados = $estadodao->read();

$id_usuario = '03211247157';

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Basic Form</title>

    <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../../assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../../../assets/css/animate.css" rel="stylesheet">
    <link href="../../../assets/css/style.css" rel="stylesheet">

    <link href="../../../assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

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
                        <a href="./lista.php"><i class="fa fa-diamond"></i> <span class="nav-label">Enderecos</span></a>
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
                                <h5><?php echo $endereco->getId() ? 'Editando endereco' : 'Nova endereco' ?></h5>

                            </div>
                            <div class="ibox-content">
                                <form method="post" action="../../Controller/Endereco.php" class="form-horizontal">
                                    <div class="form-group"><label class="col-sm-2 control-label">Estado</label>

                                        <div class="col-sm-10"><select class="form-control m-b" name="estado">

                                                <?php foreach ($estados as $estado) : ?>
                                                <option value="<?php echo $estado->getId(); ?>">
                                                    <?php echo $estado->getNome(); ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>


                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-sm-2 control-label">Cidade</label>

                                        <div class="col-sm-10"><select class="form-control m-b" name="fk_cidade_id">
                                                <option value="11">option 1</option>
                                                <option value="121">option 2</option>
                                                <option value="211">option 3</option>
                                                <option value="44">option 4</option>
                                            </select>


                                        </div>
                                    </div>







                                    <div class="form-group"><label class="col-sm-2 control-label">Bairro</label>

                                        <div class="col-sm-10"><input type="text" name="bairro"
                                                value="<?php echo $endereco->getBairro() ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-sm-2 control-label">Endereço/Rua</label>

                                        <div class="col-sm-10"><input type="text" name="endereco"
                                                value="<?php echo $endereco->getEndereco() ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-sm-2 control-label">Numero</label>

                                        <div class="col-sm-10"><input type="text" name="numero"
                                                value="<?php echo $endereco->getNumero() ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-sm-2 control-label">Complemento</label>

                                        <div class="col-sm-10"><input type="text" name="complemento"
                                                value="<?php echo $endereco->getComplemento() ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-sm-2 control-label">CEP</label>

                                        <div class="col-sm-10"><input type="text" name="cep"
                                                value="<?php echo $endereco->getCep() ?>" class="form-control">
                                        </div>
                                    </div>

                                    <input type="hidden" name="fk_usuario_cpf" value="<?php echo $id_usuario; ?>">
                                    <div class="hr-line"></div>
                                    <input type="hidden" name="id" value="<?= $endereco->getId() ?>" />

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2" align="right">
                                            <a href="./lista.php" class="btn btn-white" type="button">Cancel</a>
                                            <!-- isso aqui é um if e else ternario dentro do name -->
                                            <button class="btn btn-primary" type="submit"
                                                name="<?php echo $endereco->getId() ? 'editar' : 'cadastrar' ?>">Salvar</button>
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
    <script src="../../../assets/js/jquery-3.1.1.min.js"></script>
    <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../../../assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../../../assets/js/inspinia.js"></script>
    <script src="../../../assets/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="../../../assets/js/plugins/iCheck/icheck.min.js"></script>
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