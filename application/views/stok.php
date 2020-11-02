<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('stok/tambahstok') ?>">
					<i class="fa fa-plus"></i> Tambah Barang Mentah Masuk (STOK)</a> 
				<br>
				<br>
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
								<!-- <th>no</th> -->
								<th>Kode Barang</th>
								<!-- <th>nama barang</th> -->
								<th>Tanggal Masuk</th>
								<th>Stok</th>
								<!-- <th>tanggal masuk</th>
								<th>persyaratan</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<?php foreach ($data_stok->result() as $row):?>
					   <tr>
									<!-- <td><?= $row->id ?></td> -->
									<td><?= $row->kode_barang ?></td>
									<!-- <td><?= $row->nama_barang ?></td> -->
									<td><?= $row->tgl_masuk ?></td>
									<td><?= $row->stok ?></td>
									<!-- <td><?= $row->persyaratan?></td> -->
											  <td>
											<a href="<?= site_url('stok/updatestok/'.$row->kode_barang) ?>"><span style="font-size: 25px; color:blue; margin-right: 10px;"> <i class="fa fa-edit"></i>
											 </span>	
											</a>
											|
											 <a href="<?= site_url('stok/delete/'.$row->kode_barang) ?>"><span style="font-size: 25px; color:red; margin-left:10px;"> <i class="fa fa-trash"></i>
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