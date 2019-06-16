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
	        <form role="form" action="barang.php" method="POST">
				<div class="row">
					<div class="col-sm-3">
						<?php 
							$cek_kode = mysqli_query($connect, "SELECT COUNT(kode_barang) FROM barang");
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
							<label>Nama Barang</label>
							<input type="text" name="nama" class="form-control" maxlength="50" required autocomplete="off" autofocus>
						</div>
					</div>
				</div>
				<p class="text-muted">Maksimal kode hanya 2 huruf.</p>
				<div class="form-group">
					<label>Kategori</label>
					<input type="text" name="kategori" class="form-control" maxlength="25" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Jenis Barang</label>
					<input type="text" name="jenis_barang" class="form-control" maxlength="20" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Sumber Dana</label>
					<input type="text" name="sumber_dana" class="form-control" maxlength="25" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Kondisi</label>
					<select class="form-control" name="kondisi" required="">
						<option value="">- Kondisi -</option>
						<option value="1">Baik</option>
						<option value="0">Tidak Baik</option>
					</select>
				</div>
				<div class="form-group">
					<label>Total Barang</label>
					<input type="number" name="total" id="total" class="form-control" min="0" maxlength="25" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Lokasi Barang</label>
					<input type="text" name="lokasi" class="form-control" maxlength="40" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Spesifikasi</label>
					<textarea name="spesifikasi" class="form-control" maxlength="35" required autocomplete="off"></textarea>
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
	        <form role="form" action="barang.php" id="editForm" method="POST">
				<div class="row">
					<div class="col-sm-3">
						<label>Kode</label>				
						<div class="form-group">
						  <input name="kode" id="kode" readonly class="form-control" required autocomplete="off" autofocus>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" name="nama" id="nama" class="form-control" maxlength="50" required autocomplete="off" autofocus>
						</div>
					</div>
				</div>
				<p class="text-muted">Maksimal kode hanya 2 huruf.</p>
				<div class="form-group">
					<label>Kategori</label>
					<input type="text" name="kategori" id="kategori" class="form-control" maxlength="25" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Jenis Barang</label>
					<input type="text" name="jenis_barang" id="jenis" class="form-control" maxlength="20" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Sumber Dana</label>
					<input type="text" name="sumber_dana" id="sumber" class="form-control" maxlength="25" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Kondisi</label>
					<select class="form-control" name="kondisi" id="kondisi" required>
						<option value="1">Baik</option>
						<option value="0">Tidak Baik</option>
					</select>
				</div>
				<div class="form-group">
					<label>Total Barang</label>
					<input type="number" name="total" id="total" class="form-control" min="0" maxlength="25" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Lokasi Barang</label>
					<input type="text" name="lokasi" id="lokasi" class="form-control" maxlength="40" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Spesifikasi</label>
					<textarea name="spesifikasi" id="spesifikasi" class="form-control" maxlength="35" required autocomplete="off"></textarea>
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
	      			Kode Barang : <input type="text" class="form-control" id="kode" readonly>
	      		</div>
	      		<div class="col-sm-6">
	      			Nama Barang :<input type="text" class="form-control" id="nama" readonly>
	      		</div>
	      	</div>
	        <h2>Apakah anda yakin untuk menghapus data tersebut ?</h2>
	        <p>Penghapusan barang meliputi data : Stok, Barang Pinjaman, Barang Masuk, Barang Keluar Yang memiliki kode sama.</p>
			<form action="barang.php" method="POST" id="deleteForm">
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