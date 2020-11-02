<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- <a class="btn btn-primary" href="<?= site_url('mentah_out/tambahmentah_out') ?>"> -->
					<!-- <i class="fa fa-plus"></i> Tambah Barang Mentah keluar</a> -->
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
								<th>Nama Pemaklun</th>
								<th>Tanggal Keluar</th>
								<th>Jumlah Barang</th>
								<th>Satuan</th>
								<!-- <th>Action</th> -->
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($data_mentah_out->result() as $row):?>
					   <tr>
									<td><?php echo $i++ ?></td>
									<td><?= $row->kode_barang ?></td>
									<td><?= $row->jenis_barang ?></td>
									<td><?= $row->motif_barang ?></td>
									<td><?= $row->nama_pemaklun?></td>
									<td><?= $row->tgl_keluar?></td>
									<td><?= $row->jml_barang?></td>
									<td><?= $row->satuan ?></td>
											  <!-- <td>
											<a href="<?= site_url('mentah_out/updatementah_out/'.$row->kode_barang) ?>">
											 	<span style="font-size: 25px; color:blue; margin-right: 10px;"> <i class="fa fa-edit"></i>
												</span>	
											</a>
										
											 <a href="<?= site_url('mentah_out/delete/'.$row->kode_barang) ?>">
											 	<span style="font-size: 25px; color:red; margin-left: 10px;"> <i class="fa fa-trash"></i>
												</span>	
											 </a>
											  </td> -->
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