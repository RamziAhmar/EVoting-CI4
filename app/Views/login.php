<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template/') ?>distt/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url('template/') ?>index2.html"><b>E-Voting</b>BEM</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masuk Akun</p>

                <form action="/login/proses" method="post">
                    <?= (session()->getFlashdata('error')) ? '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Email atau Password anda salah!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' : null ?>
                    <?= (session()->getFlashdata('errors')) ? '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Email dan Password harus diisi!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' : null ?>
                    <div class="input-group mb-3">
                        <input name="email" type="email"
                            class="form-control <?= (session()->getFlashdata('errors')) || session()->getFlashdata('error') ? 'is-invalid' : null ?>"
                            placeholder="Email" value="<?= old('email') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password"
                            class="form-control <?= (session()->getFlashdata('errors')) || session()->getFlashdata('error') ? 'is-invalid' : null ?>"
                            placeholder="Password" <?= old('password') ?>>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <div class="input-group mb-3">
                        <a href="/" class="btn btn-danger btn-block">Kembali</a>
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('template/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('template/') ?>dist/js/adminlte.min.js"></script>

</body>

</html>