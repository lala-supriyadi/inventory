<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('stok/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Barang Mentah Masuk ()</legend>

					
					<div class="form-group">
						<label for="">Kode Barang</label>
						<input type="text" class="form-control" name="kode_barang" placeholder="kode_barang" required>
						<?php echo form_error('kode_barang'); ?>
					</div>
					<!-- <div class="form-group">
						<label for="">nama barang</label>
						<input type="text" class="form-control" name="nama_barang" placeholder="nama_barang" required>
						<?php echo form_error('nama_barang'); ?>
					</div> -->
					<div class="form-group">
						<label for="">Tanggal Masuk</label>
						<input type="date" class="form-control" name="tgl_masuk" placeholder="tgl_masuk" required>
						<?php echo form_error('tgl_masuk'); ?>
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" name="stok" placeholder="stok" required>
						<?php echo form_error('stok'); ?>
					</div>
					<!-- <div class="form-group">
						<label>Persyaratan</label>
								  	<select name="persyaratan" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="KTP">KTP</option>
									  <option value="Kartu Keluarga">Kartu Keluarga</option>
									  
									</select>
					</div> -->
					
					<a class="btn btn-default" href="<?= site_url('stok') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
