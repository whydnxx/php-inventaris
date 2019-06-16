<?php require_once 'php_action/do_login.php'; 
if (isset($_SESSION['id_user'])) {
	echo '<script>alert("Maaf, anda tidak dapat mengakses laman ini. Karena sudah login coba untuk logout untuk mengaksesnya");window.location.replace("dashboard.php");</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Tukang Koding</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-md-4 col-sm-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
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
					<form role="form" action="login.php" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" id="username" placeholder="Username" name="username" type="text" autofocus autocomplete="off" required>
							</div>
							<div class="form-group">
								<input class="form-control" id="password" placeholder="Password" name="password" type="password" required>
							</div>
							<input type="submit" class="btn btn-primary btn-block" name="submit" value="Login">
					</form>
				</div>
				<div class="panel-footer">
					<h4 class="text-center">- Quick Login -</h4>
					<button class="btn btn-success btn-block" id="login-admin">Administrator</button>
					<button class="btn btn-warning btn-block" id="login-manajemen">Manajemen</button>
					<button class="btn btn-danger btn-block" id="login-peminjam">Peminjam</button>
					<br><p class="text-muted text-center">&copy; Copyright 2019 - Tukang Koding</p>
					<p class="text-muted text-center">Made with ♥ by Wahyudin</p>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<a href="#" onclick="javascript:window.open('inventaris-doc/index.html');">
	  <div class="help-button-wrapper" data-toggle="tooltip" data-placement="left" title="User Guide">
	    <button class="help-button">
	      <span>?</span>
	    </button>
	  </div>
	</a>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		      $("#login-admin").click(function(){
		          document.getElementById("username").value ="admin";
		          document.getElementById("password").value ="admin";
		      });
		      $("#login-manajemen").click(function(){
		          document.getElementById("username").value ="manajemen";
		          document.getElementById("password").value ="manajemen";
		      });
		      $("#login-peminjam").click(function(){
		          document.getElementById("username").value ="peminjam";
		          document.getElementById("password").value ="peminjam";
		      });

				$('[data-toggle="tooltip"]').tooltip(); 

	    });
	</script>

</body>
</html>
