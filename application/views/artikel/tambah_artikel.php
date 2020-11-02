<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('artikel/tambahSubmit') ?>" method="POST" role="form" enctype="multipart/form-data">
					<legend>Tambah Artikel</legend>

					<!-- <div class="form-group"> -->
						<!-- <label for="">ID Kredit</label> -->
						<!-- <input type="text" class="form-control" value="<?= $val->id ?>" name="id" disabled="disabled" hidden="hidden"> -->
						<!-- <input type="text" class="form-control" name="id" hidden="hidden" required> -->
					<!-- </div> -->
					<div class="form-group">
						<label for="">Jenis Barang</label>
						<input type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang" required>
						<?php echo form_error('jenis_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Model Barang</label>
						<input type="text" class="form-control" name="model_barang" placeholder="Model Barang" required>
						<?php echo form_error('model_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Motif barang</label>
						<input type="text" class="form-control" name="motif_barang" placeholder="Motif" required>
						<?php echo form_error('motif'); ?>
					</div>
					<div class="form-group">
						<label for="">Size</label>
						<input type="text" class="form-control" name="size" placeholder="Size" required>
						<?php echo form_error('size'); ?>
					</div>
					<div class="form-group">
						<label for="">kode Barang</label>
						<input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" disabled="">
						<?php echo form_error('kode_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Gambar</label>
						<input type="file" class="form-control" name="gambar" placeholder="Gambar" >
						<?php echo form_error('gambar'); ?>
					</div>
					<div class="form-group">
						<label for="">stok</label>
						<input type="text" class="form-control" name="stok" placeholder="Stok" required>
						<?php echo form_error('stok'); ?>
					</div>
					<a class="btn btn-default" href="<?= site_url('artikel') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
