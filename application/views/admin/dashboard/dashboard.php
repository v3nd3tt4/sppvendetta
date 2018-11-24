<div class="col-md-12 col-sm-12 col-xs-12 main post-inherit">
    <div class="x_panel post-inherit">

        <!-- Indicates a successful or positive action -->

        <div class="strong">
            <h1>Dashboard
              <p>Web Based Application </p></h1>
         

<br><br><br>
<br>
<strong><?php echo $this->session->userdata('user_name'); ?> (<?php echo $this->session->userdata('user_full_name'); ?>) </strong>
<br>
<?php echo pretty_date(date('Y-m-d'), 'l, d F Y',FALSE) ?> 
</div>
</div>
</div>
<style type="text/css">
 .upper { text-transform: uppercase; }
 .lower { text-transform: lowercase; }
 .cap   { text-transform: capitalize; }
 .small { font-variant:   small-caps; }
</style>