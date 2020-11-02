<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('pemaklun/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Pemaklun</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<!-- <div class="form-group">
						<label for="">id_anggota</label>
						<input type="text" class="form-control" value="<?= $val->id_anggota ?>" name="id_anggota" placeholder="Input Id" disabled="disabled">
						<input type="text" value="<?= $val->id_anggota ?>" name="id_anggota" hidden="hidden" >
					</div> -->
					<div class="form-group">
						<label for="">Nama Pemaklun</label>
						<input type="text" class="form-control" value="<?= $val->nama_pemaklun ?>" name="nama_pemaklun" placeholder="Input nama_pemaklun">
					</div>
					<div class="form-group">
						<label for="">alamat </label>
						<input type="text" class="form-control" value="<?= $val->alamat ?>" name="alamat" placeholder="Input alamat">
					</div>
					<!-- <div class="form-group">
								  	<label>Jenis Simpan</label>
								  	<select name="jenis_simpan" class="form-control" required>
									<option value="<?= $val->jenis_simpan ?>"><?= $val->jenis_simpan ?></option>
									  <option value="wajib">wajib</option>
									  <option value="sukarela">sukarela</option>
									  <option value="pokok">pokok</option>
									</select>
								</div>		 -->
					<div class="form-group">
						<label for="">no_telepon</label>
						<input type="number" class="form-control" value="<?= $val->no_telepon ?>" name="no_telepon" placeholder="Input no_telepon">
					</div>
					<a class="btn btn-default" href="<?= site_url('pemaklun') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
