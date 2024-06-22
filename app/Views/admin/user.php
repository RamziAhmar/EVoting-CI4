<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data User</h3>
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#tambah">Tambah
                        Data <i class="fa fa-plus"></i></button>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td><?= $row['level'] == 1 ? 'Admin' : 'Peserta' ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#ubah<?= $row['id_user'] ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#hapus<?= $row['id_user'] ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<form action="/admin/user/insert" method="post" enctype="multipart/form-data">
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password"
                            placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <label>Akses</label>
                        <select class="form-control" name="level">
                            <option>Pilih Akses</option>
                            <option value="1">Admin</option>
                            <option value="2">Peserta</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#selanjutnya">Selanjutnya</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="selanjutnya">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Profil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="number" class="form-control" name="nim" id="nim" placeholder="Masukkan NIM">
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                            placeholder="Masukkan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="number" class="form-control" name="angkatan" id="angkatan"
                            placeholder="Masukkan Angkatan">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto"
                            placeholder="Masukkan Foto">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>

<?php foreach ($user as $row): ?>
    <!-- Modal Ubah Data -->
    <div class="modal fade" id="ubah<?= $row['id_user'] ?>">
        <form action="/admin/user/update/<?= $row['id_user'] ?>" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email"
                                value="<?= $row['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password"
                                placeholder="Masukkan Password" value="<?= $row['password'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Akses</label>
                            <select class="form-control" name="level">
                                <option>Pilih Akses</option>
                                <option value="1" <?= $row['level'] == 1 ? 'selected' : null ?>>Admin</option>
                                <option value="2" <?= $row['level'] == 2 ? 'selected' : null ?>>Peserta</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </form>
    </div>
    <!-- /.modal -->
<?php endforeach ?>

<?php foreach ($user as $row): ?>
    <!-- Modal hapus Data -->
    <div class="modal fade" id="hapus<?= $row['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus user<?= $row['email'] ?></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a type="button" href="/admin/user/delete/<?= $row['id_user'] ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>
<?= $this->endSection() ?>