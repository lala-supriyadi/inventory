<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('retur/tambahretur') ?>">
					<i class="fa fa-plus"></i>Tambah Retur Barang</a>
				<br>
				<br>
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>No</th>
							<th>Kode Barang</th>
								<th>Tanggal Retur</th>
								<th>Jenis Barang</th>
								<th>Motif Barang</th>
								<th>Size</th>
								<th>Jumlah Barang</th>
								<th>Keterangan</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($data_retur->result() as $row):?>
					   <tr>
									<td><?php echo $i++ ?></td>
									<td><?= $row->kode_barang ?></td>
									<td><?= $row->tgl_retur?></td>
									<td><?= $row->jenis_barang?></td>
									<td><?= $row->motif_barang?></td>
									<td><?= $row->size?></td>
									<td><?= $row->jml_barang ?></td>
									<td><?= $row->keterangan ?></td>
											  <td>
											<a href="<?= site_url('retur/updateretur/'.$row->kode_barang) ?>"><span style="font-size: 25px; color:blue; margin-right: 10px;"> <i class="fa fa-edit"></i>
											</span>	
											</a>
											 <a href="<?= site_url('retur/delete/'.$row->kode_barang) ?>"><span style="font-size: 25px; color:red; margin-right: 10px;"> <i class="fa fa-trash"></i>
											</span>	</a>
											  </td> 
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
    	"bLengthChange": false,	
    	"bInfo" : false,
    	"bPaginate" : false
    });
});
</script>