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
                        <th>Pemilihan</th>
                        <th>Nama Kandidat</th>
                        <th>Nama Wakil</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kandidat as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->nama_pemilihan ?></td>
                            <td><?= $row->nama_kandidat ?></td>
                            <td><?= $row->nama_wakil ?></td>
                            <td><?= $row->visi ?></td>
                            <td><?= $row->misi ?></td>
                            <td><?= $row->foto ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#ubah<?= $row->id_kandidat ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#hapus<?= $row->id_kandidat ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Pemilihan</th>
                        <th>Nama Kandidat</th>
                        <th>Nama Wakil</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>foto</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<form action="/admin/kandidat/insert" method="post" enctype="multipart/form-data">
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kandidat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_pemilihan">Pemilihan</label>
                        <select class="form-control" name="id_pemilihan" id="id_pemilihan">
                            <option>Pilih</option>
                            <?php foreach ($pemilihan as $row): ?>
                                <option value="<?= $row['id_pemilihan'] ?>"><?= $row['nama_pemilihan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_kandidat">Nama Kandidat</label>
                        <input type="text" class="form-control" name="nama_kandidat" id="nama_kandidat"
                            placeholder="Masukkan Nama Kandidat">
                    </div>
                    <div class="form-group">
                        <label for="nama_wakil">Nama Wakil</label>
                        <input type="text" class="form-control" name="nama_wakil" id="nama_wakil"
                            placeholder="Masukkan Nama Wakil">
                    </div>
                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <input type="text" class="form-control" name="visi" id="visi" placeholder="Masukkan Visi">
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <input type="text" class="form-control" name="misi" id="misi" placeholder="Masukkan Misi">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan Foto">
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</form>

<?php foreach ($kandidat as $row): ?>
    <!-- Modal Ubah Data -->
    <div class="modal fade" id="ubah<?= $row->id_kandidat ?>">
        <form action="/admin/kandidat/update/<?= $row->id_kandidat ?>" method="post" enctype="multipart/form-data">
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
                            <label for="email">Pemilihan</label>
                            <select class="form-control" name="id_pemilihan" id="id_pemilihan">
                                <option>Pilih</option>
                                <?php foreach ($pemilihan as $data): ?>
                                    <option value="<?= $data['id_pemilihan'] ?>"
                                        <?= ($row->id_pemilihan == $data['id_pemilihan']) ? 'selected' : null ?>>
                                        <?= $data['nama_pemilihan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_kandidat">Nama Kandidat</label>
                            <input type="text" class="form-control" name="nama_kandidat" id="nama_kandidat"
                                placeholder="Masukkan Nama Kandidat" value="<?= $row->nama_kandidat ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_wakil">Nama Wakil</label>
                            <input type="text" class="form-control" name="nama_wakil" id="nama_wakil"
                                placeholder="Masukkan Nama Wakil" value="<?= $row->nama_wakil ?>">
                        </div>
                        <div class="form-group">
                            <label for="visi">Visi</label>
                            <input type="text" class="form-control" name="visi" id="visi" placeholder="Masukkan Visi"
                                value="<?= $row->visi ?>">
                        </div>
                        <div class="form-group">
                            <label for="misi">Misi</label>
                            <input type="text" class="form-control" name="misi" id="misi" placeholder="Masukkan Misi"
                                value="<?= $row->misi ?>">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan Foto" value="<?= $row->foto ?>">
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

<?php foreach ($kandidat as $row): ?>
    <!-- Modal hapus Data -->
    <div class="modal fade" id="hapus<?= $row->id_kandidat ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus kandidat <?= $row->nama_kandidat ?></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a type="button" href="/admin/kandidat/delete/<?= $row->id_kandidat ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>
<?= $this->endSection() ?>