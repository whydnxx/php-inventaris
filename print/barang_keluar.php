<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Report Laporan Supplier</title>
</head>
<body onload="window.print();">
	<div class="container">
		<h1 class="text-center">Report Data Barang Keluar</h1>
		<table class="table table-bordered">
			<thead class="text-center">
				<tr>
					<td>No</td>
					<td>Kode Barang</td>
					<td>Penerima</td>
					<td>Tanggal Keluar</td>
					<td>Jumlah Barang Keluar</td>
					<td>Keperluan</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					require_once '../php_action/core.php';
					$query = mysqli_query($connect, "SELECT * FROM keluar_barang");
					if (mysqli_num_rows($query) > 0) {
						while ($row = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?=$no++?></td> <!-- Kode Supplier -->
									<td><?=$row[1]?></td> <!-- Kode -->
									<td><?=$row[3]?></td> <!-- Penerima -->
									<td><?=$row[2]?></td> <!-- Tanggal -->
									<td><?=$row[4]?></td> <!-- Jumlah -->
									<td><?=$row[6]?></td> <!-- Keperluan -->
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