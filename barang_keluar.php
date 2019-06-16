<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Barang Keluar - Tukang Koding</title>

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
				<li class="active">Barang Keluar</li>
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
<a href="javascript:void;" onclick="javascript:window.open('print/barang_keluar.php');" class="btn btn-info"><i class="fa fa-fw fa-print"></i> Print</a>
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
										<td>Penerima</td>
										<td>Tanggal Keluar</td>
										<td>Jumlah Barang Keluar</td>
										<td>Keperluan</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$query = mysqli_query($connect, "SELECT * FROM keluar_barang");
										if (mysqli_num_rows($query) > 0) {
											while ($row = mysqli_fetch_array($query)) {
													?>
													<tr>
														<td><?=$row[1]?></td> <!-- Kode -->
														<td><?=$row[3]?></td> <!-- Penerima -->
														<td><?=$row[2]?></td> <!-- Tanggal -->
														<td><?=$row[4]?></td> <!-- Jumlah -->
														<td><?=$row[6]?></td> <!-- Keperluan -->
<td class="text-center">
	<div class="btn-group" role="group">
		<button data-toggle="modal" data-target="#editModal" data-id="<?=$row[0]?>" data-kode="<?=$row[1]?>" data-tanggal="<?=$row[2]?>" data-total="<?=$row[4]?>" data-penerima="<?=$row[3]?>" data-keperluan="<?=$row[6]?>" onclick="formEdit(this);" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i> Edit</button>
		<button data-toggle="modal" data-target="#deleteModal" data-id="<?=$row[0]?>" data-kode="<?=$row[1]?>" data-nama="<?=$row[3]?>" onclick="formDelete(this);" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Delete</button>	
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

	<?php require_once 'modal/_barang_keluar.modal.php'; ?>

	<?php include_once 'includes/script.php'; ?>

	<script type="text/javascript">
      function formEdit(item){
        var id = $(item).data('id');
        var kode = $(item).data('kode');
        var tanggal = $(item).data('tanggal');
        var total = $(item).data('total');
        var penerima = $(item).data('penerima');
        var keperluan = $(item).data('keperluan');

        // Mengisi ke Form
        $('#editForm .form-group #kode').val(kode);
        $('#editForm .form-group #id').val(id);
        $('#editForm .form-group #tanggal').val(tanggal);
        $('#editForm .form-group #total').val(total);
        $('#editForm .form-group #penerima').val(penerima);
        $('#editForm .form-group #keperluan').html(keperluan);

      }

      function formDelete(item){
        var id = $(item).data('id');
        var kode = $(item).data('kode');  
        var nama = $(item).data('nama');              

        // Mengisi ke Form
        $('#deleteForm #id').val(id);
        $('#deleteForm #kode').val(kode);
        $(' #kode').val(kode);
        $(' #nama').val(nama);
      }
    </script>

</body>

</html>

<?php 
// PHP DARI TAMBAH DATA SUPPLIER

if (isset($_POST['submit'])) {
	$kode = $_POST['kode'];
	$total = $_POST['total'];
	$tanggal = $_POST['tanggal'];
	$penerima = $_POST['penerima'];
	$keperluan = $_POST['keperluan'];

	$queryCek = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
	$rowCek = mysqli_fetch_array($queryCek);
	if ($total > $rowCek[0]) {
			$_SESSION['danger'] = "Maaf total barang yang anda masukkan melebihi batas dari kapasitas di barang. Silahkan coba lagi";
			echo "<script>location.replace('barang_keluar.php');</script>";
	}
	else {
		$query = mysqli_query($connect, "INSERT INTO keluar_barang(kode_barang, tgl_keluar, penerima, jml_brg_keluar, jml_brg_keluar_old, keperluan)  
		VALUES ('$kode', '$tanggal', '$penerima', '$total', '$total', '$keperluan') ")OR DIE(mysqli_error($connect));
		if ($query) {
			$queryStok = mysqli_query($connect, "UPDATE barang SET total_barang = $rowCek[0] - $total WHERE kode_barang = '$kode'");
			if ($queryStok) {
				$_SESSION['success'] = "Data berhasil dimasukkan";
				echo "<script>location.replace('barang_keluar.php');</script>";
			}
			else {
				$_SESSION['danger'] = "Error saat memasukkan data";
				echo "<script>location.replace('barang_keluar.php');</script>";
			}	
		}
		else {
			$_SESSION['danger'] = "Error saat memasukkan data";
			echo "<script>location.replace('barang_keluar.php');</script>";
		}		
	}
}

?>
<?php 
// PHP DARI EDIT DATA SUPPLIER
if(isset($_POST['update'])){
	$id = $_POST['id'];
    $kode = $_POST['kode'];
	$tanggal = $_POST['tanggal'];
	$total = $_POST['total'];
	$penerima = $_POST['penerima'];
	$keperluan = $_POST['keperluan'];

	$queryStok = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
	$rowStok = mysqli_fetch_array($queryStok);

	if ($total > $rowStok[0]) {
		$_SESSION['danger'] = "Maaf total barang yang anda masukkan melebihi batas dari kapasitas di barang. Silahkan coba lagi";
		echo "<script>location.replace('barang_keluar.php');</script>";
	}
	else {
		$queryCek = mysqli_query($connect, "SELECT jml_brg_keluar_old FROM keluar_barang WHERE kode_barang = '$kode'");
		$rowCek = mysqli_fetch_array($queryCek);

		$queryUbahStok = mysqli_query($connect, "UPDATE barang SET total_barang = $rowStok[0] + $rowCek[0] WHERE kode_barang = '$kode'");

		if ($queryUbahStok) {
			$querySetelah = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
			$rowQuerySetelah = mysqli_fetch_array($querySetelah);
			$queryTambahStok = mysqli_query($connect, "UPDATE barang SET total_barang = $rowQuerySetelah[0] - $total ");
			if ($queryTambahStok) {
				$query = mysqli_query($connect,"UPDATE keluar_barang SET
		          kode_barang = '$kode',
		          tgl_keluar = '$tanggal',
		          jml_brg_keluar = '$total',
		          jml_brg_keluar_old = '$total',
		          penerima = '$penerima',
		          keperluan = '$keperluan'
		          WHERE id_brg_keluar = $id
			    ") OR DIE(mysqli_error($connect));

			    if($query){
			    	$_SESSION['success'] = 'Data berhasil di update';
					echo "<script>location.replace('barang_keluar.php');</script>";
			    }else{
			    	$_SESSION['error'] = 'Gagal Edit data!';
			    }		
			}
		}
	}
	
  }
?>

<?php
// PHP DATI HAPUS DATA SUPPLIER
if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$kode = $_POST['kode'];

	$queryJumlah = mysqli_query($connect, "SELECT jml_brg_keluar FROM keluar_barang WHERE kode_barang = '$kode'");
	$rowJumlah = mysqli_fetch_array($queryJumlah);
	$queryCek = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
	$rowCek = mysqli_fetch_array($queryCek);

	$queryStok = mysqli_query($connect, "UPDATE barang SET total_barang =  $rowCek[0] + $rowJumlah[0] WHERE kode_barang = '$kode'");
	if ($queryStok) {
		$query = mysqli_query($connect, "DELETE FROM keluar_barang WHERE id_brg_keluar = '$id'")OR DIE(mysqli_error($connect));

		if ($query) {
	    	$_SESSION['success'] = 'Data berhasil di hapus';
			echo "<script>location.replace('barang_keluar.php');</script>";
		}
		else {
	    	$_SESSION['error'] = 'Gagal hapus data !';
		}	
	}
}
?>