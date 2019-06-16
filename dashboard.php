<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard - Tukang Koding</title>
	<?php include_once 'includes/style.php'; ?>
	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include_once 'includes/navbar.home.php'; ?>		
	<div class=" col-sm-offset-1 col-lg-10 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="text-center">
				<hr>
				<h1>Selamat Datang <?=$_SESSION['nama']?></h1>
				<hr>
				<br>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Calendar
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>
			</div><!--/.col-->
			
			<div class="col-md-8">
				<?php 
				if ($_SESSION['level'] == 1) {
				 	?>
						<div class="row">
					<div class="col-md-4">
						<a href="supplier.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Supplier</h4>
									<div class="page">
										<img height="70px" src="images/3.png" alt="">
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="barang.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Barang</h4>
									<div class="page">
										<img height="90px" src="images/1.png" alt="">
									</div>								
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="users.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Manage Users</h4>
									<div class="page">
										<i class="fa fa-fw fa-users" style="font-size: 90px; color: #ffa146"></i>
									</div>	
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<a href="barang_masuk.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Barang Masuk</h4>
									<div class="page">
										<img height="90px" src="images/7.png" alt="">
									</div>	
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="barang_keluar.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Barang Keluar</h4>
									<div class="page">
										<img height="90px" src="images/9.png" alt="">
									</div>	
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="barang_pinjam.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Barang Pinjam</h4>
									<div class="page">
										<img height="70px" src="images/4.png" alt="">
									</div>	
								</div>
							</div>
						</a>
					</div>
				</div>
				 	<?php
				 }
				 elseif ($_SESSION['level'] == 3) {
				  	?>
					<div class="col-md-12">
						<a href="barang_pinjam.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Barang Pinjam</h4>
									<div class="page">
										<img height="70px" src="images/4.png" alt="">
									</div>	
								</div>
							</div>
						</a>
					</div>	
					<div class="col-md-12">
						<a href="stok.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Stok Barang</h4>
									<div class="page">
										<img height="70px" src="images/2.png" alt="">
									</div>	
								</div>
							</div>
						</a>
					</div>
				  	<?php
				  } 
				 else {
				 	?>
						<div class="row">
					<div class="col-md-6">
						<a href="supplier.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Supplier</h4>
									<div class="page">
										<img height="70px" src="images/3.png" alt="">
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="barang.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Barang</h4>
									<div class="page">
										<img height="90px" src="images/1.png" alt="">
									</div>								
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<a href="barang_masuk.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Barang Masuk</h4>
									<div class="page">
										<img height="90px" src="images/7.png" alt="">
									</div>	
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="barang_keluar.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Barang Keluar</h4>
									<div class="page">
										<img height="90px" src="images/9.png" alt="">
									</div>	
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="barang_pinjam.php" class="page-link">
							<div class="panel panel-default">
								<div class="panel-body page-panel">
									<h4>Barang Pinjam</h4>
									<div class="page">
										<img height="70px" src="images/4.png" alt="">
									</div>	
								</div>
							</div>
						</a>
					</div>
				</div>
				 	<?php
				 }
				 ?>
				

			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">&copy; Copyright 2018 <a href="#">Tukang Koding</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<?php include_once 'includes/script.php'; ?>
		
</body>
</html>