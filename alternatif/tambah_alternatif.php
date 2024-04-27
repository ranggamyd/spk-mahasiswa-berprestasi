<?php
include "koneksi.php";
$slq = "select * from tbl_alternatif";
$hasil = mysqli_query($koneksi, $slq);
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Tambah Alternatif
    </h3>
  </div>
  <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form action="alternatif/aksi_tambah_alternatif.php" method="POST">
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">NIM</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="nis">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Jurusan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="kelas">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 d-flex justify-content-between">
                <a href="index.php?halaman=data" class="btn btn-success">
                  <i class="mdi mdi-arrow-left me-2"></i>
                  Kembali
                </a>
                <button type="submit" class="btn btn-primary text-end">
                  <i class="mdi mdi-content-save me-2"></i>
                  Simpan
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->