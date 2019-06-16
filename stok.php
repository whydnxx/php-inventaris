<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Stok - Tukang Koding</title>

<?php include_once 'includes/style.php'; ?>

<!--[if lt IE 9]>
<link href="css/rgba-fallback.css" rel="stylesheet">
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head> 

<body>
	<?php include_once 'includes/navbar.php'; ?>
	<?php include_once 'includes/sidebar.php'; ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Stok Barang</li>
			</ol>
		</div><!--/.row-->
		<br>	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data</div>
					<div class="panel-body">
						<?php 
							if (isset($_SESSION['success'])) {
								?>
							<div class="alert bg-success" role="alert">
								<span class="glyphicon glyphicon-check"></span> 
								<?=$_SESSION['success']?>
								<a href="#" class="pull-right" data-dismiss="alert"><span class="glyphicon glyphicon-remove"></span></a>
							</div>
								<?php
							}
							unset($_SESSION['success']);
							if (isset($_SESSION['danger'])) {
								?>
							<div class="alert bg-danger" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign"></span> 
								<?=$_SESSION['danger']?>
								<a href="#" class="pull-right" data-dismiss="alert">
								<span class="glyphicon glyphicon-remove"></span></a>
							</div>
								<?php
							}
							unset($_SESSION['danger']);
						?>
						
						<div class="pull-right">
							
							<?php 
								if ($_SESSION['level'] == 2) {
									?>
<a href="javascript:void;" onclick="javascript:window.open('print/stok.php');" class="btn btn-info"><i class="fa fa-fw fa-print"></i> Print</a>
									<?php
								}
							 ?>
						
						<br><br><br>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead class="text-center">
									<tr>
										<td>Kode Barang</td>
										<td>Nama Barang</td>
										<?php 
											if ($_SESSION['level'] == 1 OR $_SESSION['level'] == 2) {
												?>
												<td>Jumlah Barang Keluar</td>
												<?php
											}
										 ?>
										<td>Jumlah Barang Dipinjam</td>
										<td>Jumlah Tersedia</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$query = mysqli_query($connect, "SELECT *FROM barang");
										$dipinjam = mysqli_query($connect, "SELECT COUNT(*) FROM pinjam_barang WHERE tgl_kembali IS null");
										$rowDipinjam = mysqli_fetch_array($dipinjam);
										$keluar = mysqli_query($connect, "SELECT COUNT(tgl_keluar) FROM keluar_barang");
										$rowKeluar = mysqli_fetch_array($keluar);
										if (mysqli_num_rows($query) > 0) {
											while ($row = mysqli_fetch_array($query)) {
													?>
													<tr>
														<td><?=$row[0]?></td> <!-- Kode -->
														<td><?=$row[1]?></td> <!-- Nama -->
														<?php 
															if ($_SESSION['level'] == 1 OR $_SESSION['level'] == 2) {
																?>
																<td><?=$rowKeluar[0]?></td>
																<?php
															}
														 ?>
														<td><?=$rowDipinjam[0]?></td>
														<td><?=$row[5]?></td> <!-- Total -->
													</tr>
													<?php
											}		
										}
										else {
											?>
											<tr>
												<td class="text-center" colspan="10">
													<h1>-- Tidak ada data --</h1>
												</td>
											</tr>
											<?php
										}
									?>
								</tbody>
							</table>	
						</div>
				</div>
			</div><!-- /.col-->
			<div class="col-sm-12">
				<p class="back-link">&copy; Copyright 2018 <a href="#">Tukang Koding</a></p>
			</div>
		</div><!-- /.row -->
		
	</div><!--/.main-->


	<?php include_once 'includes/script.php'; ?>


</body>

</html>