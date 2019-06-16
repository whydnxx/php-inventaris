<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Report Laporan Supplier</title>
</head>
<body onload="window.print();">
	<div class="container">
		<h1 class="text-center">Report Data Barang Pinjam</h1>
		<table class="table table-bordered">
			<thead class="text-center">
				<tr>
					<td>No</td>
					<td>Kode Barang</td>
					<td>Peminjaman</td>
					<td>Tanggal Pinjam</td>
					<td>Jumlah Barang Pinjam</td>
					<td>Tanggal Kembali</td>
					<td>Keterangan</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					require_once '../php_action/core.php';
					$query = mysqli_query($connect, "SELECT * FROM pinjam_barang");
					if (mysqli_num_rows($query) > 0) {
						while ($row = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?=$no++?></td> <!-- Kode Supplier -->
									<td><?=$row[2]?></td> <!-- Kode -->
									<td><?=$row[5]?></td> <!-- Peminjam -->
									<td><?=$row[1]?></td> <!-- Pinjam -->
									<td><?=$row[3]?></td> <!-- Jumlah -->
									<td><?php
										if ($row[6] == "") {
											echo '<span class="label label-warning">Belum Dikembalikan</span>';
										}
										else {
											echo $row[6];
										}
									?></td> <!-- Kembali -->
									<td><?=$row[7]?></td>
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