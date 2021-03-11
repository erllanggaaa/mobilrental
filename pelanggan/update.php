<?php
include "../koneksi.php";
error_reporting(null);
session_start();

$id_pelanggan = $_POST['id_pelanggan'];
$no_ktp = $_POST['no_ktp'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];
$no_telepon = $_POST['no_telepon'];
$status_peminjaman = $_POST['status_peminjaman'];

		// Query untuk menampilkan data 
		$query = "SELECT tb_pelanggan.id_pelanggan, tb_pelanggan.no_ktp, tb_pelanggan.nama_lengkap, tb_pelanggan.alamat_pelanggan, tb_pelanggan.no_telepon, tb_pelanggan.status_peminjaman where id_pelanggan";
		$sql = mysql_query($query);
		$data = mysql_fetch_array($sql);

		
		// Proses ubah data ke Database
		$query = "update tb_pelanggan set no_ktp='$no_ktp', foto_pelanggan='$fotobaru', nama_lengkap='$nama_lengkap', tanggal_lahir='$tanggal_lahir', alamat_pelanggan='$alamat_pelanggan', no_telepon='$no_telepon', status_peminjaman='$status_peminjaman' where id_pelanggan='$id_pelanggan'";
		$sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: index.php"); // Redirect ke halaman index.php
}else{ // Jika tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
	$query = "update tb_pelanggan set no_ktp='$no_ktp', nama_lengkap='$nama_lengkap', alamat_pelanggan='$alamat_pelanggan', no_telepon='$no_telepon' , status_peminjaman='$status_peminjaman' where id_pelanggan='$id_pelanggan'";
	//var_dump($query); exit;
	$sql = mysql_query($query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: index.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='index.php'>Kembali Ke Form</a>";
	}
}

?>