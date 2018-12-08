<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">
        <h3 class="">
            Laporan Transaksi SPP Per Tanggal
            
        </h3>
        <br>
        <form method="POST" action="<?=base_url()?>laporan/proses_laporan_spp_pertgl">
            <div class="form-group">
                <label>Tanggal:</label>
                <input type="date" class="form-control" name="tgl">
            </div>
            
            <button class="btn btn-primary">Proses</button>
        </form>

        
    
    </div>
</div>
