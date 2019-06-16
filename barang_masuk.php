<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Barang Masuk - Tukang Koding</title>

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
				<li class="active">Barang Masuk</li>
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
<a href="javascript:void;" onclick="javascript:window.open('print/barang_masuk.php');" class="btn btn-info"><i class="fa fa-fw fa-print"></i> Print</a>
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
										<td>Kode Supplier</td>
										<td>Tanggal Masuk</td>
										<td>Jumlah Barang Masuk</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$query = mysqli_query($connect, "SELECT * FROM masuk_barang");
										if (mysqli_num_rows($query) > 0) {
											while ($row = mysqli_fetch_array($query)) {
													?>
													<tr>
														<td><?=$row[1]?></td> <!-- Kode -->
														<td><?=$row[5]?></td> <!-- Supplier -->
														<td><?=$row[2]?></td> <!-- Tanggal -->
														<td><?=$row[3]?></td> <!-- Jumlah -->
<td class="text-center">
	<div class="btn-group" role="group">
		<button data-toggle="modal" data-target="#editModal" data-id="<?=$row[0]?>" data-kode="<?=$row[1]?>" data-tanggal="<?=$row[2]?>" data-total="<?=$row[3]?>" data-supplier="<?=$row[5]?>" onclick="formEdit(this);" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i> Edit</button>
		<button data-toggle="modal" data-target="#deleteModal" data-id="<?=$row[0]?>" data-kode="<?=$row[1]?>" onclick="formDelete(this);" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Delete</button>	
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

	<?php require_once 'modal/_barang_masuk.modal.php'; ?>

	<?php include_once 'includes/script.php'; ?>

	<script type="text/javascript">
      function formEdit(item){
        var id = $(item).data('id');
        var kode = $(item).data('kode');
        var tanggal = $(item).data('tanggal');
        var total = $(item).data('total');
        var supplier = $(item).data('supplier');

        // Mengisi ke Form
        $('#editForm .form-group #kode').val(kode);
        $('#editForm .form-group #id').val(id);
        $('#editForm .form-group #tanggal').val(tanggal);
        $('#editForm .form-group #total').val(total);
        $('#editForm .form-group #supplier').val(supplier);
      }

      function formDelete(item){
        var kode = $(item).data('kode');
        var id = $(item).data('id');

        // Mengisi ke Form
        $('#deleteForm #kode').val(kode);
        $(' #kode').val(kode);
        $('#deleteForm #id').val(id);
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
	$supplier = $_POST['supplier'];

	$query = mysqli_query($connect, "
		INSERT INTO masuk_barang(kode_barang, tgl_masuk, jml_brg_masuk, jml_brg_masuk_old, kode_supplier)  
		VALUES ('$kode', '$tanggal', '$total', '$total', '$supplier') ")OR DIE(mysqli_error($connect));
	if ($query) {
		$queryCek = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
		if ($rowCek = mysqli_fetch_array($queryCek)) {
			$queryStok = mysqli_query($connect, "UPDATE barang SET total_barang = $total + $rowCek[0] WHERE kode_barang = '$kode'");
			if ($queryStok) {
				$_SESSION['success'] = "Data berhasil dimasukkan";
				echo "<script>location.replace('barang_masuk.php');</script>";
			}
			else {
				$_SESSION['danger'] = "Error saat memasukkan data";
			}	
		}
	}
	else {
		$_SESSION['danger'] = "Error saat memasukkan data";
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
	$supplier = $_POST['supplier'];

	$cek = mysqli_query($connect, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
		$queryStok = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
		$rowStok = mysqli_fetch_array($queryStok);
		$queryCek = mysqli_query($connect, "SELECT jml_brg_masuk_old FROM masuk_barang WHERE kode_barang = '$kode'");
		$rowCek = mysqli_fetch_array($queryCek);

		$queryUbahStok = mysqli_query($connect, "UPDATE barang SET total_barang = $rowStok[0] - $rowCek[0] WHERE kode_barang = '$kode'");

		if ($queryUbahStok) {
			$querySetelah = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
			$rowQuerySetelah = mysqli_fetch_array($querySetelah);
			$queryTambahStok = mysqli_query($connect, "UPDATE barang SET total_barang = $rowQuerySetelah[0] + $total ");
			if ($queryTambahStok) {
				$query = mysqli_query($connect,"UPDATE masuk_barang SET
		          kode_barang = '$kode',
		          tgl_masuk = '$tanggal',
		          jml_brg_masuk = '$total',
		          jml_brg_masuk_old = '$total',
		          kode_supplier = '$supplier'
		          WHERE id_brg_masuk = $id
			    ") OR DIE(mysqli_error($connect));

			    if($query){
			    	$_SESSION['success'] = 'Data berhasil di update';
					echo "<script>location.replace('barang_masuk.php');</script>";
			    }else{
			    	$_SESSION['error'] = 'Gagal Edit data!';
			    }		
			}
			else {
			$_SESSION['danger'] = "Error saat memasukkan data";
			}
		}
		else {
			$_SESSION['danger'] = "Error saat memasukkan data";
		}	
  }
?>

<?php
// PHP DATI HAPUS DATA SUPPLIER
if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$kode = $_POST['kode'];

	$queryJumlah = mysqli_query($connect, "SELECT jml_brg_masuk FROM masuk_barang WHERE kode_barang = '$kode'");
	$rowJumlah = mysqli_fetch_array($queryJumlah);
	$queryCek = mysqli_query($connect, "SELECT total_barang FROM barang WHERE kode_barang = '$kode'");
	$rowCek = mysqli_fetch_array($queryCek);

	$queryStok = mysqli_query($connect, "UPDATE barang SET total_barang =  $rowCek[0] - $rowJumlah[0] WHERE kode_barang = '$kode'");
	if ($queryStok) {
		$query = mysqli_query($connect, "DELETE FROM masuk_barang WHERE id_brg_masuk = $id")OR DIE(mysqli_error($connect));

		if ($query) {
	    	$_SESSION['success'] = 'Data berhasil di hapus';
			echo "<script>location.replace('barang_masuk.php');</script>";
		}
		else {
	    	$_SESSION['error'] = 'Gagal hapus data !';
		}	
	}
}
?>