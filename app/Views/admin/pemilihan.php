<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pemilihan</h3>
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
                        <th>Nama Pemilihan</th>
                        <th>Waktu Dimulai</th>
                        <th>Waktu Selesai</th>
                        <th>Waktu Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pemilihan as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_pemilihan'] ?></td>
                            <td><?= $row['waktu_dimulai'] ?></td>
                            <td><?= $row['waktu_selesai'] ?></td>
                            <td><?= $row['dibuat'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#ubah<?= $row['id_pemilihan'] ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#hapus<?= $row['id_pemilihan'] ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilihan</th>
                        <th>Waktu Dimulai</th>
                        <th>Waktu Selesai</th>
                        <th>Waktu Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<form action="/admin/pemilihan/insert" method="post">
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pemilihan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_pemilihan">Nama Pemilihan</label>
                        <input type="text" class="form-control" name="nama_pemilihan" id="nama_pemilihan"
                            placeholder="Masukkan Nama Pemilihan">
                    </div>
                    <div class="form-group">
                        <label for="waktu_dimulai">Waktu Dimulai</label>
                        <input type="datetime-local" class="form-control" name="waktu_dimulai" id="waktu_dimulai" placeholder="Masukkan Waktu Dimulai">
                    </div>
                    <div class="form-group">
                        <label for="waktu_selesai">Waktu Selesai</label>
                        <input type="datetime-local" class="form-control" name="waktu_selesai" id="waktu_selesai" placeholder="Masukkan Waktu Selesai">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>

<?php foreach ($pemilihan as $row): ?>
    <!-- Modal Ubah Data -->
    <div class="modal fade" id="ubah<?= $row['id_pemilihan'] ?>">
        <form action="/admin/pemilihan/update/<?= $row['id_pemilihan'] ?>" method="post" enctype="multipart/form-data">
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
                        <label for="nama_pemilihan">Nama Pemilihan</label>
                        <input type="text" class="form-control" name="nama_pemilihan" id="nama_pemilihan" value="<?= $row['nama_pemilihan'] ?>"
                            placeholder="Masukkan Nama Pemilihan">
                    </div>
                    <div class="form-group">
                        <label for="waktu_dimulai">Waktu Dimulai</label>
                        <input type="datetime-local" class="form-control" name="waktu_dimulai" id="waktu_dimulai" placeholder="Masukkan Waktu Dimulai" value="<?= $row['waktu_dimulai'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="waktu_selesai">Waktu Selesai</label>
                        <input type="datetime-local" class="form-control" name="waktu_selesai" id="waktu_selesai" placeholder="Masukkan Waktu Selesai" value="<?= $row['waktu_selesai'] ?>">
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

<?php foreach ($pemilihan as $row): ?>
    <!-- Modal hapus Data -->
    <div class="modal fade" id="hapus<?= $row['id_pemilihan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus pemilihan <?= $row['nama_pemilihan']?></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a type="button" href="/admin/pemilihan/delete/<?= $row['id_pemilihan'] ?>"
                        class="btn btn-danger">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>
<?= $this->endSection() ?>