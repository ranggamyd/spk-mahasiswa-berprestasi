<?php
$nama =$_POST['nama'];
$kelas =$_POST['kelas'];
$nis =$_POST['nis'];
include "../koneksi.php";
$sql="insert into tbl_alternatif (nama, kelas, nis) 
values ('$nama','$kelas','$nis')";
$hasil=mysqli_query($koneksi,$sql);
//echo "$sql";
if ($hasil) {
 header("location:../index.php?halaman=data&pesan=tambah_sukses");
}else
{
 header("location:../index.php?halaman=data&pesan=tambah_gagal");
}
?>