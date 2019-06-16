<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Report Laporan Log Login</title>
</head>
<body onload="window.print();">
	<div class="container">
		<h1 class="text-center">Report Data Log Login</h1>
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
					require_once '../php_action/core.php';
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
</body>
</html>