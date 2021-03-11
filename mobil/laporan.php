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
$pdf->Cell(0,0.7,'Laporan Data Mobil',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Type Mobil', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Merk', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'No Polisi', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Warna', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Jenis Mobil', 1, 1, 'C');

$no=1;
$query=mysql_query("SELECT tb_mobil.id_mobil, tb_mobil.foto_mobil, tb_jenis.nama_jenis, tb_mobil.type_mobil, tb_mobil.merk, tb_mobil.no_polisi, tb_mobil.warna, tb_mobil.harga, tb_mobil.status from mobilrental.tb_jenis inner join mobilrental.tb_mobil on (tb_jenis.id_jenis = tb_mobil.id_jenis) ORDER BY id_mobil asc");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['type_mobil'],1, 0, 'L');
	$pdf->Cell(5, 0.8, $lihat['merk'],1, 0, 'L');
	$pdf->Cell(5, 0.8, $lihat['no_polisi'],1, 0, 'L');
	$pdf->Cell(5, 0.8, $lihat['warna'],1, 0, 'L');
	$pdf->Cell(5, 0.8, $lihat['nama_jenis'],1, 1, 'L');
	
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

