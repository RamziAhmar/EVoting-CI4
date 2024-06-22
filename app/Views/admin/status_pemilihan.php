<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Status Pemilihan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Pemilihan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($status as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->nim ?></td>
                            <td><?= $row->nama_lengkap ?></td>
                            <td><?= $row->nama_pemilihan ?></td>
                            <td><?= $row->status ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Pemilihan</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>