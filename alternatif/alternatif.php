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
      </span> Data Alternatif
    </h3>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <a href="index.php?halaman=tambah_data" class="btn btn-primary mb-4">
            <i class="mdi mdi-plus-circle-outline me-2"></i>
            Tambah Alternatif
          </a>
          <table class="table table-bordered table-hover">
            <thead class="text-center bg-light">
              <tr>
                <th width="5%">No.</th>
                <th width="30%">Nama</th>
                <th width="15%">NIM</th>
                <th width="35%">Jurusan</th>
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($row = mysqli_fetch_array($hasil)) {
              ?>
                <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td class="text-center"><label class="badge badge-dark"><?php echo $row['nis'] ?></label></td>
                  <td class="text-center"><?php echo $row['kelas'] ?></td>
                  <td class="text-center">
                    <a href="index.php?halaman=edit_data&id_alternatif=<?php echo $row['id_alternatif'] ?>" class="btn btn-success">
                      Edit
                    </a>
                    <a onclick="return confirm('Kamu Yakin?')" href="alternatif/aksi_hapus_alternatif.php?id_alternatif=<?php echo $row['id_alternatif'] ?>" class="btn btn-danger">
                      Hapus
                    </a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->