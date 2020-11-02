<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('retur/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Retur Barang</legend>

					<div class="form-group">
						<label for="">Kode Barang</label>
						<input type="text" class="form-control" name="kode_barang" placeholder="kode_barang" required>
						<?php echo form_error('kode_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Tanggal</label>
						<input type="date" class="form-control" name="tgl_retur" placeholder="tgl_retur" required>
						<?php echo form_error('tgl_retur'); ?>
					</div>
					<div class="form-group">
						<label for="">Jenis Barang</label>
						<input type="text" class="form-control" name="jenis_barang" placeholder="Jenis Barang" required>
						<?php echo form_error('jenis_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Motif barang</label>
						<input type="text" class="form-control" name="motif_barang" placeholder="Motif Barang" required>
						<?php echo form_error('motif_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Size</label>
						<input type="text" class="form-control" name="size" placeholder="Size" required>
						<?php echo form_error('size'); ?>
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" name="jml_barang" placeholder="Jumlah Barang" required>
						<?php echo form_error('jml_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required>
						<?php echo form_error('keterangan'); ?>
					</div>
					<a class="btn btn-default" href="<?= site_url('retur') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
