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

    <title>E-Voting BEM | <?= $title ?></title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/toastr/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="<?= base_url('template/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="/pemilihan" class="nav-link">Pemilihan</a>
                        </li>
                        <li class="nav-item">
                            <a href="/peserta" class="nav-link">Peserta</a>
                        </li>
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <?php if (session()->get('level') == 1) { ?>
                            <li class="nav-item">
                                <a href="/admin/dashboard" class="nav-link">Admin</a>
                            </li>
                        <?php } ?>
                        <?php if (session()->has('logged_in') && session()->get('logged_in') === true) { ?>
                            <li class="nav-item">
                                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                                    role="button"><i class="fas fa-user"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Login</a>
                            </li>
                        <?php } ?>
                    </ul>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> E-Voting BEM <small><?= $title ?></small></h1>
                        </div><!-- /.col -->
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Top Navigation</li>
                            </ol>
                        </div>/.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <?= $this->renderSection('home') ?>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php if (session()->has('logged_in') && session()->get('logged_in') === true) { ?>
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
        <?php } ?>

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
    <!-- SweetAlert2 -->
    <script src="<?= base_url('template/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url('template/') ?>plugins/toastr/toastr.min.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });
            <?php if (session()->getFlashdata('sukses')): ?>
                Toast.fire({
                    icon: 'success',
                    title: 'Login Sukses!! Selamat Datang <?= session()->get('profil')['nama_lengkap'] ?>'
                })
            <?php endif ?>
            <?php if (session()->getFlashdata('vote')): ?>
                Toast.fire({
                    icon: 'success',
                    title: 'Vote Berhasil!! Terimakasih Telah Berpartisipasi!'
                })
            <?php endif ?>
            <?php if (session()->getFlashdata('logout')): ?>
                Toast.fire({
                    icon: 'success',
                    title: 'Anda Telah Logout!!'
                })
            <?php endif ?>
            <?php if (session()->getFlashdata('hasVote')): ?>
                Toast.fire({
                    icon: 'error',
                    title: '<?= session()->getFlashdata('hasVote') ?>'
                })
            <?php endif ?>
        });
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