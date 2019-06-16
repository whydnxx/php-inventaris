<!-- Add Modal -->

	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form role="form" action="users.php" method="POST">
				<div class="form-group">
					<label>Nama User</label>
					<input type="text" name="nama" id="nama" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Hak Akses</label>
					<select name="level" id="level" class="form-control" required>
						<option value="" readonly selected>- Hak Akses -</option>
						<option value="2">Manajemen</option>
						<option value="3">Peminjam</option>
					</select>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" id="username" class="form-control" required autocomplete="off" autofocus maxlength="45">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" id="password" class="form-control" minlength="6" required autocomplete="off" autofocus maxlength="45">
				</div>
	      </div>
	      <div class="modal-footer">
	        <div class="form-group">
				<button type="submit" name="submit" class="btn btn-lg btn-block btn-primary">Tambah Data</button>
				<button type="reset" class="btn btn-lg btn-block btn-danger">Reset</button>
			</div>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- Edit Modal -->

	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
		  <div class="modal-body">
	        <form role="form" action="users.php" id="editForm" method="POST">
				<div class="form-group">
					<label>Nama User</label>
		        	<input type="hidden" name="id" id="id">
					<input type="text" name="nama" id="nama" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Hak Akses</label>
					<select name="level" id="level" class="form-control" required>
						<option value="" readonly>- Kode Supplier -</option>
						<?php
							$sqlUsers = mysqli_query($connect, "SELECT id_user FROM user WHERE level = 2 OR level = 3");
							while ($fetchUser = mysqli_fetch_array($sqlUsers)) {
								?>
									<option value="<?=$fetchUser[0]?>">
										<?php
											if ($fetchUser[0] == 2) {
												echo "Manajemen";
											}
											if ($fetchUser[0] == 3) {
												echo "Peminjam";
											}
										 ?>
									</option>
								<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" id="username" class="form-control" required autocomplete="off" autofocus maxlength="45">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" id="password" class="form-control" minlength="6"  autocomplete="off" placeholder="*********" autofocus maxlength="45">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="cpassword" id="cpassword" class="form-control" minlength="6" autocomplete="off" placeholder="*********" autofocus maxlength="45">
				</div>
	      </div>
	      <div class="modal-footer">
	        <div class="form-group">
				<button type="submit" name="update" class="btn btn-lg btn-block btn-primary">Edit Data</button>
				<button type="button" data-dismiss="modal" class="btn btn-lg btn-block btn-danger">Batal</button>
			</div>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- Delete Modal  -->

	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-sm-6">
	      			Nama Pengguna : <input type="text" class="form-control" id="nama" readonly>
	      		</div>
	      		<div class="col-sm-6">
	      			Username :<input type="text" class="form-control" id="username" readonly>
	      		</div>
	      	</div>
	        <h2>Apakah anda yakin untuk menghapus data tersebut ?</h2>
			<form action="users.php" method="POST" id="deleteForm">
			<input type="hidden" id="id" name="id">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" name="delete" class="btn btn-primary">Yakin !</button>
	      </div>
		</form>
	    </div>
	  </div>
	</div>