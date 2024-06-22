<?= $this->extend('home/layout') ?>

<?= $this->section('home') ?>
<?php
$sekarang = date('Y-m-d H:i:s');
if ($sekarang < $pemilihan['waktu_dimulai']) {
  ?>
  <div class="row">
    <div class="col-md-6">
      <div class="callout callout-info">
        <h5>Pemilihan <?= $pemilihan['nama_pemilihan'] ?> Akan Dimulai!</h5>
        <p>Pemilihan dimulai pada tanggal <strong><?= $pemilihan['waktu_dimulai'] ?></strong> s/d
          <strong><?= $pemilihan['waktu_dimulai'] ?></strong>
        </p>
      </div>
    </div>
  </div>
<?php } elseif ($sekarang >= $pemilihan['waktu_dimulai'] && $sekarang < $pemilihan['waktu_selesai']) { ?>
  <div class="row">
    <div class="col-md-6">
      <div class="callout callout-info">
        <h5>Pemilihan <?= $pemilihan['nama_pemilihan'] ?> Sedang Berlangsung!</h5>
        <p>Silahkan vote kandidat yang anda pilih.</p>
      </div>
    </div>
  </div>
<?php } ?>
<div class="card card-solid">
  <div class="card-body pb-0">
    <div class="row d-flex align-items-stretch">
      <?php foreach ($kandidatAkanDatang as $row): ?>
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
              <?= $row->nama_kandidat ?> &
              <?= $row->nama_wakil ?>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b></b></h2>
                  <p class="text-muted text-sm"><b>Visi: </b> <?= $row->visi ?></p>
                  <p class="text-muted text-sm"><b>Misi: </b> <?= $row->misi ?></p>
                </div>
                <div class="col-5 text-center">
                  <img src="<?= base_url('image/kandidat/') . $row->foto ?>" alt="" class="img-circle img-fluid">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <button data-toggle="modal" data-target="#show-<?= $row->id_kandidat ?>" class="btn btn-sm btn-primary">
                  <i class="fas fa-eye"></i>
                </button>
                <button
                  class="btn btn-sm btn-danger <?= (session()->has('logged_in') && session()->get('logged_in') === true) ? '' : 'disabled' ?><?= (session()->get('level') == 1) ? 'disabled' : null ?>"
                  data-toggle="modal" data-target="#vote-<?= $row->id_kandidat ?>" <?= (session()->has('logged_in') && session()->get('logged_in') === true) ? '' : 'disabled' ?><?= (session()->get('level') == 1) ? 'disabled' : null ?>>
                  <i class="fas fa-plus-circle"></i> Vote
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  <!-- /.card-body -->
</div>

<?php foreach ($kandidatAkanDatang as $row): ?>
  <!-- Modal Vote -->
  <div class="modal fade" id="vote-<?= $row->id_kandidat ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Vote</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          $sekarang = date('Y-m-d H:i:s');
          if ($sekarang < $pemilihan['waktu_dimulai']) {
            ?>
            <h4>Pemilihan Belum Dimulai <strong></strong></h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="/vote/" class="btn btn-danger disabled">Vote</a>
          </div>
        <?php } elseif ($sekarang >= $pemilihan['waktu_dimulai']) { ?>
          <h4>Apakah anda yakin?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="/vote/<?= $row->id_kandidat ?>/<?= $pemilihan['id_pemilihan'] ?>" class="btn btn-danger">Vote</a>
        </div>
      <?php } ?>

    </div>
  </div>
  </div>

  <!-- Modal View -->
  <div class="modal fade" id="show-<?= $row->id_kandidat ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row->nama_kandidat ?> &</h5>
          <h5 class="modal-title" id="exampleModalLongTitle"> <?= $row->nama_wakil ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4>Visi</h4>
          <p><?= $row->visi ?></p>
          <hr>
          <h4>misi</h4>
          <p><?= $row->visi ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>
<?= $this->endSection() ?>