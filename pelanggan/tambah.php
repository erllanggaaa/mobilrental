<?php
include "../koneksi.php";
error_reporting(null);
session_start();

$no_ktp = $_POST['no_ktp'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];
$no_telepon = $_POST['no_telepon'];
$status_peminjaman = $_POST['status_peminjaman'];


$query = "insert into tb_pelanggan values('','$no_ktp','$nama_lengkap','$alamat_pelanggan','$no_telepon','$status_peminjaman')";
//var_dump($query); exit;
$hasil = mysql_query($query);
if($hasil)
{
header("location:index.php");
}
else{
	echo "Penyimpanan gagal";
}
?>