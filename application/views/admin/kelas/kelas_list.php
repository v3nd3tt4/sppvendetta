<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Kelas
            <a href="<?php echo base_url('kelas/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3>
        <br>
<!--
        <span class="pull-right">
            <a class="btn btn-sm btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-align-justify"></span></a>               
        </span>
-->
        <br>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="gradient">
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
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
                                <td ><?php echo $row->nama_kelas; ?></td>
                                <td ><?php echo $row->keterangan; ?></td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="<?php echo base_url('kelas/edit/' . $row->id_kelas); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                                    <a class="btn btn-danger btn-xs" href="<?php echo base_url('kelas/remove/' . $row->id_kelas); ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" ><span class="glyphicon glyphicon-trash"></span></a>
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
