<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Barang Pinjam - Tukang Koding</title>

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
				<li class="active">Barang Pinjam</li>
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
									<a class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Maaf anda tidak memiliki akses untuk menggunakan fungsi ini"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
									<?php
								}
								else {
									?>
									<a data-toggle="modal" data-target="#addModal" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
									<?php
								}
							 ?>
							<?php 
								if ($_SESSION['level'] == 2) {
									?>
<a href="javascript:void;" onclick="javascript:window.open('print/barang_pinjam.php');" class="btn btn-info"><i class="fa fa-fw fa-print"></i> Print</a>
									<?php
								}
							 ?>
						</div>
						
						<br><br><br>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead class="text-center">
									<tr>
										<td>Kode Barang</td>
										<td>Peminjaman</td>
										<td>Tanggal Pinjam</td>
										<td>Jumlah Barang Pinjam</td>
										<td>Tanggal Kembali</td>
										<td>Keterangan</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$query = mysqli_query($connect, "SELECT * FROM pinjam_barang");
										if (mysqli_num_rows($query) > 0) {
											while ($row = mysqli_fetch_array($query)) {
													?>
													<tr>
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
<td class="text-center">
	<div class="btn-group" role="group">
		<?php 
		if ($row[6] == null) {
			?>
			<button data-toggle="modal" data-target="#verifikasiModal" data-id="<?=$row[0]?>" data-kode="<?=$row[2]?>" data-pinjam="<?=$row[1]?>" data-total="<?=$row[3]?>" data-peminjam="<?=$row[5]?>" data-keterangan="<?=$row[7]?>" onclick="verifikasiForm(this);" class="btn btn-sm btn-info"><i class="fa fa-fw fa-check"></i> Kembalikan</button>
			<?php
		}
		else {
			?>
			<button data-toggle="modal" data-target="#deleteModal" data-id="<?=$row[0]?>" data-kode="<?=$row[2]?>" data-nama="<?=$row[5]?>"onclick="formDelete(this);" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Delete</button>
			<?php
		}
		?>	
	</div>										
</td>
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

	<?php require_once 'modal/_barang_pinjam.modal.php'; ?>

	<?php include_once 'includes/script.php'; ?>

	<script type="text/javascript">
      function verifikasiForm(item){
        var id = $(item).data('id');
        var kode = $(item).data('kode');
        var pinjam = $(item).data('pinjam');
        var total = $(item).data('total');
        var peminjam = $(item).data('peminjam');
        var keterangan = $(item).data('keterangan');

        // Mengisi ke Form
        $('#verifikasiForm .form-group #kode').val(kode);
        $('#verifikasiForm .form-group #id').val(id);
        $('#verifikasiForm .form-group #pinjam').val(pinjam);
        $('#verifikasiForm .form-group #total').val(total);
        $('#verifikasiForm .form-group #peminjam').val(peminjam);
        $('#verifikasiForm .form-group #keterangan').html(keterangan);

      }

      function formDelete(item){
        var id = $(item).data('id');
        var kode = $(item).data('kode');
        var nama = $(item).data('nama');

        // Mengisi ke Form
        $('#deleteForm #id').val(id);
        $(' #kode').val(kode);
        $(' #nama').val(nama);
      }
    </script>

</body>

</html>

<?php 
// PHP DARI TAMBAH DATA

if (isset($_POST['submit'])) {
	$kode = $_POST['kode'];
	$total = $_POST['total'];
	$pinjam = $_POST['pinjam'];
	$peminjam = $_POST['peminjam'];
	$keterangan = $_POST['keterangan'];

	$queryCek = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
	$rowCek = mysqli_fetch_array($queryCek);
	if ($total > $rowCek[0]) {
		$_SESSION['danger'] = "Maaf total barang yang anda masukkan melebihi batas dari kapasitas di barang. Silahkan coba lagi";
		echo "<script>location.replace('barang_pinjam.php');</script>";
	}
	else {
		$query = mysqli_query($connect, "INSERT INTO pinjam_barang(kode_barang, tgl_pinjam, peminjaman, jml_pinjam, jml_pinjam_old, keterangan)
		VALUES ('$kode', '$pinjam', '$peminjam', '$total', '$total', '$keterangan') ")OR DIE(mysqli_error($connect));
		if ($query) {
			$queryStok = mysqli_query($connect, "UPDATE barang SET total_barang = $rowCek[0] - $total WHERE kode_barang = '$kode'");
			if ($queryStok) {
				$_SESSION['success'] = "Data berhasil dimasukkan";
				echo "<script>location.replace('barang_pinjam.php');</script>";
			}
			else {
				$_SESSION['danger'] = "Error saat memasukkan data";
			}	
		}
		else {
			$_SESSION['danger'] = "Error saat memasukkan data";
		}
	}
}

?>
<?php 
// PHP DARI verifikasi DATA
if(isset($_POST['verifikasi'])){
	$id = $_POST['id'];
    $kode = $_POST['kode'];
	$total = $_POST['total'];
	$pinjam = $_POST['pinjam'];
	$peminjam = $_POST['peminjam'];
	$keterangan = $_POST['keterangan'];
	$kembali = date("Y-m-d");

	$queryStok = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
	$rowStok = mysqli_fetch_array($queryStok);

	$queryUbahStok = mysqli_query($connect, "UPDATE barang SET total_barang = $rowStok[0] + $total WHERE kode_barang = '$kode'");

	if ($queryUbahStok) {
		$query = mysqli_query($connect,"UPDATE pinjam_barang SET
          tgl_kembali = '$kembali'
          WHERE kode_barang = '$kode'
	    ") OR DIE(mysqli_error($connect));

	    if($query){
	    	$_SESSION['success'] = 'Barang berhasil di kembalikan';
			echo "<script>location.replace('barang_pinjam.php');</script>";
	    }else{
	    	$_SESSION['error'] = 'Gagal Edit data!';	
		}
	}
  }
?>

<?php
// PHP DATI HAPUS DATA SUPPLIER
if (isset($_POST['delete'])) {
	$id = $_POST['id'];

	$query = mysqli_query($connect, "DELETE FROM pinjam_barang WHERE id_brg_pinjam = $id")OR DIE(mysqli_error($connect));

	if ($query) {
    	$_SESSION['success'] = 'Data berhasil di hapus';
		echo "<script>location.replace('barang_pinjam.php');</script>";
	}
	else {
    	$_SESSION['error'] = 'Gagal hapus data !';
    }
}
?>