<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('pemaklun/tambahpemaklun') ?>">
					<i class="fa fa-plus"></i> Tambah Pemaklun</a>
				<br>
				<br>
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Pemaklun</th>
								<th>Alamat</th>
								<th>No Telepon</th>
								<!-- <th>tanggal masuk</th>
								<th>persyaratan</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($data_pemaklun->result() as $row):?>
					   <tr>
									<td><?php echo $i++ ?></td>
									<td><?= $row->nama_pemaklun ?></td>
									<td><?= $row->alamat ?></td>
									<td><?= $row->no_telepon ?></td>
									
											  <td>
										<a href="<?= site_url('pemaklun/updatepemaklun/'.$row->nama_pemaklun) ?>"><span style="font-size: 25px; color:blue; margin-right: 10px;"> <i class="fa fa-edit"></i>
										</span> 
										</a>
										|
										 <a href="<?= site_url('pemaklun/delete/'.$row->nama_pemaklun) ?>"><span style="font-size: 25px; color:red; margin-left: 10px;"> <i class="fa fa-trash"></i>
										</span> 
										</a>	 
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