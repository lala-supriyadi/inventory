<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('jadi_in/tidak_lakuSubmit') ?>" method="POST" role="form">
					<legend>Tambah Barang Tidak Laku</legend>

					<div class="form-group">
						<label for="">Kode Barang</label>
						<input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang"  required>
						<?php echo form_error('kode_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Model Barang</label>
						<input type="text" class="form-control" name="model_barang" placeholder="Model Barang"  required>
						<?php echo form_error('model_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Jenis Barang</label>
						<input type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang"  required>
						<?php echo form_error('jenis_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Motif Barang</label>
						<input type="text" class="form-control" name="motif_barang" placeholder="Motif Barang"  required>
						<?php echo form_error('motif_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Size</label>
						<input type="text" class="form-control" name="size" placeholder="Size"  required>
						<?php echo form_error('size'); ?>
					</div>
					<div class="form-group">
						<label for="">Tanggal Retur</label>
						<input type="date" class="form-control" name="tgl_masuk" placeholder="Tanggal Retur" required>
						<?php echo form_error('tgl_masuk'); ?>
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" name="jml_barang" placeholder="Jumlah Barang" required>
						<?php echo form_error('jml_barang'); ?>
					</div>
					<a class="btn btn-default" href="<?= site_url('retur/index') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
