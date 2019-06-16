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
	        <form role="form" action="barang_masuk.php" method="POST">
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
					<label>Tanggal Masuk</label>
					<input type="date" name="tanggal" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Total Barang</label>
					<input type="number" name="total" min="0" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Kode Supplier</label>
					<select name="supplier" class="form-control" required>
						<option value="" readonly selected>- Kode Supplier -</option>
						<?php
							$sqlSupllier = mysqli_query($connect, "SELECT kode_supplier FROM supplier");
							while ($fetchSupllier = mysqli_fetch_array($sqlSupllier)) {
								?>
									<option value="<?=$fetchSupllier[0]?>"><?=$fetchSupllier[0]?></option>
								<?php
							}

						?>
					</select>
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
	        <form role="form" action="barang_masuk.php" id="editForm" method="POST">
				<div class="form-group">
					<input type="hidden" name="id" id="id">
					<label>Kode Barang</label>
					<input type="text" name="kode" id="kode" class="form-control" readonly autofocus>
				</div>
				<div class="form-group">
					<label>Tanggal Masuk</label>
					<input type="date" name="tanggal" id="tanggal" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Total Barang</label>
					<input type="number" name="total" id="total" min="0" class="form-control" required autocomplete="off" autofocus>
				</div>
				<div class="form-group">
					<label>Kode Supplier</label>
					<select name="supplier" id="supplier" class="form-control" required>
						<option value="" readonly>- Kode Supplier -</option>
						<?php
							$sqlSupllier = mysqli_query($connect, "SELECT kode_supplier FROM supplier");
							while ($fetchSupllier = mysqli_fetch_array($sqlSupllier)) {
								?>
									<option value="<?=$fetchSupllier[0]?>"><?=$fetchSupllier[0]?></option>
								<?php
							}

						?>
					</select>
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
  			Kode Barang :<input type="text" class="form-control" id="kode" readonly>
	        <h2>Apakah anda yakin untuk menghapus data tersebut ?</h2>
			<form action="barang_masuk.php" method="POST" id="deleteForm">
			<input type="hidden" id="id" name="id">
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