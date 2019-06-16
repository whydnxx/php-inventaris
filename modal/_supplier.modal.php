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
	        <form role="form" action="supplier.php" method="POST">
				<div class="row">
					<div class="col-sm-3">
						<?php 
							$cek_kode = mysqli_query($connect, "SELECT COUNT(kode_supplier) FROM supplier");
							if (mysqli_num_rows($cek_kode)) {
								$row = mysqli_fetch_array($cek_kode);
								$newKode = $row[0] + 1;					
							}
							
						?>
						<label>Kode</label>				
						<div class="input-group">
						  <input type="text" name="kode" class="form-control" aria-describedby="basic-addon2" maxlength="2" required autocomplete="off" autofocus>
						  <span class="input-group-addon" id="basic-addon2"><?php echo $newKode; ?></span>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="form-group">
							<label>Nama Supplier</label>
							<input type="text" name="nama" class="form-control" required autocomplete="off" autofocus>
						</div>
					</div>
				</div>
				<p class="text-muted">Maksimal kode hanya 2 huruf.</p>
				<div class="form-group">
					<label>Kota Supplier</label>
					<input type="text" name="kota" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Telp Supplier</label>
					<input type="number" name="telp" class="form-control" required autocomplete="off" autofocus maxlength="13">
				</div>
				<div class="form-group">
					<label>Alamat Supplier</label>
					<textarea name="alamat" class="form-control" required autocomplete="off"></textarea>
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
	        <form role="form" action="supplier.php" id="editForm" method="POST">
				<div class="row">
					<div class="col-sm-2">					
						<div class="form-group">
							<label>Kode</label>
							<input name="kode" id="kode" readonly class="form-control" required autocomplete="off" autofocus>
						</div>
					</div>
					<div class="col-sm-10">
						<div class="form-group">
							<label>Nama Supplier</label>
							<input type="text" name="nama" id="nama" class="form-control" required autocomplete="off" autofocus>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Kota Supplier</label>
					<input type="text" name="kota" id="kota" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Telp Supplier</label>
					<input type="number" name="telp" maxlength="13" id="telp" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Alamat Supplier</label>
					<textarea name="alamat" id="alamat" class="form-control" required autocomplete="off"></textarea>
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
	      			Kode Supplier : <input type="text" class="form-control" id="kode" readonly>
	      		</div>
	      		<div class="col-sm-6">
	      			Nama Supplier :<input type="text" class="form-control" id="nama" readonly>
	      		</div>
	      	</div>
	        <h2>Apakah anda yakin untuk menghapus data tersebut ?</h2>
			<form action="supplier.php" method="POST" id="deleteForm">
			<input type="hidden" id="kode" name="kode">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" name="delete" class="btn btn-primary">Yakin !</button>
	      </div>
		</form>
	    </div>
	  </div>
	</div>