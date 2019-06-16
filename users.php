<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manage Users - Tukang Koding</title>

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
				<li class="active">Manage Users</li>
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
										<a class="btn btn-primary disabled"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
									<?php
								}
								else {
									?>
										<a data-toggle="modal" data-target="#addModal" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah Data</a>
									<?php
								}
							 ?>
						</div>
						
						<br><br><br>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead class="text-center">
									<tr>
										<td>No</td>
										<td>Nama User</td>
										<td>Username</td>
										<td>Level</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										$query = mysqli_query($connect, "SELECT * FROM user");
										if (mysqli_num_rows($query) > 0) {
											while ($row = mysqli_fetch_array($query)) {
													?>
													<tr>
														<td><?=$no++?></td>
														<td><?=$row[1]?></td> <!-- Kode -->
														<td><?=$row[2]?></td> <!-- Nama -->
														<td>
															<?php
																if ($row[4] == 1) {
																	echo "Administrator";
																}
																if ($row[4] == 2) {
																	echo "Manajemen";
																}
																if ($row[4] == 3) {
																	echo "Peminjam";
																}
															?>
														</td>
<td class="text-center">
	<?php 
		if ($row[4]	 == 1) {
			?>
<div class="btn-group" role="group">
	<button class="btn btn-sm btn-warning"><i class="fa fa-fw fa-key"></i> Administrator</button>
</div>		
			<?php
		}
		else {
			?>
<div class="btn-group" role="group">
	<button data-toggle="modal" data-target="#editModal" data-id="<?=$row[0]?>" data-nama="<?=$row[1]?>" data-username="<?=$row[2]?>" data-level="<?=$row[4]?>"" onclick="formEdit(this);" class="btn btn-sm btn-success"><i class="fa fa-fw fa-edit"></i> Edit</button>
	<button data-toggle="modal" data-target="#deleteModal" data-id="<?=$row[0]?>" data-nama="<?=$row[1]?>" data-username="<?=$row[2]?>" onclick="formDelete(this);" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i> Delete</button>	
</div>
			<?php
		}
	 ?>										
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

	<?php require_once 'modal/_users.modal.php'; ?>

	<?php include_once 'includes/script.php'; ?>

	<script type="text/javascript">
      function formEdit(item){
        var id = $(item).data('id');
        var nama = $(item).data('nama');
        var username = $(item).data('username');
        var level = $(item).data('level');

        // Mengisi ke Form
        $('#editForm .form-group #id').val(id);
        $('#editForm .form-group #nama').val(nama);
        $('#editForm .form-group #username').val(username);
        $('#editForm .form-group #level').val(level);
      }

      function formDelete(item){
        var id = $(item).data('id');
        var nama = $(item).data('nama');
        var username = $(item).data('username');

        // Mengisi ke Form
        $('#deleteForm #id').val(id);
        $(' #nama').val(nama);
        $(' #username').val(username);
      }
    </script>

</body>

</html>


<!-- PHP DARI TAMBAH DATA SUPPLIER -->
<?php 
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$level = $_POST['level'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$cek = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
	if (mysqli_num_rows($cek > 0)) {
		$_SESSION['danger'] = "Maaf, username tersebut sudah ada, mohon coba lagi";
	}
	else {
		$query = mysqli_query($connect, "
		INSERT INTO user(nama, username, password, level)  
		VALUES ('$nama', '$username', MD5('$password'), '$level') ")OR DIE(mysqli_error($connect));
		if ($query) {
			$_SESSION['success'] = "Data berhasil dimasukkan";
			echo "<script>location.replace('users.php');</script>";
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
    $id = $_POST['id'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];

    $query = mysqli_query($connect,"UPDATE user SET
          nama = '$nama',
          username = '$username',
          password = MD5('$password'),
          level = '$level'
          WHERE id_user = '$id'
    ") OR DIE(mysqli_error($connect));

    if($query){
    	$_SESSION['success'] = 'Data berhasil di update';
		echo "<script>location.replace('users.php');</script>";
    }else{
    	$_SESSION['error'] = 'Gagal Edit data!';
    }
  }
?>

<!-- PHP DATI HAPUS DATA SUPPLIER -->
<?php
if (isset($_POST['delete'])) {
	$id = $_POST['id'];

	$query = mysqli_query($connect, "DELETE FROM user WHERE id_user = '$id'")OR DIE(mysqli_error($connect));
	if ($query) {
    	$_SESSION['success'] = 'Data berhasil di hapus';
		echo "<script>location.replace('users.php');</script>";
	}
	else {
    	$_SESSION['error'] = 'Gagal hapus data !';
	}				
	
}
?>