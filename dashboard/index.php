<?php
error_reporting(null);
session_start(); 
$root = '../'; //ada disidebar
$out = '../'; //ada disidebar
include "../koneksi.php";
include "../pengguna.php";
include "../set.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>RENTAL MOBIL SIJONES</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/dist/css/template.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php 
			include '../sidebar.php' ;
		?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
					<ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-arrow-circle-o-right"></i> Dashboard
                            </li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
				<?php $tampil=mysql_query("SELECT tb_mobil.id_mobil, tb_mobil.foto_mobil, tb_jenis.nama_jenis, tb_mobil.type_mobil, tb_mobil.merk, tb_mobil.no_polisi, tb_mobil.warna, tb_mobil.harga, tb_mobil.status from mobilrental.tb_jenis inner join mobilrental.tb_mobil on (tb_jenis.id_jenis = tb_mobil.id_jenis)");
                        $total=mysql_num_rows($tampil);
                ?>
					<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-car fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$total"; ?></div>
                                    <div>Jumlah Mobil</div>
                                </div>
                            </div>
                        </div>
                        <a href="../mobil/index.php">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
				<?php $tampil=mysql_query("select * from tb_pelanggan order by id_pelanggan");
                        $total=mysql_num_rows($tampil);
                ?>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$total"; ?></div>
                                    <div>Total Pelanggan</div>
                                </div>
                            </div>
                        </div>
                        <a href="../pelanggan/index.php">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
				<?php $tampil=mysql_query("select * from tb_user order by id_user");
                        $total=mysql_num_rows($tampil);
                ?>
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$total"; ?></div>
                                    <div>Jumlah User</div>
                                </div>
                            </div>
                        </div>
                        <a href="../user/index.php">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
				<?php $tampil=mysql_query("SELECT tb_transaksi.id_transaksi, tb_mobil.type_mobil as id_mobil, tb_mobil.harga, tb_pelanggan.no_ktp as id_pelanggan, tb_pelanggan.nama_lengkap, tb_transaksi.tgl_sewa, tb_transaksi.tgl_selesaisewa, tb_transaksi.jumlah_harga, tb_transaksi.denda, tb_transaksi.status_pembayaran, tb_transaksi.status_pengembalian 
				FROM mobilrental.tb_transaksi 
				INNER JOIN mobilrental.tb_mobil on (tb_mobil.id_mobil=tb_transaksi.id_mobil)
				INNER JOIN mobilrental.tb_pelanggan on (tb_pelanggan.id_pelanggan=tb_transaksi.id_pelanggan)");
                $total=mysql_num_rows($tampil);
                ?>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calculator fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo "$total"; ?></div>
                                    <div>Jumlah Transaksi Pelanggan</div>
                                </div>
                            </div>
                        </div>
                        <a href="../user/index.php">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
			<?php
				include '../notif_mobil.php';
			?>
            <div class="row">
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../assets/dist/js/template.js"></script>
	
	<!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/vendor/metisMenu/metisMenu.min.js"></script>

	<script type="text/javascript">
    $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            $("#wrapper.toggled").find("#sidebar-wrapper").find(".collapse").collapse("hide");
        });
    });
    </script>
</body>

</html>
