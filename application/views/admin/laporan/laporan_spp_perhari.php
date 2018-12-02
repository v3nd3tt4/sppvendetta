<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Laporan Transaksi SPP
            
        </h3>
        <br>
        <form method="POST" action="<?=base_url()?>laporan/proses_laporan_spp">
            <div class="form-group">
                <label>Dari:</label>
                <input type="date" class="form-control" name="dari">
            </div>
            <div class="form-group">
                <label>Sampai:</label>
                <input type="date" class="form-control" name="sampai">
            </div>
            <button class="btn btn-primary">Proses</button>
        </form>

        
    
    </div>
</div>
