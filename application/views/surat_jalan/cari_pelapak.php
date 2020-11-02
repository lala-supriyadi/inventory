  <div class="main">
<div class="container">
    <div class="row">
    <div id="div1">
<table border="1" class="table table-striped dataTables-example" id="tablejadi_out" style="border-collapse: collapse; width:80%; text-align: center;margin-left: 15%;">
    <thead>
    <tr style="background-color: #b8b894;">
        <th>No</th>
        <th>Kode Barang</th>
        <th>Jenis Barang</th>
        <th>Model Barang</th>
        <th>Motif Barang</th>
        <th>Nama Pelapak</th>
        <th>Tanggal keluar</th>
        <th>Jumlah Barang</th>
    </tr>
    </thead>
    <tbody id="myTable">
    <?php
        $i = 1;
        foreach($lap as $s){
        $c = $i++;
        ?>
        <tr style="text-align: left;">
          <td><?php echo $c?></td>
          <td><?php echo $s->kode_barang?></td>
          <td><?php echo $s->jenis_barang?></td>
          <td><?php echo $s->model_barang?></td>
          <td><?php echo $s->motif_barang?></td>
          <td><?php echo $s->nama_pelapak?></td>
          <td><?php echo $s->tgl_keluar?></td>
          <td><?php echo $s->jml_barang?></td>
        <?php
        }
        ?>
      </tr> 
      </tbody> 
</table>
</div>
    <button class="btn btn-info btn-lg" value="Print dan Preview" id="print" data-nama_pelapak="<?php echo $nama_pelapak; ?>" data-tgl_keluar="<?php echo $tgl_selesai; ?>"><span class="fa fa-print"> Print</span></button>
</div>
</div>
</div>
<script type="text/javascript">
  $(document)
              .on('click','#print',function(){
                 window.open(base_url('surat_jalan/print_laporan/')+$(this).data('nama_pelapak')+'/'+$(this).data('tgl_keluar'));
              }) 
  
</script>