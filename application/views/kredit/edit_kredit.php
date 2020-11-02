<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('kredit/updateSubmit') ?>" method="POST" role="form" enctype="multipart/form-data">
					<legend>Edit Kredit</legend>
					<?php foreach ($update->result() as $val): ?>

					<div class="form-group">
						<!-- <label for="">ID Kredit</label> -->
						<!-- <input type="text" class="form-control" value="<?= $val->id ?>" name="id" disabled="disabled" hidden="hidden"> -->
						<input type="text" value="<?= $val->id ?>" name="id" hidden="hidden" >
					</div>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" value="<?= $val->nama_pelapak ?>" name="nama_pelapak" placeholder="Nama">
					</div>
					<div class="form-group">
						<label for="">No Telephone</label>
						<input type="number" class="form-control" value="<?= $val->no_tlp ?>" name="no_tlp" placeholder="no_tlp">
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" class="form-control" value="<?= $val->alamat ?>" name="alamat" placeholder="alamat">
					</div>
					<div class="form-group">
						<label for="">tgl_kredit </label>
						<input type="date" class="form-control" value="<?= $val->tgl_kredit ?>" name="tgl_kredit" placeholder="Tanggal Kredit">
					</div>
					<div class="form-group">
						<label for="">jumlah kredit</label>
						<input type="text" class="form-control" value="<?= $val->jumlah_kredit ?>" name="jumlah_kredit" placeholder="Jumlah Kredit" disabled="disabled">
						<input type="text" value="<?= $val->jumlah_kredit ?>" name="jumlah_kredit" hidden="hidden" >
					</div>

					<a class="btn btn-default" href="<?= site_url('kredit') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Update</button>
				<?php endforeach ?>

				</form>
			</div>
		</div>
	</div>
</section>
