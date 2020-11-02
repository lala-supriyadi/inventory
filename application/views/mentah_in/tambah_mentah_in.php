<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('mentah_in/tambahSubmit') ?>" method="POST" role="form" enctype="multipart/form-data">
					<legend>Tambah Barang Mentah Masuk</legend>
					<!-- <div class="form-group">
						<label for="">kode barang</label>
						<input type="text" class="form-control" name="kode_barang" placeholder="kode_barang" required>
						<?php echo form_error('kode_barang'); ?>
					</div> -->
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
						<label for="">Tanggal Masuk</label>
						<input type="date" class="form-control" name="tgl_masuk" placeholder="Tanggal Masuk" required>
						<?php echo form_error('tgl_masuk'); ?>
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" name="jml_barang" placeholder="Jumlah Barang" required>
						<?php echo form_error('jml_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Satuan</label>
						<input type="text" class="form-control" name="satuan" value="<?= $val->satuan ?>" disabled="disabled" required>
						<input type="text" value="<?= $val->satuan ?>" name="satuan" hidden="hidden" >
						<?php echo form_error('size'); ?>
					</div>
					<a class="btn btn-default" href="<?= site_url('bahan') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<?php endforeach ?>
				</form>
			</div>
		</div>
	</div>
</section>
