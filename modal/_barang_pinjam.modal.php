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
	        <form role="form" action="barang_pinjam.php" method="POST">
				<div class="form-group">
					<label>Kode Barang</label>
					<select name="kode" class="form-control" required>
						<option value="" readonly selected>- Kode Barang -</option>
						<?php
							$sqlKode = mysqli_query($connect, "SELECT * FROM barang");
							while ($fetchKode = mysqli_fetch_array($sqlKode)) {
								?>
									<option value="<?=$fetchKode[0]?>"><?=$fetchKode[0]?> : <?=$fetchKode[1]?></option>
								<?php
							}

						?>
					</select>
				</div>
				<div class="form-group">
					<label>Peminjam</label>
					<input type="text" name="peminjam" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Tanggal Pinjam</label>
					<input type="date" name="pinjam" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Jumlah Pinjam</label>
					<input type="number" name="total" min="0" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<textarea class="form-control" name="keterangan" maxlength="35" required></textarea>
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

	<!-- Verifikai Modal -->

	<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<h2>Apakah barang tersebut sudah dikembalikan ?</h2>
	        <form role="form" action="barang_pinjam.php" id="verifikasiForm" method="POST">
				<div class="form-group">
					<label>Kode Barang</label>
					<input type="hidden" name="id" id="id">
					<input type="text" name="kode" id="kode" class="form-control" readonly autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Peminjam</label>
					<input type="text" name="peminjam" id="peminjam" class="form-control" readonly autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Tanggal Pinjam</label>
					<input type="text" name="pinjam" id="pinjam" class="form-control" readonly autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Jumlah Pinjam</label>
					<input type="text" name="total" id="total" min="0" class="form-control" readonly autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Keterangan</label>
					<textarea class="form-control" name="keterangan" id="keterangan" maxlength="35" readonly></textarea>
				</div>		
	      </div>
	      <div class="modal-footer">
	        <div class="form-group">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
		        <button type="submit" name="verifikasi" class="btn btn-primary">Yakin !</button>
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
	      			Peminjam :<input type="text" class="form-control" id="nama" readonly>
	      		</div>
	      	</div>
	        <h2>Apakah anda yakin untuk menghapus data tersebut ?</h2>
			<form action="barang_pinjam.php" method="POST" id="deleteForm">
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