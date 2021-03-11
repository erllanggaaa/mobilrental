<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "mobilrental";
$koneksi  = mysql_connect($host, $username, $password);
$pilihdatabase = mysql_select_db($database, $koneksi);
if ($pilihdatabase) echo "Berhasil terhubung";
else echo "Error";

?>