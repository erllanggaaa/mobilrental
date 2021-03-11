<?php

include "../koneksi.php";
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../assets/gambar/mobil.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'RENTAL MOBIL SIJONES',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Kenangan Indah No. 29',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Data Pelanggan',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(2.5, 0.8, '', 0, 0, 'C');
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'No KTP', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Lengkap', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'No Telepon', 1, 1, 'C');

$no=1;
$id_pelanggan=$_GET['id_pelanggan'];
$query=mysql_query("SELECT * FROM tb_pelanggan where id_pelanggan='$id_pelanggan' order by id_pelanggan asc");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(2.5, 0.8, '' , 0, 0, 'C');
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['no_ktp'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['nama_lengkap'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['no_telepon'],1, 1, 'C');
	
	$no++;
}
/* $q=mysql_query("select sum(gaji_pokok) as total from jabatan where id_jabatan");
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
while($total=mysql_fetch_array($q)){
	$pdf->Cell(6, 0.8, "Total Pengeluaran", 1, 0,'C');		
	$pdf->Cell(5, 0.8, "Rp. ".number_format($total['total'])." ,-", 1, 0,'C');
	$pdf->Cell(5, 0.8, "Rp. ".number_format($total['total'])." ,-", 1, 0,'C');	
}
$qu=mysql_query("select sum(gaji_pokok) as total_laba from jabatan where nama_jabatan");
*/

$pdf->Output("laporan_buku.pdf","I");

?>

