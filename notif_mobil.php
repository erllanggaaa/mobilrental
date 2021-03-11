<?php
	$periksa=mysql_query("SELECT tb_mobil.id_mobil, tb_mobil.foto_mobil, tb_jenis.nama_jenis, tb_mobil.type_mobil, tb_mobil.merk, tb_mobil.no_polisi, tb_mobil.warna, tb_mobil.harga, tb_mobil.status from mobilrental.tb_jenis inner join mobilrental.tb_mobil on (tb_jenis.id_jenis = tb_mobil.id_jenis) where id_mobil");
	while($q=mysql_fetch_array($periksa)){	
	if($q['status']==0){	
?>	
	<script>
	$(document).ready(function(){
	$('#pesan_sedia').css("color","red");
	$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
	});
	</script>
<?php
	echo "<div class='alert alert-warning alert-dismissable' style='background-color:#77777752; color:#000000;'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><span class='glyphicon glyphicon-info-sign' style='color:#de4112;'></span> Mobil  <a style='color:red'>". $q['type_mobil']."</a> sedang tidak tersedia. <a href='../mobil/index.php'>silahkan pilih mobil lain!!</a></div>";	
		}
	}
?>