<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin | <?= $title ?></title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Kembali</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                            class="fas fa-user"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('template/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('template/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/admin/dashboard"
                                class="nav-link  <?= ($title == 'Dashboard') ? 'active' : null ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?= ($page == 'Master Data') ? 'menu-open' : null ?>">
                            <a href="#" class="nav-link <?= ($page == 'Master Data') ? 'active' : null ?>">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/user" class="nav-link <?= ($title == 'User') ? 'active' : null ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/kandidat"
                                        class="nav-link <?= ($title == 'Kandidat') ? 'active' : null ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kandidat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/pemilihan"
                                        class="nav-link <?= ($title == 'Pemilihan') ? 'active' : null ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pemilihan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/suara"
                                        class="nav-link <?= ($title == 'Suara') ? 'active' : null ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Suara</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/status_pemilihan"
                                        class="nav-link <?= ($title == 'Status Pemilihan') ? 'active' : null ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Status Pemilihan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $title ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?= $this->renderSection('content') ?>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="<?= base_url('template/') ?>dist/img/user4-128x128.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= session()->get('nim')['nama_lengkap'] ?></h3>

                        <p class="text-muted text-center"><?= session()->get('nim')['nim'] ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <?= session()->get('nim')['email'] ?>
                            </li>
                            <li class="list-group-item">
                                <b>Angkatan</b> <a class="float-right"><?= session()->get('nim')['angkatan'] ?></a>
                            </li>

                        </ul>

                        <a href="/logout" class="btn btn-danger btn-block"><i class="fa fa-door-open"></i><b>
                                Logout</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('template/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('template/') ?>dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('template/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('template/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('template/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>