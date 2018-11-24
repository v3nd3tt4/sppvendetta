<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Daftar Kelas
            <a href="<?php echo site_url('admin/kelas/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
        </h3><br>
        <span class="pull-right">
            <a class="btn btn-sm btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><span class="glyphicon glyphicon-align-justify"></span></a>               
        </span>
    </h3>       
</h3>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="gradient">
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Tarif SPP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php		
        $i=1;		
        if (!empty($kelas)) {
            foreach ($kelas as $row) {
                ?>
                <tbody>
                    <tr>
                        <td ><?php echo $i ?></td>
                        <td ><?php echo $row['kelas_ket']; ?></td>
                        <td ><?php echo $row['kelas_tarif']; ?></td>
                        <td>
                            <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/kelas/edit/' . $row['kelas_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                        </tr>
                    </tbody> <?php $i++;?>
                    <?php
                }
            } else {
                ?>
                <tbody>
                    <tr id="row">
                        <td colspan="5" align="center">Data Kosong</td>
                    </tr>
                </tbody> 
                <?php 
            }
            ?>   
        </table>
    </div>
    <div >
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
</div>
