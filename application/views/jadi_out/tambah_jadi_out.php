<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('jadi_out/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Barang Jadi Keluar</legend>
					<?php foreach ($update->result() as $val): ?>
					<div class="form-group">
						<!-- <label for="">ID Kredit</label> -->
						<!-- <input type="text" class="form-control" value="<?= $val->id ?>" name="id" disabled="disabled" hidden="hidden"> -->
						<!-- <input type="text" value="<?= $val->kode_barang ?>" name="kode_barang" hidden="hidden" > -->
					</div>
					<div class="form-group">
						<label for="">Kode Barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" disabled="disabled">
						<input type="text" value="<?= $val->kode_barang ?>" name="kode_barang" hidden="hidden" >
					</div>
					<div class="form-group">
						<label for="">Model Barang</label>
						<input type="text" class="form-control" name="model_barang" value="<?= $val->model_barang ?>" disabled="disabled" required>
						<input type="text" value="<?= $val->model_barang ?>" name="model_barang" hidden="hidden" >
						<?php echo form_error('model_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Jenis Barang</label>
						<input type="text" class="form-control" name="jenis_barang" value="<?= $val->jenis_barang ?>" disabled="disabled" required>
						<input type="text" value="<?= $val->jenis_barang ?>" name="jenis_barang" hidden="hidden" >
						<?php echo form_error('jenis_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Motif Barang</label>
						<input type="text" class="form-control" name="motif_barang" value="<?= $val->motif_barang ?>" disabled="disabled" required>
						<input type="text" value="<?= $val->motif_barang ?>" name="motif_barang" hidden="hidden" >
						<?php echo form_error('motif_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Size</label>
						<input type="text" class="form-control" name="size" value="<?= $val->size ?>" disabled="disabled" required>
						<input type="text" value="<?= $val->size ?>" name="size" hidden="hidden" >
						<?php echo form_error('size'); ?>
					</div>
					<div class="form-group">
						<label for="">Nama Pelapak</label>
						<input type="text" class="form-control" name="nama_pelapak" required>
						<!-- <input type="text" value="<?= $val->motif_barang ?>" name="motif_barang" hidden="hidden" > -->
						<?php echo form_error('nama_pelapak'); ?>
					</div>
					<div class="form-group">
						<label for="">Tanggal Keluar</label>
						<input type="date" class="form-control" name="tgl_keluar" placeholder="Tanggal Keluar" required>
						<?php echo form_error('tgl_keluar'); ?>
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" name="jml_barang" placeholder="Jumlah Barang" required>
						<?php echo form_error('jml_barang'); ?>
					</div>
					<a class="btn btn-default" href="<?= site_url('artikel') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<?php endforeach ?>
				</form>
			</div>
		</div>
	</div>
</section>
