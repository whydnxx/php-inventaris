<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Log Login - Tukang Koding</title>

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
				<li class="active">Log Login</li>
			</ol>
		</div><!--/.row-->
		<br>	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data</div>
					<div class="panel-body">

						<div class="pull-right">
							<a href="javascript:void;" onclick="javascript:window.open('print/log-login.php');" class="btn btn-info"><i class="fa fa-fw fa-print"></i> Print</a>
						</div>
						
						<br><br><br>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead class="text-center">
									<tr>
										<td>NO</td>
										<td>Nama Pengguna</td>
										<td>Username</td>
										<td>IP</td>
										<td>Waktu Login</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										$query = mysqli_query($connect, "SELECT user.nama, user.username, userlog.userIp, userlog.loginTime FROM user, userlog WHERE user.id_user = userlog.id_user");
										if (mysqli_num_rows($query) > 0) {
											while ($row = mysqli_fetch_array($query)) {
													?>
													<tr>
														<td><?=$no++?></td> <!-- Kode Supplier -->
														<td><?=$row[0]?></td> <!-- Nama Supllier -->
														<td><?=$row[1]?></td> <!-- Telp Supllier -->
														<td><?=$row[2]?></td> <!-- Kota Supllier -->
														<td><?=$row[3]?></td> <!-- Alamat Supllier -->
													</tr>
													<?php
											}		
										}
										else {
											?>
											<tr>
												<td class="text-center" colspan="6">
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