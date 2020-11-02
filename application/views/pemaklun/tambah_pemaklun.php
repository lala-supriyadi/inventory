<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('pemaklun/tambahSubmit') ?>" method="POST" role="form">
					<legend>Tambah Pemaklun</legend>

					
					<div class="form-group">
						<label for="">Nama Pemaklun</label>
						<input type="text" class="form-control" name="nama_pemaklun" placeholder="nama_pemaklun" required>
						<?php echo form_error('nama_pemaklun'); ?>
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" class="form-control" name="alamat" placeholder="alamat" required>
						<?php echo form_error('alamat'); ?>
					</div>
					<div class="form-group">
						<label for="">No Telepon</label>
						<input type="number" class="form-control" name="no_telepon" placeholder="no_telepon" required>
						<?php echo form_error('no_telepon'); ?>
					</div>
					<!-- <div class="form-group">
						<label>Persyaratan</label>
								  	<select name="persyaratan" class="form-control" required>
								  	  <option value="">Pilih...</option>
									  <option value="KTP">KTP</option>
									  <option value="Kartu Keluarga">Kartu Keluarga</option>
									  
									</select>
					</div> -->
					
					<a class="btn btn-default" href="<?= site_url('pemaklun') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
