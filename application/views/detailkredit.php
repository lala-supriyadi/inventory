<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- <a class="btn btn-primary" href="<?= site_url('kredit/tambahkredit') ?>"> -->
					<!-- <i class="fa fa-plus"></i> Detail</a> -->
					<legend>Detail Penambahan Kredit</legend>
				<br>
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Tanggal Kredit</th>
								<th>Jumlah Kredit</th>
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($data_kredit_detail->result() as $row):?>
					   		<tr>
									<td><?php echo $i++ ?></td>
									<td><?= $row->nama_pelapak?></td>
									<td><?= $row->tgl_kredit?></td>
									<td><?= to_rupiah ($row->jml_kredit) ?></td>
									
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
    	"bLengthChange": false,	
    	"bInfo" : false,
    	"bPaginate" : false
    });
});	
</script>