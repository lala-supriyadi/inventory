<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('jadi_in/updateSubmit') ?>" method="POST" role="form">
					<legend>Edit Barang Jadi Masuk</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">kode_barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" placeholder="input kode_barang" disabled="disabled">
						<input type="text" value="<?= $val->kode_barang ?>" name="kode_barang"  hidden="hidden">
					</div>
					<div class="form-group">
						<label for="">nama_barang</label>
						<input type="text" class="form-control" value="<?= $val->nama_barang ?>" name="nama_barang" readonly="readonly" placeholder="Input nama_barang">
					</div>
					<div class="form-group">
						<label for="">model_barang</label>
						<input type="text" class="form-control" value="<? $val->model_barang ?>" name="model_barang" readonly="readonly" placeholder="input model_barang">
					</div>
					<div class="form-group">
						<label for="">motif barang </label>
						<input type="text" class="form-control" value="<?= $val->motif_barang ?>" name="motif_barang" readonly="readonly" placeholder="Input motif_barang barang">
					</div>		
					<div class="form-group">
						<label for="">tanggal masuk</label>
						<input type="date" class="form-control" value="<?= $val->tgl_masuk ?>" name="tgl_masuk" placeholder="Input tanggal masuk">
					</div>
					<div class="form-group">
						<label for=""> jumlah barang</label>
						<input type="text" class="form-control" value="<?= $val->jml_barang ?>" name="jml_barang" placeholde="input jumlah barang">
					<a class="btn btn-default" href="<?= site_url('jadi_in') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
