<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('kredit/tambahkredit') ?>">
					<i class="fa fa-plus"></i> Tambah Kredit</a>
				<br>
				<br>
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>No Telephone</th>
								<th>Alamat</th>
								<th>Tanggal Kredit</th>
								<th>Jumlah Kredit Awal</th>
								<th>Jumlah Total Kredit</th>
								<th>Sisa</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($data_kredit->result() as $row):?>
					   		<tr>
									<td><?php echo $i++ ?></td>
									<td><a href="<?= site_url('kredit/detail/'.$row->id ) ?>"> <?= $row->nama_pelapak?></a></td>
									<td><?= $row->no_tlp?></td>
									<td><?= $row->alamat?></td>
									<td><?= $row->tgl_kredit?></td>
									<td><?= to_rupiah ($row->kredit_awal) ?></td>
									<td><a href="<?= site_url('kredit/detailkredit/'.$row->id ) ?>"> <?= to_rupiah ($row->jumlah_kredit) ?></td>
									<td><?= to_rupiah ($row->sisa_hutang) ?></td>
							
										<td>
											<a href="<?= site_url('kredit/updatekredit/'.$row->id) ?>">
												<span style="font-size: 25px; color:blue; margin-right: 10px;"><i class="fa fa-edit"></i></span></a>
											<a href="<?= site_url('kredit/bayarkredit/' .$row->id) ?>">
												<span style="font-size: 25px; color:green; margin-left: 10px;-right:10px;"> <i class="fa fa-money"></i></span></a>
											<a href="<?= site_url('kredit/utang/' .$row->id) ?>">
												<span style="font-size: 25px; color:green; margin-left: 10px; margin-right:10px;"> <i class="fa fa-plus"></i></span></a>
											<a href="<?= site_url('kredit/delete/'.$row->id) ?>">
												<span style="font-size: 25px; color:red; margin-right: 10px; margin-left: 10px;"> <i class="fa fa-trash" ></i></span></a>
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