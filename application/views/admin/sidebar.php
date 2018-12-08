<!--sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="<?php echo base_url() ?>welcome"><i class="fa fa-home"></i> Dashboard</a>
                
            </li>
        </ul>

        <!-- <ul class="nav side-menu">
            <li><a><i class="fa fa-calendar"></i> Tahun Ajaran <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url()?>tahun_ajaran">List Tahun Ajaran</a>
                    </li>
                </ul>
            </li>
        </ul>    -->     
        <ul class="nav side-menu">
            <li><a><i class="fa fa-building"></i> Kelas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url() ?>kelas">List Kelas</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-credit-card"></i> Jenis Pembayaran <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url() ?>jenis_pembayaran">List Jenis Pembayaran</a>
                    </li>
                    <li><a href="<?php echo base_url() ?>detail_daful/list_detail_daful">Detail Jenis Pembayaran Daftar Ulang</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-users"></i> Siswa <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url() ?>siswa">Daftar Siswa</a>
                    </li>
                </ul>
            </li>
        </ul>
        
        <ul class="nav side-menu">
            <li><a><i class="fa fa-money"></i> Pembayaran <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('pembayaran/setting_pembayaran_spp') ?>">Pembayaran SPP</a>
                    </li>
                    <li><a href="<?php echo base_url('pembayaran_daful') ?>">Pembayaran Daftar Ulang</a>
                    </li>
                </ul>
            </li>
        </ul>     

        <ul class="nav side-menu">
            <li><a><i class="fa fa-print"></i> Laporan SPP<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('laporan/laporan_spp_perhari') ?>">Laporan Transaksi SPP Per Periode</a>
                    </li>
                    <li><a href="<?php echo base_url('laporan/laporan_spp_pertgl') ?>">Laporan Transaksi SPP Per Tanggal</a>
                    </li>
                </ul>
            </li>
        </ul> 

        <ul class="nav side-menu">
            <li><a><i class="fa fa-print"></i> Laporan Daftar Ulang<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('laporan/laporan_daful_perhari') ?>">Laporan Transaksi Daftar Ulang Per Periode </a>
                    </li>
                    <li><a href="<?php echo base_url('laporan/laporan_daful_pertgl') ?>">Laporan Transaksi Daftar Ulang Per Tanggal </a>
                    </li>
                </ul>
            </li>
        </ul> 
        <!--<ul class="nav side-menu">
            <li><a><i class="fa fa-database" aria-hidden="true"></i> Database <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('backup/backupdatabase') ?>">Backup Database</a>
                    </li>
                    
                </ul>
            </li>
        </ul>    -->         
        
        <!-- <ul class="nav side-menu">
            <li><a><i class="fa fa-user-md"></i> User Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/user') ?>">List User</a>
                    </li>
                </ul>
            </li>
        </ul> -->
    </div>
</div>
<!-- /sidebar menu