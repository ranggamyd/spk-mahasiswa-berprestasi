<?php
include "koneksi.php";
$sql = "select * from tbl_bobot";
$hasil = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($hasil);
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Perbarui Bobot
    </h3>
  </div>
  <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <?php
          if (isset($_GET['pesan'])) {
          ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Pesan : </strong> Bobot berhasil diperbarui.
            </div>
          <?php
          }
          ?>
          <form action="bobot/aksi_ubah_bobot.php" method="POST">
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-3 col-form-label">W1 (Akademik)</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="w1" value="<?php echo $row['w1'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">W2 (Kedisiplinan)</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="w2" value="<?php echo $row['w2'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">W3 (Kehadiran)</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="w3" value="<?php echo $row['w3'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">W4 (Keaktifan)</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="w4" value="<?php echo $row['w4'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12 d-flex justify-content-end">
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