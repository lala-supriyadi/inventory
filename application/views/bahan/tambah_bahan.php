<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('bahan/tambahSubmit') ?>" method="POST" role="form" enctype="multipart/form-data">
					<legend>Tambah Bahan</legend>

					<div class="form-group">
						<label for="">Jenis Barang</label>
						<input type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang" required>
						<?php echo form_error('jenis_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Sub Jenis Barang</label>
						<input type="text" class="form-control" name="sub_jenis_barang" placeholder="Sub Jenis Barang" required>
						<?php echo form_error('sub_jenis_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Motif barang</label>
						<input type="text" class="form-control" name="motif_barang" placeholder="Motif Barang" required>
						<?php echo form_error('motif_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Kode Barang</label>
						<input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" disabled="">
						<?php echo form_error('kode_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Gambar</label>
						<input type="file" class="form-control" name="gambar" placeholder="Gambar" >
						<?php echo form_error('gambar'); ?>
					</div>
					<div class="form-group">
						<label for="">Stok</label>
						<input type="text" class="form-control" name="stok" placeholder="Stok" required>
						<?php echo form_error('stok'); ?>
					</div>
					<!-- <div class="form-group">
						<label>Satuan</label>
							<select name="satuan" class="form-control" required>
								<option value="">Pilih...</option>
								<option value="kg">Kg</option>
								<option value="yard">Yard</option>
								<option value="roll">Roll</option>
							</select>
					</div> -->
					<div class="form-group">
						<label for="">Bahan</label>
						<input type="text" class="form-control" name="satuan" placeholder="satuan" required>
						<?php echo form_error('satuan'); ?>
					</div>
					<a class="btn btn-default" href="<?= site_url('bahan') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
