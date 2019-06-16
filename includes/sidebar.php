<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?=$_SESSION['nama']?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<?php 
		if ($_SESSION['level'] == 3) {
			?>
			<ul class="nav menu">
				<li><a href="dashboard.php"><em class="fa fa-home">&nbsp;</em> Dashboard</a></li>
				<li><a href="account-details.php"><em class="fa fa-user">&nbsp;</em> Account Details</a></li>
				<li class="parent"><a data-toggle="collapse" href="#navBarang" class="collapsed" aria-expanded="false">
					<em class="fa fa-navicon">&nbsp;</em> Barang <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="navBarang" aria-expanded="false" style="height: 0px;">
						<li><a href="stok.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Stok Barang
						</a></li>
						<li><a href="barang_pinjam.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Barang Pinjam
						</a></li>
					</ul>
				</li>
				<li><a href="#" data-toggle="modal" data-target="#logoutModal"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
			</ul>
			<?php
		}
		else{
			?>
			<ul class="nav menu">
				<li><a href="dashboard.php"><em class="fa fa-home">&nbsp;</em> Dashboard</a></li>
				<li><a href="supplier.php"><em class="fa fa-calendar">&nbsp;</em> Supplier</a></li>
				<li class="parent"><a data-toggle="collapse" href="#navBarang" class="collapsed" aria-expanded="false">
					<em class="fa fa-navicon">&nbsp;</em> Barang <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right collapsed" aria-expanded="false"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="navBarang" aria-expanded="false" style="height: 0px;">
						<li><a href="barang.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Barang
						</a></li>
						<li><a href="stok.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Stok Barang
						</a></li>
						<li><a href="barang_masuk.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Barang Masuk
						</a></li>
						<li><a href="barang_keluar.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Barang Keluar
						</a></li>
						<li><a href="barang_pinjam.php">
							<span class="fa fa-arrow-right">&nbsp;</span> Barang Pinjam
						</a></li>
					</ul>
				</li>
				<?php 
					if ($_SESSION['level'] == 1) {
					?>
						<li><a href="log-login.php" style="margin-left: 5px;"><em class="fa fa-info" style="padding-right: 8px">&nbsp;</em>Log Login</a></li>
						<li><a href="users.php"><em class="fa fa-users">&nbsp;</em> Manage Users</a></li>
					<?php					
					}
				 ?>
				<li><a href="account-details.php"><em class="fa fa-user">&nbsp;</em> Account Details</a></li>
				<li><a href="#" data-toggle="modal" data-target="#logoutModal"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
			</ul>
			<?php
		} 
		 ?>
	</div><!--/.sidebar-->