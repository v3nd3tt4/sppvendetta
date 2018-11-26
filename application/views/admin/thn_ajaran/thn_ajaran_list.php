<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Tahun Ajaran
            <a href="<?php echo base_url('tahun_ajaran/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
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
                        <th>Tahun Ajaran</th>
                        <th>Keteragan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php		
                $i=1;		
                if (!empty($thn_ajaran)) {
                    foreach ($thn_ajaran as $row) {
                        ?>
                        
                            <tr>
                                <td ><?php echo $i ?>.</td>
                                <td ><?php echo $row->nama_tahun_ajaran; ?></td>
                                <td ><?php echo $row->keterangan; ?></td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="<?php echo base_url('tahun_ajaran/edit/' . $row->id_tahun_ajaran); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url('tahun_ajaran/remove/' . $row->id_tahun_ajaran); ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" ><span class="glyphicon glyphicon-trash"></span></a>
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
