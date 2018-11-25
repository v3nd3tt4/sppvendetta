<!--sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="<?php echo base_url() ?>welcome"><i class="fa fa-home"></i> Dashboard</a>
                
            </li>
        </ul>

        <ul class="nav side-menu">
            <li><a><i class="fa fa-calendar"></i> Tahun Ajaran <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/thn_ajaran') ?>">List Tahun Ajaran</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-users"></i> Siswa <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/siswa') ?>">Daftar Siswa</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-users"></i> Jenis Pembayaran <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/siswa') ?>">Daftar Jenis Pembayaran</a>
                    </li>
                    <!-- <li><a href="<?php echo site_url('admin/siswa') ?>">Detail Jenis Pembayaran</a>
                    </li> -->
                </ul>
            </li>
        </ul>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-money"></i> Pembayaran <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo site_url('admin/trx_spp') ?>">Pembayaran SPP</a>
                    </li>
                    <li><a href="<?php echo site_url('admin/jns_byr') ?>">Jenis Pembayaran</a>
                    </li>
                </ul>
            </li>
        </ul>         
        
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