<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('mentah_in/updateSubmit') ?>" method="POST" role="form" enctype="multipart/form-data">
					<legend>Edit Barang Mentah Masuk</legend>
					<?php foreach ($update->result() as $val): ?>
					<div class="form-group">
						<label for="">Kode Barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" placeholder="Kode Barang" disabled="disabled">
						<!-- <input type="text" value="<?= $val->kode_barang ?>" name="kode_barang" hidden="hidden" >  -->
					</div>
					<div class="form-group">
						<label for="">Nama Barang </label>
						<input type="text" class="form-control" value="<?= $val->nama_barang ?>" name="nama_barang" placeholder="Nama Barang">
					</div>
					<div class="form-group">
						<label for="">Tanggal Masuk</label>
						<input type="date" class="form-control" value="<?= $val->tgl_masuk ?>" name="tgl_masuk" placeholder="Tanggal Masuk">
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" value="<?= $val->jml_barang ?>" name="jml_barang" placeholder="Jumlah Barang">
					</div>
					<div class="form-group">
						<label for="">Gambar</label>
						<input type="file" class="form-control" value="<?= $val->gambar ?>" name="gambar" placeholder="Gambar">
					</div>
					<a class="btn btn-default" href="<?= site_url('mentah_in') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
