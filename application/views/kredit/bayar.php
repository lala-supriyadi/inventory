<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('kredit/bayarSubmit') ?>" method="POST" role="form">
					<legend>Tambah Bayar</legend>

					<?php foreach ($update->result() as $val): ?>
						
					<div class="form-group">
						<!-- <label for="">ID Kredit</label> -->
						<!-- <input type="text" class="form-control" value="<?= $val->id ?>" name="id" disabled="disabled" hidden="hidden"> -->
						<input type="text" value="<?= $val->id ?>" name="id" hidden="hidden" >
					</div>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" class="form-control" value="<?= $val->nama_pelapak ?>" name="nama_pelapak" disabled="disabled">
						<input type="text" value="<?= $val->nama_pelapak ?>" name="nama_pelapak" hidden="hidden" >
					</div>
					<div class="form-group">
						<label for="">Tanggal Bayar </label>
						<input type="date" class="form-control" name="tgl_bayar" placeholder="Tanggal Bayar">
					</div>
					<div class="form-group">
						<label for="">Jumlah Bayar</label>
						<input type="text" class="form-control"  name="jml_bayar" placeholder="Jumlah Bayar">
					</div>
					<a class="btn btn-default" href="<?= site_url('kredit') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<?php endforeach ?>
				</form>
			</div>
		</div>
	</div>
</section>
