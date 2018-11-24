<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Jenis Pembayaran
            <a href="<?php echo site_url('admin/jns_byr/add'); ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
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
                <th>Jenis Pembayaran</th>
                <th>Tarif Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php		
        $i=1;		
        if (!empty($jns_byr)) {
            foreach ($jns_byr as $row) {
                ?>
                <tbody>
                    <tr>
                        <td ><?php echo $i ?></td>
                        <td ><?php echo $row['jns_byr_ket']; ?></td>
                        <td ><span class="cap"><?php echo $row['jns_byr_tarif']; ?></span></td>
                        <td>
                            <a class="btn btn-success btn-xs" href="<?php echo site_url('admin/jns_byr/edit/' . $row['jns_byr_id']); ?>" ><span class="glyphicon glyphicon-edit"></span></a>
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

<style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
</style>
