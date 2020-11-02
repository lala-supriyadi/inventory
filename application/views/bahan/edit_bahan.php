<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('bahan/updateSubmit') ?>" method="POST" role="form" enctype="multipart/form-data">
					<legend>Edit Bahan</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<!-- <div class="form-group">
						<label for="">kode_barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" placeholder="input kode_barang" disabled="disabled">
						<input type="text" value="<?= $val->kode_barang ?>" name="kode_barang"  hidden="hidden">
					</div> -->
					<div class="form-group">
						<!-- <label for="">ID Kredit</label> -->
						<!-- <input type="text" class="form-control" value="<?= $val->id ?>" name="id" disabled="disabled" hidden="hidden"> -->
						<input type="text" value="<?= $val->id ?>" name="id" hidden="hidden" >
					</div>
					<div class="form-group">
						<label for="">Jenis Barang</label>
						<input type="text" class="form-control" value="<?= $val->jenis_barang ?>" name="jenis_barang" placeholder="Jenis Barang">
					</div>
					<div class="form-group">
						<label for="">Sub Jenis Barang</label>
						<input type="text" class="form-control" value="<?= $val->sub_jenis_barang ?>" name="sub_jenis_barang" placeholder="Sub Jenis Barang">
					</div>
					<div class="form-group">
						<label for="">Motif barang</label>
						<input type="text" class="form-control" value="<?= $val->motif_barang ?>" name="motif_barang" placeholder="Motif Barang">
					</div>
					<div class="form-group">
						<label for=""> Kode Barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" placeholde="Kode Barang" disabled>
					</div>
					<div class="form-group">
						<label for="">Gambar</label>
						<input type="file" class="form-control" value="<?= $val->gambar ?>" name="gambar" placeholder="Pilih Gambar">
					</div>
					<div class="form-group">
						<label for="">Stok</label>
						<input type="text" class="form-control" value="<?= $val->stok ?>" name="stok" placeholder="Stok">
					</div>
					<!-- <div class="form-group">
						<label>Satuan</label>
							<select name="satuan" class="form-control" required>
								<option value="<?= $val->satuan ?>"><?= $val->satuan ?></option>
								<option value="admin">Kg</option>
								<option value="user">Yard</option>
								<option value="manajer">Roll</option>
							</select>
					</div>	 -->
					<div class="form-group">
						<label for="">Satuan</label>
						<input type="text" class="form-control" value="<?= $val->satuan ?>" name="satuan" placeholder="Satuan">
					</div>
					<a class="btn btn-default" href="<?= site_url('bahan') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
