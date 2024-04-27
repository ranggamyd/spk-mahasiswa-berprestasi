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
      </span> Ranking
    </h3>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <?php
          include "koneksi.php";
          $sql = "select * from tbl_nilai where skor IS NULL";
          $hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
          if (!$hasil || mysqli_num_rows($hasil) > 0) {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Pesan : </strong> Rangking Perlu diperbarui.
            </div>
            <a href="rangking/aksi_rangking.php" class="btn btn-primary mb-4">
              <i class="mdi mdi-play me-2"></i>Mulai
            </a>
          <?php
          } else {
          ?>
            <a href="rangking/aksi_rangking.php" class="btn btn-primary mb-4">
              <i class="mdi mdi-sync me-2"></i>Perbarui
            </a>
          <?php
          }
          $sql = "select `db_spk`.`tbl_alternatif`.`id_alternatif` AS `id_alternatif`,`db_spk`.`tbl_alternatif`.`nama` AS `nama`,`db_spk`.`tbl_nilai`.`id_nilai` AS `id_nilai`,`db_spk`.`tbl_nilai`.`skor` AS `skor` from (`db_spk`.`tbl_alternatif` left join `db_spk`.`tbl_nilai` on((`db_spk`.`tbl_alternatif`.`id_alternatif` = `db_spk`.`tbl_nilai`.`id_alternatif`))) order by skor desc";
          $hasil = mysqli_query($koneksi, $sql);
          ?>
          <table class="table table-bordered table-hover">
            <thead class="text-center bg-light">
              <tr>
                <th width="5%">No.</th>
                <th width="45%">Nama</th>
                <th width="50%">Skor</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $i = 0;
              while ($row = mysqli_fetch_array($hasil)) {
              ?>
                <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <form action="rangking/aksi_rangking.php" method="POST">
                    <td class="text-center">
                      <?php echo $row['skor'] ?>
                    </td>
                </tr>
              <?php
                $i++;
              }
              ?>

              </form>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->