<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('mentah_in/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Barang Mentah Masuk</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">kode_barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" placeholder="Input kode_barang"  disabled="disabled">
						<input type="text" value="<?= $val->kode_barang ?>" name="kode_barang" hidden="hidden" > 
					</div>
					<!-- <div class="form-group">
						<label for="">kode barang</label>
						<input type="nomber" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" placeholder="Input kode_barang">
					</div> -->
					<!-- <div class="form-group">
						<label for="">Nama Barang </label>
						<input type="text" class="form-control" value="<?= $val->nama_barang ?>" name="nama_barang" placeholder="Input Nama Barang">
					</div> -->
					<!-- div class="form-group">
								  	<label>Jenis Simpan</label>
								  	<select name="jenis_simpan" class="form-control" required>
									<option value="<?= $val->jenis_simpan ?>"><?= $val->jenis_simpan ?></option>
									  <option value="wajib">wajib</option>
									  <option value="sukarela">sukarela</option>
									  <option value="pokok">pokok</option>
									</select>
								</div>		 -->
					<div class="form-group">
						<label for="">Tanggal Masuk</label>
						<input type="date" class="form-control" value="<?= $val->tgl_masuk ?>" name="tgl_masuk" placeholder="Input tanggal masuk">
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" value="<?= $val->stok ?>" name="stok" placeholder="Input jumlah barang">
					</div>
					<a class="btn btn-default" href="<?= site_url('mentah_in') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
