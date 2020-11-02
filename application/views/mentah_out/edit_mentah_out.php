<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('mentah_out/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Barang Mentah Keluar</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">Kode Barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang"disabled="disabled">
						<input type="text" value="<?= $val->kode_barang ?>" name="kode_barang"  hidden="hidden">
					</div>
					<div class="form-group">
						<label for="">Nama Barang</label>
						<input type="text" class="form-control" value="<?= $val->nama_barang ?>" name="nama_barang" placeholder="Nama Barang">
					</div>
					<div class="form-group">
						<label for="">Nama Pemaklun </label>
						<input type="text" class="form-control" value="<?= $val->nama_pemaklun ?>" name="nama_pemaklun" placeholder="Nama Pemaklun">
					</div>
					<div class="form-group">
						<label for="">Tanggal Keluar</label>
						<input type="date" class="form-control" value="<?= $val->tgl_keluar ?>" name="tgl_keluar" placeholder="Tanggal Keluar">
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" value="<?= $val->jml_barang ?>" name="jml_barang" placeholde="Jumlah Barang">
					<a class="btn btn-default" href="<?= site_url('mentah_out') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
