<div class="main">
<div class="container">
    <div class="row">
<legend><?php echo $title;?></legend>
<div class="form-horizontal">
<form action="<?php echo base_url()?><?php echo $fungsi;?>" method="POST">
        <div class="form-group">
           <label class="col-sm-0 control-label">Nama Pelapak</label>
               <select class="form-control " name="nama_pelapak" data-placeholder="Pilih..." >
                       <option value="" disabled diselected>-- Pilih Pelapak --</option>
                         <?php                                
                          foreach ($dd_bidang as $row) {  
                              echo "<option value='".$row->nama_pelapak."'>".$row->nama_pelapak."</option>";
                          }
                    ?>
            </select>
        </div>
    
    <div class="form-group">
        <label for="tanggal3">Tanggal</label>
        <div class="col-lg-0">
            <input type="date" name="tanggal2" id="tgl3" class="form-control">
        </div>
    </div>
          <a class="btn btn-default" href="<?= site_url('jadi_out') ?>">Kembali</a>    
          <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>
</div>
<div id="tampil"></div>
</div>
</div>
</div>
