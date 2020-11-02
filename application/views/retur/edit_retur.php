<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('retur/updateSubmit') ?>" method="POST" role="form">
							<legend>Edit Barang Retur</legend>
					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<label for="">Kode Barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" placeholder="Kode Barang" disabled="disabled">
						<input type="text" value="<?= $val->kode_barang ?>" name="kode_barang"  hidden="hidden">
					</div>
					<div class="form-group">
						<label for="">Tanggal Retur</label>
						<input type="date" class="form-control" value="<?= $val->tgl_retur ?>" name="tgl_retur" placeholder="Tanggal Retur">
					</div>		
					<div class="form-group">
						<label for="">Motif Barang</label>
						<input type="text" class="form-control" value="<?= $val->motif_barang ?>" name="motif_barang" placeholder="Motif Barang">
					</div>
					<div class="form-group">
						<label for="">Size</label>
						<input type="text" class="form-control" value="<?= $val->size ?>" name="size" placeholder="Size">
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" value="<?= $val->jml_barang ?>" name="jml_barang" placeholde="Jumlah Barang">
					<div class="form-group">
						<label for="">Keterangan</label>
						<input type="text" class="form-control" value="<?= $val->keterangan ?>" name="keterangan" placeholde="Keterangan">
					<a class="btn btn-default" href="<?= site_url('/retur/index_return_rusak') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
