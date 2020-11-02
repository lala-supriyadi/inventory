<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('jadi_out/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Barang Jadi Keluar</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">kode_barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" disabled="disabled">
						<input type="text" value="<?= $val->kode_barang ?>" name="kode_barang"  hidden="hidden">>
					</div>
					<div class="form-group">
						<label for="">nama_barang</label>
						<input type="text" class="form-control" value="<?= $val->nama_barang ?>" name="nama_barang" readonly="readonly" placeholder="Input nama_barang">
					</div>
					<div class="form-group">
						<label for="">Model Barang</label>
						<input type="text" class="form-control" value="<?= $val->model_barang ?>" name="model_barang" readonly="readonly" placeholder="Input model_barang">
					</div>
					<div class="form-group">
						<label for="">jenis barang </label>
						<input type="text" class="form-control" value= "<?= $val->jenis_barang ?>" name="jenis_barang" readonly="readonly" placeholder="input jenis barang">
					<div class="form-group">
						<label for="">nama pelapak </label>
						<input type="text" class="form-control" value= "<?= $val->nama_pelapak ?>" name= "nama_pelapak"
						placeholder="input nama_pelapak">

					<div class="form-group">
						<label for="">tanggal keluar</label>
						<input type="date" class="form-control" value="<?= $val->tgl_keluar ?>" name="tgl_keluar" placeholder="Input tanggal keluar">
					</div>
					<div class="form-group">
						<label for=""> jumlah barang</label>
						<input type="text" class="form-control" value="<?= $val->jml_barang ?>" name="jml_barang" placeholde="input jumlah barang">
					<a class="btn btn-default" href="<?= site_url('jadi_out') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
