<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hash</th>
                        <th>Pemilihan</th>
                        <th>Kandidat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($suara as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->hash_nim ?></td>
                            <td><?= $row->nama_pemilihan ?></td>
                            <td><?= $row->nama_kandidat ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Hash</th>
                        <th>Pemilihan</th>
                        <th>Kandidat</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>