<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('bahan/tambahbahan') ?>">
					<i class="fa fa-plus"></i> Tambah Bahan</a>
				<br>
				<br>
				
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Jenis Barang</th>
							<th>Motif Barang</th>
							<th>Gambar</th>
							<th>Stok</th>
							<th>Satuan</th>
							<th>Action</th>
							<th>Masuk</th>
							<th>Keluar</th>
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($data_bahan->result() as $row):?>
					    <tr>
					    			<td><?php echo $i++ ?></td>
									<td><?= $row->kode_barang ?></td>
									<td><?= $row->jenis_barang ?> <?= $row->sub_jenis_barang ?> </td>
									<td><?= $row->motif_barang ?></td>

									<td>
										<img src="<?php echo base_url() ?>./upload/bahan/<?php echo $row->gambar ?>" class="image image-responsive" height="50" width="50"> 
									<div class="details">
                        				<a href="<?php echo base_url() ?>./upload/bahan/<?php echo $row->gambar ?>"><?php echo "+" ?></a> 
                   					</div>
                   					</td>

									<td><?= $row->stok ?></td>
									<td><?= $row->satuan ?></td>

									<td>
										<a href="<?= site_url('bahan/updatebahan/'.$row->id) ?>">
										<span style="font-size: 25px; color:blue; margin-right: 10px;"> <i class="fa fa-edit"></i></span></a>
										<a href="<?= site_url('bahan/delete/'.$row->id) ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
										<span style="font-size: 25px; color:red; margin-left: 10px;"> <i class="fa fa-trash" ></i></span>	
										</a>
								  	</td>
								  	<td><a href="<?= site_url('mentah_in/tambahmentah_in/' .$row->kode_barang) ?>"> 
								  		<span style="font-size: 25px; color:limegreen; margin-left: 10px;"> <i class="fa fa-plus-circle"></i></span></a>
								  	</td>
								  	<td><a href="<?= site_url('mentah_out/tambahmentah_out/' .$row->kode_barang) ?>">
								  		<span style="font-size: 25px; color:red; margin-left: 10px;"> <i class="fa fa-minus-circle"></i></span></a>
								  	</td>
									</tr>
								<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- plugins -->
<script src="<?php echo base_url('assets/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script>
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable( {
    	"bLengthChange": true,	
    	"bInfo" : true,
    	"bPaginate" : true
    });
});
</script>