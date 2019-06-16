<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Barang - Tukang Koding</title>

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
				<li class="active">Barang</li>
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
								if ($_SESSION['level'] == 3) {
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
<a href="javascript:void;" onclick="javascript:window.open('print/barang.php');" class="btn btn-info"><i class="fa fa-fw fa-print"></i> Print</a>
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
										<td>Nama Barang</td>
										<td>Kategori</td>
										<td>Jenis Barang</td>
										<td>Sumber Dana</td>
										<td>Total Barang</td>
										<td>Kondisi</td>
										<td>Lokasi Barang</td>
										<td>Spesifikasi</td>
										<td>Action</td>
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
														<td><?=$row[4]?></td> <!-- Kategori -->
														<td><?=$row[7]?></td> <!-- Jenis Barang -->
														<td><?=$row[8]?></td> <!-- Sumber Dana -->
														<td><?=$row[5]?></td> <!-- Total Barang -->
														<td>
															<?php
																if ($row[6] == 1) {
																	echo '<span class="label label-info">Baik</span>';
																}
																else {
																	echo '<span class="label label-warning">Kurang Baik</span>';
																}
															?>
														</td> <!-- Kondisi -->
														<td><?=$row[3]?></td> <!-- Lokasi -->
														<td><?=$row[2]?></td> <!-- Spesifikasi -->
<td class="text-center">
	<div class="btn-group" role="group">
		<button data-toggle="modal" data-target="#editModal" data-kode="<?=$row[0]?>" data-nama="<?=$row[1]?>" data-kategori="<?=$row[4]?>" data-jenis="<?=$row[7]?>" data-sumber="<?=$row[8]?>" data-kondisi="<?=$row[6]?>" data-total="<?=$row[5]?>" data-lokasi="<?=$row[3]?>" data-spesifikasi="<?=$row[2]?>" onclick="formEdit(this);" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i> Edit</button>
		<button data-toggle="modal" data-target="#deleteModal" data-kode="<?=$row[0]?>" data-nama="<?=$row[1]?>" onclick="formDelete(this);" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Delete</button>	
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

	<?php require_once 'modal/_barang.modal.php'; ?>

	<?php include_once 'includes/script.php'; ?>

	<script type="text/javascript">
      function formEdit(item){
        var kode = $(item).data('kode');
        var nama = $(item).data('nama');
        var kategori = $(item).data('kategori');
        var jenis = $(item).data('jenis');
        var sumber = $(item).data('sumber');
        var kondisi = $(item).data('kondisi');
        var total = $(item).data('total');
        var lokasi = $(item).data('lokasi');
        var spesifikasi = $(item).data('spesifikasi');

        // Mengisi ke Form
        $('#editForm .form-group #kode').val(kode);
        $('#editForm .form-group #nama').val(nama);
        $('#editForm .form-group #kategori').val(kategori);
        $('#editForm .form-group #jenis').val(jenis);
        $('#editForm .form-group #sumber').val(sumber);
        $('#editForm .form-group #kondisi').val(kondisi);
        $('#editForm .form-group #total').val(total);
        $('#editForm .form-group #lokasi').val(lokasi);
        $('#editForm .form-group #spesifikasi').html(spesifikasi);
      }

      function formDelete(item){
        var kode = $(item).data('kode');
        var nama = $(item).data('nama');

        // Mengisi ke Form
        $('#deleteForm #kode').val(kode);
        $(' #kode').val(kode);
        $(' #nama').val(nama);
      }
    </script>

</body>

</html>


<!-- PHP DARI TAMBAH DATA SUPPLIER -->
<?php 
if (isset($_POST['submit'])) {
	$kode = $_POST['kode'];
	$kode_barang = $kode.$newKode;
	$nama = $_POST['nama'];
	$spesifikasi = $_POST['spesifikasi'];
	$lokasi = $_POST['lokasi'];
	$kategori = $_POST['kategori'];
	$kondisi = $_POST['kondisi'];
	$total = $_POST['total'];
	$jenis_barang = $_POST['jenis_barang'];
	$sumber_dana = $_POST['sumber_dana'];

	$query = mysqli_query($connect, "
	INSERT INTO barang(kode_barang, nama_barang, spesifikasi, lokasi_barang, total_barang, kategori, kondisi, jenis_barang, sumber_dana)  
	VALUES ('$kode_barang', '$nama', '$spesifikasi', '$lokasi', $total, '$kategori', '$kondisi', '$jenis_barang', '$sumber_dana') ")OR DIE(mysqli_error($connect));
	if ($query) {
		$_SESSION['success'] = "Data berhasil dimasukkan";
		echo "<script>location.replace('barang.php');</script>";
	}
	else {
		$_SESSION['danger'] = "Error saat memasukkan data";
	}
}

?>
<!-- PHP DARI EDIT DATA SUPPLIER  -->
<?php 
if(isset($_POST['update'])){
    $kode = $_POST['kode'];
	$nama = $_POST['nama'];
	$spesifikasi = $_POST['spesifikasi'];
	$lokasi = $_POST['lokasi'];
	$kategori = $_POST['kategori'];
	$kondisi = $_POST['kondisi'];
	$jenis_barang = $_POST['jenis_barang'];
	$sumber_dana = $_POST['sumber_dana'];
	$total = $_POST['total'];

    $query = mysqli_query($connect,"UPDATE barang SET
          nama_barang = '$nama',
          spesifikasi = '$spesifikasi',
          lokasi_barang = '$lokasi',
          kategori = '$kategori',
          kondisi = '$kondisi',
          jenis_barang = '$jenis_barang',
          total_barang = '$total',
          sumber_dana = '$sumber_dana'
          WHERE kode_barang = '$kode'
    ") OR DIE(mysqli_error($connect));

    if($query){
    	$_SESSION['success'] = 'Data berhasil di update';
		echo "<script>location.replace('barang.php');</script>";

    }else{
    	$_SESSION['error'] = 'Gagal Edit data!';
    }
  }
?>

<!-- PHP DATI HAPUS DATA SUPPLIER -->
<?php
if (isset($_POST['delete'])) {
	$kode = $_POST['kode'];

	$hapusPinjam = mysqli_query($connect, "DELETE FROM pinjam_barang WHERE kode_barang = '$kode'")OR DIE(mysqli_error($connect));
	$hapusMasuk = mysqli_query($connect, "DELETE FROM masuk_barang WHERE kode_barang = '$kode'")OR DIE(mysqli_error($connect));
	$hapusKeluar = mysqli_query($connect, "DELETE FROM keluar_barang WHERE kode_barang = '$kode'")OR DIE(mysqli_error($connect));

		if ($hapusKeluar) {
			$query = mysqli_query($connect, "DELETE FROM barang WHERE kode_barang = '$kode'")OR DIE(mysqli_error($connect));

			if ($query) {
		    	$_SESSION['success'] = 'Data berhasil di hapus';
				echo "<script>location.replace('barang.php');</script>";
			}
			else {
		    	$_SESSION['error'] = 'Gagal hapus data !';
			}				
		}
}
?>