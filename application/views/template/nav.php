<?php
$notif = count($this->myigniter_model->getNotification('barang'));
header('Last-Modified:'.  gmdate('D, d M Y H:i:s').'GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache');
?>
<nav class="menuku">
    <div class="dropdown">
    <ul>
        <?php 
        if ($user['level'] == 'admin') { ?>
            <li><a href="#tutup"><i class="fa fa-close fa-2x close-menu"></i></a></li>
            <li><a href="<?= base_url('kelolauser') ?>"><img src="<?php echo base_url('assets/css/gambar/user.png') ?>" height="42" width="42" class="gambar"> USER </a></span> </li>
            <li><a href="<?= base_url('pemaklun') ?>"><img src="<?php echo base_url('assets/css/gambar/pemaklun.png') ?>" height="42" width="42" class="gambar gambarz"> PEMAKLUN <span class="gambar gambar-2"></span></a></li>
            <li class="dropdown-submenu dropdown-toggle dropdown-toggle-split">
            <a class="test" tabindex="-1" href="#">  <img src="<?php echo base_url('assets/css/gambar/masuk.png') ?>" height="42" width="42" class="gambar"> Barang Masuk<span class="caret"></span></a>
            <ul>
            <li><a href="<?= base_url('mentah_in') ?> "> Barang Mentah <span class="gambar gambar-3"></span></a></li>
            <li><a href="<?= base_url('jadi_in') ?> "> Barang Jadi <span class="gambar gambar-3"></span></a></li>
            </ul>
            </li>
            </li>
            <li class="dropdown-submenu dropdown-toggle dropdown-toggle-split">
            <a class="test" tabindex="-1" href="#">  <img src="<?php echo base_url('assets/css/gambar/keluar.png') ?>" height="42" width="42" class="gambar"> Barang Keluar<span class="caret"></span></a>
            <ul>
            <li><a href="<?= base_url('mentah_out') ?>">Barang Mentah</a></li>
            <li><a href="<?= base_url('jadi_out') ?>">Barang Jadi</a></li>
            </ul>
            </li>


			<li><a href="<?= base_url('retur') ?>"><img src="<?php echo base_url('assets/css/gambar/return.png') ?>" height="42" width="42" class="gambar"> RETURN </a></span> </li>

            <li><a href="<?= base_url('kredit') ?>"> <img src="<?php echo base_url('assets/css/gambar/cc.png') ?>" height="42" width="42" class="gambar"> Kredit</a></li>
            <li><a href="<?= base_url('artikel') ?>"> <img src="<?php echo base_url('assets/css/gambar/artikel.png') ?>" height="42" width="42" class="gambar"> Kelola Artikel</a></li>

            <li><a href="<?= base_url('bahan') ?>"> <img src="<?php echo base_url('assets/css/gambar/artikel.png') ?>" height="42" width="42" class="gambar"> Kelola Bahan</a></li>

            <li><a href="<?= base_url('Laporan') ?>"><img src="<?php echo base_url('assets/css/gambar/report.png') ?>" height="42" width="42" class="gambar"> LAPORAN </a></span> </li>


            <li><a href="<?= base_url('login/logout') ?>"> <img src="<?php echo base_url('assets/css/gambar/logout.png') ?>" height="42" width="42" class="gambar"> LOGOUT <span class="gambar gambar-4"></span></a></li>
        <?php } elseif ($user['level'] == 'user') { ?>
            <li class="dropdown-submenu dropdown-toggle dropdown-toggle-split">
            <a class="test" tabindex="-1" href="#">  <img src="<?php echo base_url('assets/css/gambar/masuk.png') ?>" height="42" width="42" class="gambar"> Barang Masuk<span class="caret"></span></a>
            <ul>
            <li><a href="<?= base_url('mentah_in') ?> "> Barang Mentah <span class="gambar gambar-3"></span></a></li>
            <li><a href="<?= base_url('jadi_in') ?> "> Barang Jadi <span class="gambar gambar-3"></span></a></li>
            </ul>
            </li>
            </li>
            <li class="dropdown-submenu dropdown-toggle dropdown-toggle-split">
            <a class="test" tabindex="-1" href="#">  <img src="<?php echo base_url('assets/css/gambar/keluar.png') ?>" height="42" width="42" class="gambar"> Barang Keluar<span class="caret"></span></a>
            <ul>
            <li><a href="<?= base_url('mentah_out') ?>">Barang Mentah</a></li>
            <li><a href="<?= base_url('jadi_out') ?>">Barang Jadi</a></li>
            </ul>
            </li>

            <li><a href="<?= base_url('login/logout') ?>"> <img src="<?php echo base_url('assets/css/gambar/logout.png') ?>" height="42" width="42" class="gambar"> LOGOUT <span class="gambar gambar-4"></span></a></li>


        <?php } elseif ($user['level'] == 'manajer') { ?>
            <li><a href="<?= base_url('Laporan') ?>"><img src="<?php echo base_url('assets/css/gambar/report.png') ?>" height="42" width="42" class="gambar"> LAPORAN </a></span> </li>
            <li><a href="<?= base_url('login/logout') ?>"> <img src="<?php echo base_url('assets/css/gambar/logout.png') ?>" height="42" width="42" class="gambar"> LOGOUT <span class="gambar gambar-4"></span></a></li>
        <?php } ?> 
    </ul>
    </div>
</nav>

<!-- Header -->
<header>
    <i class="fa fa-bars fa-2x pull-left menu"></i>
    <div class="container">
        <div class="col-lg-12 text-center">
            <h1><?= $judule ?></h1>
        </div>
    </div>
</header>