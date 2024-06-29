<?= $this->extend('home/layout') ?>

<?= $this->section('home') ?>
<div class="row">
    <div class="col-md-6">
        <div class="callout callout-info">
            <h5>Pemilihan Telah Ditutup!!</h5>
            <p>Terimakasih Atas Partisipasinya</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Kandidat Terpilih</h3>
                <h5 class="widget-user-desc"><?= $kandidatPemenang['nama_kandidat'] ?> & <?= $kandidatPemenang['nama_wakil'] ?></h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?= base_url('image/kandidat/') . $kandidatPemenang['foto'] ?>" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?= $suaraTerbanyak ?></h5>
                            <span class="description-text">Suara Diperoleh</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>  

    <!-- /.col -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Persentase Perolehan Suara</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Kandidat</th>
                            <th>Perolehan</th>
                            <th style="width: 40px">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($perolehanSuara as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_kandidat'] ?><br><?= $row['nama_wakil'] ?></td>
                                <td><?= $row['jumlah_suara'] ?> suara</td>
                                <td><img width="50px" src="<?= base_url('image/kandidat/') . $row['foto'] ?>" alt=""></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Suara</h3>
                <div class="card-tools">
                    <?= $golput ?> Peserta Tidak Memilih
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Hash NIM</th>
                            <th>Kandidat Dipilih</th>
                            <th style="width: 40px">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataSuara as $suara) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $suara['hash_nim'] ?></td>
                                <td>
                                    <?php
                                    $kandidatDipilih = array_filter($kandidat, function ($k) use ($suara) {
                                        return $k['id_kandidat'] == $suara['id_kandidat'];
                                    });
                                    $kandidatDipilih = array_shift($kandidatDipilih);
                                    echo $kandidatDipilih['nama_kandidat'];
                                    ?>
                                </td>
                                <td><img src="<?= base_url('image/kandidat/') . $kandidatDipilih['foto'] ?>"
                                        alt="Foto Kandidat" width="40px"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Tidak Memilih</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th style="width: 40px">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataSuara as $suara) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $suara['hash_nim'] ?></td>
                                <td>
                                    <?php
                                    $kandidatDipilih = array_filter($kandidat, function ($k) use ($suara) {
                                        return $k['id_kandidat'] == $suara['id_kandidat'];
                                    });
                                    $kandidatDipilih = array_shift($kandidatDipilih);
                                    echo $kandidatDipilih['nama_kandidat'];
                                    ?>
                                </td>
                                <td><img src="<?= base_url('image/kandidat/') . $kandidatDipilih['foto'] ?>"
                                        alt="Foto Kandidat" width="40px"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>