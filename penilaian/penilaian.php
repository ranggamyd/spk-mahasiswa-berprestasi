<?php
include "koneksi.php";
$slq = "select `db_spk`.`tbl_alternatif`.`id_alternatif` AS `id_alternatif`,`db_spk`.`tbl_alternatif`.`nama` AS `nama`,`db_spk`.`tbl_nilai`.`c1` AS `c1`,`db_spk`.`tbl_nilai`.`c2` AS `c2`,`db_spk`.`tbl_nilai`.`c3` AS `c3`,`db_spk`.`tbl_nilai`.`c4` AS `c4`,`db_spk`.`tbl_nilai`.`id_nilai` AS `id_nilai` from (`db_spk`.`tbl_alternatif` left join `db_spk`.`tbl_nilai` on((`db_spk`.`tbl_alternatif`.`id_alternatif` = `db_spk`.`tbl_nilai`.`id_alternatif`)))";
$hasil = mysqli_query($koneksi, $slq);
?>
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Penilaian Data Alternatif
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
              <strong>Pesan : </strong> Nilai berhasil diperbarui.
            </div>
          <?php
          }
          ?>
          <h4 class="card-title">Tabel Penilaian Alternatif :</h4>
          <table class="table table-bordered table-hover">
            <thead class="text-center bg-light">
              <tr>
                <th width="5%">No.</th>
                <th width="18%">Nama</th>
                <th width="13%">C1 (Akademik)</th>
                <th width="13%">C2 (Kedisiplinan)</th>
                <th width="13%">C3 (Kehadiran)</th>
                <th width="13%">C4 (Keaktifan)</th>
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
                  <form action="penilaian/aksi_penilaian.php" method="POST">
                    <td>
                      <input type="hidden" value="<?php echo $row['id_alternatif'] ?>" name="id_alternatif<?php echo $i; ?>">
                      <input type="hidden" value="<?php echo $row['id_nilai'] ?>" name="id_nilai<?php echo $i; ?>">
                      <input required="" class="form-control" type="text" value="<?php echo $row['c1'] ?>" name="c1<?php echo $i; ?>">
                    </td>
                    <td><input required="" class="form-control" type="text" value="<?php echo $row['c2'] ?>" name="c2<?php echo $i; ?>"></td>
                    <td><input required="" class="form-control" type="text" value="<?php echo $row['c3'] ?>" name="c3<?php echo $i; ?>"></td>
                    <td><input required="" class="form-control" type="text" value="<?php echo $row['c4'] ?>" name="c4<?php echo $i; ?>"></td>
                </tr>
              <?php
                $i++;
              }
              ?>
              <tr>
                <td colspan="6" class="text-end">
                  <input type="hidden" name="jumlah" value="<?php echo $i ?>">

                  <button type="submit" class="btn btn-primary text-end">
                    <i class="mdi mdi-content-save me-2"></i>
                    Simpan
                  </button>
                </td>
              </tr>
              </form>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Keterangan :</h4>
          <ol class="text-sm">
            <small>
              <li class="mb-2">Rata-rata Nilai Akademik<br>
                <b>Sangat baik</b> : 80.50 - 99,90<br>
                <b>Baik</b> : 70,50 - 80,49<br>
                <b>Cukup</b> : 60,50 - 70,49<br>
                <b>Kurang</b> : rata-rata kurang dari 60,50
              </li>
              <li class="mb-2">Kedisiplinan<br>
                <b>Sangat baik</b> : 4;
                <b>Baik</b> : 3;
                <b>Cukup</b> : 2;
                <b>Kurang</b> : 1
              </li>
              <li class="mb-2">Kehadiran<br>
                <b>Sangat baik</b> : Tidak ada Alfa/Izin dengan nilai 4<br>
                <b>Baik</b> : Sakit/Izin 1 kali dengan nilai 3<br>
                <b>Cukup</b> : Sakit/Izin 2-3 kali dengan nilai 2<br>
                <b>Kurang</b> : Alfa 1 kali/lebih dengan nilai 1
              </li>
              <li class="mb-2">Keaktifan<br>
                <b>Sangat baik</b> : Mengikuti 3/lebih organisasi<br>
                <b>Baik</b> : Mengikuti 2 organisasi<br>
                <b>Cukup</b> : Mengikuti 1 organisasi
              </li>
              <b>Kurang</b> : Tidak mengikuti organisasi sama sekali
            </small>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->