<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">			
				<form action="<?= site_url('jadi_in/tambahSubmit') ?>" method="POST" role="form" enctype="multipart/form-data">
					<legend>Tambah Barang Jadi Masuk</legend>

					 <!-- <div class="form-group">
						<label>Kode Barang</label>
                                    <select class="form-control" name="kode_barang" data-placeholder="Pilih..." >
                                            <option>--Select--</option>
                                            <?php foreach ($kode_barang as $row) {
                                                if($row->kode_barang == set_value('kode_barang')){
                                                    echo "<option value='$row->kode_barang' selected> $row->kode_barang</option>";
                                                  } else {
                                                    echo "<option value='$row->kode_barang'>$row->kode_barang</option>";
                                                  }
                                                ?>
                                            <?php }
                                            ?>
                                            <?php echo form_error('kode_barang'); ?>
                                        </select>    

					</div>  -->

					<?php foreach ($update->result() as $val): ?>
					<div class="form-group">
						<!-- <label for="">ID Kredit</label> -->
						<!-- <input type="text" class="form-control" value="<?= $val->id ?>" name="id" disabled="disabled" hidden="hidden"> -->
						<!-- <input type="text" value="<?= $val->kode_barang ?>" name="kode_barang" hidden="hidden" > -->
					</div>
					<div class="form-group">
						<label for="">Kode Barang</label>
						<input type="text" class="form-control" value="<?= $val->kode_barang ?>" name="kode_barang" disabled="disabled">
						<input type="text" value="<?= $val->kode_barang ?>" name="kode_barang" hidden="hidden" >
					</div>
					<div class="form-group">
						<label for="">Jenis Barang</label>
						<input type="text" class="form-control" name="jenis_barang" value="<?= $val->jenis_barang ?>" disabled="disabled" required>
						<input type="text" value="<?= $val->jenis_barang ?>" name="jenis_barang" hidden="hidden" >
						<?php echo form_error('jenis_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Model Barang</label>
						<input type="text" class="form-control" name="model_barang" value="<?= $val->model_barang ?>" disabled="disabled" required>
						<input type="text" value="<?= $val->model_barang ?>" name="model_barang" hidden="hidden" >
						<?php echo form_error('model_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Motif Barang</label>
						<input type="text" class="form-control" name="motif_barang" value="<?= $val->motif_barang ?>" disabled="disabled" required>
						<input type="text" value="<?= $val->motif_barang ?>" name="motif_barang" hidden="hidden" >
						<?php echo form_error('motif_barang'); ?>
					</div>
					<div class="form-group">
						<label for="">Size</label>
						<input type="text" class="form-control" name="size" value="<?= $val->size ?>" disabled="disabled" required>
						<input type="text" value="<?= $val->size ?>" name="size" hidden="hidden" >
						<?php echo form_error('size'); ?>
					</div>
					<div class="form-group">
						<label for="">Tanggal Masuk</label>
						<input type="date" class="form-control" name="tgl_masuk" placeholder="Tanggal Masuk" required>
						<?php echo form_error('tgl_masuk'); ?>
					</div>
					<div class="form-group">
						<label for="">Jumlah Barang</label>
						<input type="text" class="form-control" name="jml_barang" placeholder="Jumlah Barang" required>
						<?php echo form_error('jml_barang'); ?>
					</div>
					<a class="btn btn-default" href="<?= site_url('artikel') ?>">Kembali</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<?php endforeach ?>
				</form>
			</div>
		</div>
<script src="https://ajax.googleapis.com/ajax/ibs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function (){
        var model_barang = $("#model_barang").val();
        $.ajax({
            url: '<?= site_url('jadi_in') ?>',
            data:"nip="+nip ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#jenis_barang').val(obj.jenis_barang);
            $('#motif_barang').val(obj.motif_barang);  
        });
    }
</script>

	</div>
</section>
