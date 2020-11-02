<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<a class="btn btn-primary" href="<?= site_url('artikel/tambahartikel') ?>">
					<i class="fa fa-plus"></i> Tambah Artikel</a>
				<br>
				<br>
				
		<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped" id="dataTables-example">
						<thead>
							<tr>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Jenis barang</th>
							<th>Model Barang</th>
							<th>Motif Barang</th>
							<th>Size</th>
							<th>Gambar</th>
							<th>Stok</th>
							<th>Action</th>
							<th>Masuk</th>
							<th>Keluar</th>
							</tr>
						</thead>
						<?php 
						$i=1;
						foreach ($data_artikel->result() as $row):?>
					    <tr>
					   				<td><?= $i ++ ?></td>
					   				<!-- <td><?php= echo $i + $offset; ?></td> -->
									<td><?= $row->kode_barang?></td>
									<td><?= $row->jenis_barang ?></td>
									<td><?= $row->model_barang ?></td>
									<td><?= $row->motif_barang ?></td>
									<td><?= $row->size ?></td>
									
									<td><img src="<?php echo base_url() ?>./upload/gambar/<?php echo $row->gambar ?>" class="image image-responsive" height="50" width="50"> 
									<div class="details" >
                        			<a href="<?php echo base_url() ?>./upload/gambar/<?php echo $row->gambar ?>"><?php echo "+" ?></a> 
                   					</div>
                   					</td>
									<td><?= $row->stok ?></td>

									<td>
									<a href="<?= site_url('artikel/updateartikel/'.$row->kode_barang) ?>">
										<span style="font-size: 25px; color:blue; margin-right: 10px;"> <i class="fa fa-edit"></i></span></a>
									<a href="<?= site_url('artikel/delete/'.$row->kode_barang) ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
										<span style="font-size: 25px; color:red; margin-left: 10px;"> <i class="fa fa-trash"></i></span></a>
								    </td>
								    <td><a href="<?= site_url('jadi_in/tambahjadi_in/' .$row->kode_barang) ?>"> 
								  	  	<span style="font-size: 25px; color:limegreen; margin-left: 10px;"> <i class="fa fa-plus-circle"></i></span></a>
								    </td>
								    <td><a href="<?= site_url('jadi_out/tambahjadi_out/' .$row->kode_barang) ?>"> 
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