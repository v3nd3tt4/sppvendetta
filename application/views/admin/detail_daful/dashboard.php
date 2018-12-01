<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Setting Detail Pembayaran Daftar Ulang
            <a href="<?php echo base_url('detail_daful/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>
        <br>
<!--
        <span class="pull-right">
            <a class="btn btn-sm btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-align-justify"></span></a>               
        </span>
-->
        <br>

        <div class="table-responsive">
            <table class="table table-striped datatable">
                <thead class="gradient">
                    <tr>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php		
                $i=1;		
                if (!empty($list_detail_daful)) {
                    foreach ($list_detail_daful as $row) {
                        ?>
                        
                            <tr>
                                <td ><?php echo $i ?>.</td>
                                <td ><?php echo $row->nama_detail_pembayaran; ?></td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="<?php echo base_url('detail_daful/edit/' . $row->id_detail_daftar_ulang); ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url('detail_daful/remove/' . $row->id_detail_daftar_ulang ); ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" ><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                             <?php $i++;?>
                            <?php
                        }
                    } else {
                        ?>
                        
                            <tr id="row">
                                <td colspan="5" align="center">Data Kosong</td>
                            </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    
    </div>
</div>
