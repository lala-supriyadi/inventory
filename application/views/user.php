<section>
	<div class="panel-body body">
				<a class="btn btn-primary" href="<?= site_url('KelolaUser/tambahuser') ?>">
					<i class="fa fa-plus"></i> Tambah User</a>
				<br>
				<br>
				<div class="table-responsive">
				<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
							<!-- <th>Id User</th> -->
								<th>Nama</th>
								<th>Username</th>
								<th>Level</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$i=1;
						foreach ($data_user->result() as $row): ?>
					    <tr>
							<td><?php echo $i++ ?></td>
							<!-- <td><?= $row->id_user ?></td> -->
							<td><?= $row->nama ?></td>
							<td><?= $row->username ?></td>
							<td><?= $row->level ?></td>
							<td>
							<a href="<?= site_url('kelolauser/updateBarang/'.$row->id_user) ?>">
							<span style="font-size: 25px; color:blue; margin-right: 10px;"> <i class="fa fa-edit"></i>
							</span>	
							</a>
										|
							<a href="<?= site_url('kelolauser/delete/'.$row->id_user) ?>">
							<span style="font-size: 25px; color:red; margin-left: 10px;"> <i class="fa fa-trash"></i>
							</span>	
							</a>
							</td>
							</tr>
									<?php endforeach ?>

						</tbody>
					</table>	
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