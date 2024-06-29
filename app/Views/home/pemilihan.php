<?= $this->extend('home/layout') ?>

<?= $this->section('home') ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Riwayat Pemilihan</h3>

        <div class="card-tools">
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 30%">
                        Nama Pemilihan
                    </th>
                    <th style="width: 25%">
                        Kandidat
                    </th>
                    <th style="width: 25%">
                        Pemenang
                    </th>
                    <th style="width: 19%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($pemilihan as $row): ?>
                    <tr>
                        <td>
                            <?= $no++ ?>
                        </td>
                        <td>
                            <a>
                                <?= $row->nama_pemilihan ?>
                            </a>
                            <br />
                            <small>
                                <?= $row->waktu_dimulai ?> - <?= $row->waktu_selesai ?>
                            </small>
                        </td>
                        <td>
                            <?php foreach($kandidat as $k) { ?>
                                <?= $k['nama_kandidat'] ?>
                            <?php } ?>
                        </td>
                        <td>
                            <?= $row->waktu_selesai ?>
                        </td>
                        <td class="project-actions text-center">
                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#read-<?= $row->id_pemilihan ?>">
                                <i class="fas fa-eye">
                                </i>
                                Selengkapnya
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($pemilihan as $row): ?>
    <!-- Modal Read -->
    <div class="modal fade" id="read-<?= $row->id_pemilihan ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pemilihan <?= $row->nama_pemilihan ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Kandidat</h4>
                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                        <li>
                            <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name">Nama Kandidat</a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <span>Perolehan Suara</span>
                                </span>
                            </div>
                        </li>
                        <li>
                            <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App
                                    Description.docx</a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <span>1,245 KB</span>
                                    <a href="#" class="btn btn-default btn-sm float-right"><i
                                            class="fas fa-cloud-download-alt"></i></a>
                                </span>
                            </div>
                        </li>
                        <li>
                            <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png"
                                    alt="Attachment"></span>

                            <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                                <span class="mailbox-attachment-size clearfix mt-1">
                                    <span>2.67 MB</span>
                                    <a href="#" class="btn btn-default btn-sm float-right"><i
                                            class="fas fa-cloud-download-alt"></i></a>
                                </span>
                            </div>
                        </li>

                    </ul>
                    <h4>Kandidat Terpilih</h4>
                    <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                    <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name">Nama Pemenang</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                            <span>Perolehab Suara</span>
                        </span>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach ?>

<?= $this->endSection() ?>