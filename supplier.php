<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Supplier - Tukang Koding</title>

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
				<li class="active">Supllier</li>
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
<a href="javascript:void;" onclick="javascript:window.open('print/supplier.php');" class="btn btn-info"><i class="fa fa-fw fa-print"></i> Print</a>
									<?php
								}
							 ?>
						</div>
						
						<br><br><br>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead class="text-center">
									<tr>
										<td>Kode Supplier</td>
										<td>Nama Supllier</td>
										<td>Telp Supplier</td>
										<td>Kota Supplier</td>
										<td>Alamat Supplier</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$query = mysqli_query($connect, "SELECT * FROM supplier");
										if (mysqli_num_rows($query) > 0) {
											while ($row = mysqli_fetch_array($query)) {
													?>
													<tr>
														<td><?=$row[0]?></td> <!-- Kode Supplier -->
														<td><?=$row[1]?></td> <!-- Nama Supllier -->
														<td><?=$row[3]?></td> <!-- Telp Supllier -->
														<td><?=$row[4]?></td> <!-- Kota Supllier -->
														<td><?=$row[2]?></td> <!-- Alamat Supllier -->
<td class="text-center">
	<div class="btn-group" role="group">
		<button data-toggle="modal" data-target="#editModal" data-kode="<?=$row[0]?>" data-nama="<?=$row[1]?>" data-telp="<?=$row[3]?>" data-kota="<?=$row[4]?>" data-alamat="<?=$row[2]?>" onclick="formEdit(this);" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i> Edit</button>
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
				</div>
			</div><!-- /.col-->
			<div class="col-sm-12">
				<p class="back-link">&copy; Copyright 2018 <a href="#">Tukang Koding</a></p>
			</div>
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<?php require_once 'modal/_supplier.modal.php'; ?>

	<?php include_once 'includes/script.php'; ?>

	<script type="text/javascript">
      function formEdit(item){
        var kode = $(item).data('kode');
        var nama = $(item).data('nama');
        var telp = $(item).data('telp');
        var kota = $(item).data('kota');
        var alamat = $(item).data('alamat');

        // Mengisi ke Form
        $('#editForm .form-group #kode').val(kode);
        $('#editForm .form-group #nama').val(nama);
        $('#editForm .form-group #telp').val(telp);
        $('#editForm .form-group #kota').val(kota);
        $('#editForm .form-group #alamat').html(alamat);
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
	$kode_supplier = $kode.$newKode;
	$nama = $_POST['nama'];
	$kota = $_POST['kota'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];

	$cek = mysqli_query($connect, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
	if (mysqli_num_rows($cek > 0)) {
		$_SESSION['danger'] = "Maaf, Kode barang tersebut sudah ada, mohon coba lagi";
	}
	else {
		$query = mysqli_query($connect, "
		INSERT INTO supplier(kode_supplier, nama_supplier, alamat_supplier, telp_supplier, kota_supplier)  
		VALUES ('$kode_supplier', '$nama', '$alamat', '$telp', '$kota') ");
		if ($query) {
			$_SESSION['success'] = "Data berhasil dimasukkan";
			echo "<script>location.replace('supplier.php');</script>";
		}
		else {
			$_SESSION['danger'] = "Error saat memasukkan data";
		}	
	}
}

?>
<!-- PHP DARI EDIT DATA SUPPLIER  -->
<?php 
if(isset($_POST['update'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telp = $_POST['telp'];

    $query = mysqli_query($connect,"UPDATE supplier SET
          nama_supplier = '$nama',
          telp_supplier = '$telp',
          alamat_supplier = '$alamat',
          kota_supplier = '$kota'
          WHERE kode_supplier = '$kode'
    ") OR DIE(mysqli_error($connect));

    if($query){
    	$_SESSION['success'] = 'Data berhasil di update';
		echo "<script>location.replace('supplier.php');</script>";
    }else{
    	$_SESSION['error'] = 'Gagal Edit data!';
    }
  }
?>

<!-- PHP DATI HAPUS DATA SUPPLIER -->
<?php
if (isset($_POST['delete'])) {
	$kode = $_POST['kode'];

	$query = mysqli_query($connect, "DELETE FROM supplier WHERE kode_supplier = '$kode'");

	if ($query) {
    	$_SESSION['success'] = 'Data berhasil di hapus';
		echo "<script>location.replace('supplier.php');</script>";
	}
	else {
    	$_SESSION['error'] = 'Gagal hapus data !';
	}
}
?>