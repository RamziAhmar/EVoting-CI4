<?= $this->extend('home/layout') ?>

<?= $this->section('home') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Peserta Pemilihan</h3>
            <div class="card-tools">
                <span class="mailbox-read-time float-right"><?= $rowPeserta ?> Peserta</span>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($peserta as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->nim ?></td>
                            <td><?= $row->nama_lengkap ?></td>
                            <td><?= $row->angkatan ?></td>
                            <td class="text-center"><img src="<?= base_url('image/profil/') . $row->foto ?>" alt="Hilang"
                                    width="50px"></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Foto</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>