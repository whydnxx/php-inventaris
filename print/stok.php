<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Report Laporan Supplier</title>
</head>
<body onload="window.print();">
	<div class="container">
		<h1 class="text-center">Report Data Stok</h1>
		<table class="table table-bordered table-hover">
			<thead class="text-center">
				<tr>
					<td>Kode Barang</td>
					<td>Nama Barang</td>
					<td>Stok</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = mysqli_query($connect, "SELECT *FROM barang");
					if (mysqli_num_rows($query) > 0) {
						while ($row = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?=$row[0]?></td> <!-- Kode -->
									<td><?=$row[1]?></td> <!-- Nama -->
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
</body>
</html>