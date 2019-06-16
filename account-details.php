<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Account Detail - Tukang Koding</title>

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
				<li class="active">Account Detail</li>
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
						
		            <form class="form-horizontal" action="account-details.php" method="post">
		                <h3>Change Username</h3>
		                  <div class="form-group">
						    <label for="username" class="col-sm-2 control-label">Username</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required value="<?=$_SESSION['username']?>" />
						    </div>
						  </div>

						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-success" name="changeUsername"> <i class="fa fa-check-circle fa-fw" ></i> Save Changes </button>
						    </div>
						  </div>
		            </form>

		            <form class="form-horizontal" action="account-details.php" method="post" id="changePasswordForm">
		              <fieldset>
						<h3>Change Password</h3>
		                <hr>
						<div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Current Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" name="password" placeholder="Current Password" required="">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">New password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="new_password" name="npassword" placeholder="New Password" required="">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="confirm_password" name="cpassword" placeholder="Confirm Password" required="">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" name="changePassword" class="btn btn-primary"> <i class="fa fa-check-circle fa-fw"></i> Save Changes </button>
					    </div>
					  </div>
					</fieldset>
		            </form>
					<h3>Last Login</h3>
		            <div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead class="text-center">
									<tr>
										<td>NO</td>
										<td>IP</td>
										<td>Waktu Login</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										if ($_SESSION['level'] == 1) {
											$query = mysqli_query($connect, "SELECT user.nama, user.username, userlog.userIp, userlog.loginTime FROM user, userlog WHERE user.id_user = userlog.id_user AND user.id_user = 1");
										}
										if ($_SESSION['level'] == 2) {
											$query = mysqli_query($connect, "SELECT user.nama, user.username, userlog.userIp, userlog.loginTime FROM user, userlog WHERE user.id_user = userlog.id_user AND user.id_user = 2");
										}
										if ($_SESSION['level'] == 3) {
											$query = mysqli_query($connect, "SELECT user.nama, user.username, userlog.userIp, userlog.loginTime FROM user, userlog WHERE user.id_user = userlog.id_user AND user.id_user = 3");
										}
										if (mysqli_num_rows($query) > 0) {
											while ($row = mysqli_fetch_array($query)) {
													?>
													<tr>
														<td><?=$no++?></td> <!-- Kode Supplier -->
														<td><?=$row[2]?></td> <!-- Kota Supllier -->
														<td><?=$row[3]?></td> <!-- Alamat Supllier -->
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

	<?php include_once 'includes/script.php'; ?>
</body>

</html>

<?php 
// PHP DARI EDIT DATA SUPPLIER
if(isset($_POST['changeUsername'])){
	$id_user = $_SESSION['id_user'];
    $username = $_POST['username'];

    $queryCek = mysqli_query($connect, "SELECT username FROM user WHERE id_user = '$id_user'");
	$rowCek = mysqli_fetch_array($queryCek);
    $queryCek2 = mysqli_query($connect, "SELECT username FROM user");
	$rowCek2 = mysqli_fetch_array($queryCek2);

    if ($username == $rowCek[0] ) {
    	$_SESSION['success'] = 'Data berhasil di update';
		echo "<script>location.replace('account-details.php');</script>";
    }
    else {
    	if ($username == $rowCek2[0]) {
    		$_SESSION['danger'] = 'Maaf username yang anda pilih sudah digunakan, mohon coba lagi';
			echo "<script>location.replace('account-details.php');</script>";
    	}
    	else {
    		$query = mysqli_query($connect,"UPDATE user SET
	          username = '$username'
	          WHERE id_user = $id_user
		    ") OR DIE(mysqli_error($connect));
	    	if ($query) {
	    		$_SESSION['username'] = $username;
	    		$_SESSION['success'] = 'Data berhasil diganti';
				echo "<script>location.replace('account-details.php');</script>";
	    	}
	    	else {
	    		$_SESSION['danger'] = 'Error, please contact administrator';
				echo "<script>location.replace('account-details.php');</script>";
	    	}
    	}
    }
	
  }


if(isset($_POST['changePassword'])){
	$id_user = $_SESSION['id_user'];
	$password = MD5($_POST['password']);
    $npassword = MD5($_POST['npassword']);
    $cpassword = MD5($_POST['cpassword']);

    if ($npassword != $cpassword) {
    	$_SESSION['danger'] = 'Maaf, New Password dan Confirm Password tidak sama. Silahkan cek kembali';
		echo "<script>location.replace('account-details.php');</script>";
    }
    else {
    	$queryCek = mysqli_query($connect, "SELECT password FROM user WHERE id_user = '$id_user'");
		$rowCek = mysqli_fetch_array($queryCek);

	    if ($password == $rowCek[0] ) {
			$query = mysqli_query($connect,"UPDATE user SET
	          password = '$npassword'
	          WHERE id_user = $id_user
		    ") OR DIE(mysqli_error($connect));
	    	if ($query) {
	    		$_SESSION['success'] = 'Data berhasil diganti';
				echo "<script>location.replace('account-details.php');</script>";
	    	}
	    	else {
	    		$_SESSION['danger'] = 'Error, please contact administrator';
				echo "<script>location.replace('account-detail.php');</script>";
	    	}
	    }
	    else {
	    	$_SESSION['danger'] = 'Maaf, current password salah. Silahkan cek kembali';
			echo "<script>location.replace('account-details.php');</script>";
	    }
    }
}

?>