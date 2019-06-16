<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Report Laporan Supplier</title>
</head>
<body onload="window.print();">
	<div class="container">
		<h1 class="text-center">Report Data Barang</h1>
		<table class="table table-bordered">
			<thead class="text-center">
				<tr>
					<td>No</td>
					<td>Kode Barang</td>
					<td>Nama Barang</td>
					<td>Kategori</td>
					<td>Jenis Barang</td>
					<td>Sumber Dana</td>
					<td>Total Barang</td>
					<td>Kondisi</td>
					<td>Lokasi Barang</td>
					<td>Spesifikasi</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					require_once '../php_action/core.php';
					$query = mysqli_query($connect, "SELECT * FROM barang");
					if (mysqli_num_rows($query) > 0) {
						while ($row = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?=$no++?></td> <!-- Kode Supplier -->
									<td><?=$row[0]?></td> <!-- Kode -->
									<td><?=$row[1]?></td> <!-- Nama -->
									<td><?=$row[4]?></td> <!-- Kategori -->
									<td><?=$row[7]?></td> <!-- Jenis Barang -->
									<td><?=$row[8]?></td> <!-- Sumber Dana -->
									<td><?=$row[5]?></td> <!-- Total Barang -->
									<td>
										<?php
											if ($row[6] == 1) {
												echo 'Baik';
											}
											else {
												echo 'Kurang Baik';
											}
										?>
									</td> <!-- Kondisi -->
									<td><?=$row[3]?></td> <!-- Lokasi -->
									<td><?=$row[2]?></td> <!-- Spesifikasi -->
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