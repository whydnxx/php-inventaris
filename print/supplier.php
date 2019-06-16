<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Report Laporan Supplier</title>
</head>
<body onload="window.print();">
	<div class="container">
		<h1 class="text-center">Report Data Supplier</h1>
		<table class="table table-bordered">
			<thead class="text-center">
				<tr>
					<td>No</td>
					<td>Kode Supplier</td>
					<td>Nama Supllier</td>
					<td>Telp Supplier</td>
					<td>Kota Supplier</td>
					<td>Alamat Supplier</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					require_once '../php_action/core.php';
					$query = mysqli_query($connect, "SELECT * FROM supplier");
					if (mysqli_num_rows($query) > 0) {
						while ($row = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?=$no++?></td> <!-- Kode Supplier -->
									<td><?=$row[0]?></td> <!-- Kode Supplier -->
									<td><?=$row[1]?></td> <!-- Nama Supllier -->
									<td><?=$row[3]?></td> <!-- Telp Supllier -->
									<td><?=$row[4]?></td> <!-- Kota Supllier -->
									<td><?=$row[2]?></td> <!-- Alamat Supllier -->
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