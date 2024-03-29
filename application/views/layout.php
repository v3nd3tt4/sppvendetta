<!DOCTYPE html>
<html lang="en" ng-app>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Informasi Pembayaran SPP</title>
        <link rel="icon" href="<?php echo media_url('ico/favicon.jpg'); ?>" type="image/x-icon">

        <!-- Bootstrap core CSS -->

        <link href="<?php echo media_url() ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo media_url() ?>/css/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo media_url() ?>/css/jquery-ui.structure.min.css" rel="stylesheet">
        <link href="<?php echo media_url() ?>/css/jquery-ui.theme.min.css" rel="stylesheet">

        <link href="<?php echo media_url() ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo media_url() ?>/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo media_url() ?>/css/custom.css" rel="stylesheet">
        <link href="<?php echo media_url(); ?>/dataTable/media/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo media_url(); ?>/dataTable/media/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="<?php echo media_url() ?>/js/jquery.min.js"></script>
        <script src="<?php echo media_url(); ?>/js/angular.min.js"></script>
        <script src="<?php echo media_url(); ?>/js/mm.js"></script>
        <script src="<?php echo media_url(); ?>/dataTable/media/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo media_url(); ?>/dataTable/media/js/dataTables.bootstrap.min.js"></script>
        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

        <script type="text/javascript">
            $(document).ready(function(){
                $('.datatable').DataTable();
                $(document).on('click', '.btn_bayar_transaksi', function(e){
                    e.preventDefault();
                    //alert('danger');
                    var id = $(this).attr('id');
                    $('#modal_pembayaran').modal();
                    $.ajax({
                        url : '<?=base_url()?>pembayaran/getkwitansi',
                        type: 'POST',
                        data: 'id='+id,
                        success: function(msg){
                            $('#result_pembayaran').html(msg);
                        }

                    });
                });
                $(document).on('submit', '#form_transaksi_pembayaran_spp', function(e){
                    e.preventDefault();
                    $('#notif_transaksi_pembayaran_spp').html('Loading...');
                    var data = $('#form_transaksi_pembayaran_spp').serialize();
                    $.ajax({
                        url : '<?=base_url()?>pembayaran/proses_pemabayaran_spp',
                        type: 'POST',
                        data: data,
                        success: function(msg){
                            $('#notif_transaksi_pembayaran_spp').html(msg);
                        }
                    });
                });

                $(document).on('submit', '#form_transaksi_pembayaran_daful', function(e){
                    e.preventDefault();
                    $('#notif_transaksi_pembayaran_daful').html('Loading...');
                    var data = $('#form_transaksi_pembayaran_daful').serialize();
                    $.ajax({
                        url : '<?=base_url()?>pembayaran_daful/proses_pembayaran_daful',
                        type: 'POST',
                        data: data,
                        success: function(msg){
                            $('#notif_transaksi_pembayaran_daful').html(msg);
                        }
                    });
                });

                $(document).on('click', '.tambah_detail_daful', function(e){
                    e.preventDefault();
                    var id_detail_daful = $('#jenis_detail_daful').val();
                    var biaya_detail_daful = $('#biaya_detail_daful').val();
                    var nama_detail_daful = $('#jenis_detail_daful').find(":selected").text();
                    html = '';
                    html += '<tr>';
                    html += '<td><input type="hidden" name="id_detail_daful_plus[]" readonly type="text" value="'+id_detail_daful+'">'+nama_detail_daful+'</td>';
                    html += '<td><input type="hidden" name="biaya_detail_daful_plus[]" readonly type="text" value="'+biaya_detail_daful+'">'+biaya_detail_daful+'</td>';
                    html += '<td><button class="btn btn-xs btn-danger btn_hapus_detail_daful">hapus</button></td>';
                    html += '</tr>';
                    $('.tb_list_detail_daful tbody').append(html);
                });
                $(document).on('click', '.btn_hapus_detail_daful', function(e){
                    e.preventDefault();
                    $(this).closest("tr").remove(); 
                });

                $(document).on('click', '.btn_bayar_transaksi_daful', function(e){
                    e.preventDefault();
                    var id = $(this).val();
                    $('#result_pembayaran_daful').html('Loading...');
                    $('#modal_pembayaran_daful').modal();
                    $.ajax({
                        url : '<?=base_url()?>pembayaran_daful/getkwitansi',
                        type: 'POST',
                        data: 'id='+id,
                        success: function(msg){
                            $('#result_pembayaran_daful').html(msg);
                        }

                    });
                });

                $(document).on('click', '.btn_bayar_transaksi_cicilan', function(e){
                    e.preventDefault();
                    var id = $(this).attr('id');
                    $('#result_pembayaran_cicilan').html('Loading...');
                    $('#modal_pembayaran_cicilan').modal();
                    $.ajax({
                        url : '<?=base_url()?>pembayaran/getkwitansi_cicilan',
                        type: 'POST',
                        data: 'id='+id,
                        success: function(msg){
                            $('#result_pembayaran_cicilan').html(msg);
                        }

                    });
                });

                $(document).on('submit', '#form_transaksi_pembayaran_spp_cicilan', function(e){
                    e.preventDefault();
                    $('#notif_transaksi_pembayaran_spp_cicilan').html('Loading...');
                    var data = $('#form_transaksi_pembayaran_spp_cicilan').serialize();
                    $.ajax({
                        url : '<?=base_url()?>pembayaran/proses_pemabayaran_spp_cicilan',
                        type: 'POST',
                        data: data,
                        success: function(msg){
                            $('#notif_transaksi_pembayaran_spp_cicilan').html(msg);
                        }
                    });
                });

                $(document).on('click', '.btn_tambah_siswa_spp', function(e){
                    e.preventDefault();
                    $('#modal_tambah_siswa_spp').modal();
                });

            });
            var BASEURL = '<?php echo base_url() ?>';
        </script>

    </head>


    <body class="nav-md">

        <div class="container body">


            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo site_url('admin') ?>" class="site_title"><i class="fa fa-windows"></i> <span>Aplikasi SPP</span></a>
                        </div>
                        <div class="clearfix"></div>

                        <br />

                        <?php $this->load->view('admin/sidebar') ?>
                        <!-- /menu footer buttons -->
                        <!-- <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            
                            <input type="hidden" name="location" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                            <a onclick="document.getElementById('formLogout').submit()" type="submit" data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div> -->
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <?php
                    if ($this->session->flashdata('success')) {
                        $data['message'] = $this->session->flashdata('success');
                        $this->load->view('admin/notification_success', $data);
                    }
                    if ($this->session->flashdata('failed')) {
                        $data['message'] = $this->session->flashdata('failed');
                        $this->load->view('admin/notification_failed', $data);
                    }
                    ?>

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <!-- <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo media_url() ?>/images/user.png" alt=""><?php echo $text = ucfirst($this->session->userdata('user_full_name')); ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                        <li><a href="<?php echo site_url('admin/dashboard') ?>">  Home</a>
                                        </li>
                                        <li><a href="<?php echo site_url('admin/profile') ?>">  Profile</a>
                                        </li>
                                        <li>&nbsp;</li>
                                        <li>
                                        <center>
                                            <input type="hidden" name="location" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                                            <button class="btn btn-xs btn-danger" id="btn-lgout" type="submit">
                                                <i class="fa fa-sign-out pull-right"></i> Log out
                                            </button>
                                        </center>  
                                        </li>
                                        <li>&nbsp;</li>
                                    </ul>
                                </li>
                            </ul> -->
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="row">

                        <?php isset($main) ? $this->load->view($main) : null; ?>

                        <!-- footer content -->
<!--
                        <footer class="bottom">
                            <div class="">
                                <p class="pull-right">&copy; <?php echo pretty_date(date('Y-m-d'), 'Y',FALSE) ?> Content Management System
                                </p>
                            </div>
                            <div class="clearfix"></div>
                        </footer>
-->
                        <!-- /footer content -->

                    </div>

                </div>
            </div>

            <div id="custom_notifications" class="custom-notifications dsp_none">
                <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
                </ul>
                <div class="clearfix"></div>
                <div id="notif-group" class="tabbed_notifications"></div>
            </div>

            <script src="<?php echo media_url() ?>/js/bootstrap.min.js"></script>
            <script src="<?php echo media_url() ?>/js/jquery-ui.min.js"></script>

            <script src="<?php echo media_url() ?>/js/custom.js"></script>
            <script src="<?php echo media_url() ?>/js/jquery.nicescroll.min.js"></script>


    </body>

</html>