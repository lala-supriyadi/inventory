<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('kredit/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Kredit</legend>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" name="nama_pelapak" placeholder="Nama" required >
						<?php echo form_error('nama_pelapak'); ?>
					</div>
					<div class="form-group">
						<label for="">No Telepon</label>
						<input type="text" class="form-control" name="no_tlp" placeholder="No Telepon" required>
						<?php echo form_error('no_tlp'); ?>
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
						<?php echo form_error('alamat'); ?>
					</div>
					<div class="form-group">
						<label for="">Tanggal</label>
						<input type="date" class="form-control" name="tgl_kredit" placeholder="Tgl Kredit" required>
						<?php echo form_error('tgl_kredit'); ?>
					</div>
					<div class="form-group">
						<label for="">Jumlah Kredit</label>
						<input type="text" class="form-control" name="jumlah_kredit" placeholder="Jumlah Kredit" required>
						<?php echo form_error('jumlah_kredit'); ?>
					</div>
					<a class="btn btn-default" href="<?= site_url('kredit') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
