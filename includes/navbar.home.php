<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="dashboard.php"><span>Gudang</span>Gadang</a>
			<ul class="nav navbar-top-links navbar-right">
          <div class="btn-group">
            <button type="button" class="btn btn-setting btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-wrench"></i> Account <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="account-details.php"><i class="fa fa-fw fa-user"></i> Account Details</a></li>
              <?php 
                if ($_SESSION['level'] == 1) {
                  ?>
                    <li><a href="log-login.php"><i class="fa fa-fw fa-info"></i> Log Login</a></li>
                  <?php
                }
              ?>
              <li role="separator" class="divider"></li>
              <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-fw fa-sign-out"></i>Logout</a></li>
            </ul>
          </div>
        </li>
			</ul>
		</div>
	</div><!-- /.container-fluid -->
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h2>Apakah anda yakin untuk keluar dari laman ?</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a href="logout.php" class="btn btn-primary">Yakin !</a>
      </div>
    </div>
  </div>
</div>

<a href="#" onclick="javascript:window.open('inventaris-doc/index.html');">
  <div class="help-button-wrapper" data-toggle="tooltip" data-placement="left" title="User Guide">
    <button class="help-button">
      <span>?</span>
    </button>
  </div>
</a>