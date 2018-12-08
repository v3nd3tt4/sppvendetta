<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_daful extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct(){
        parent::__construct();
        $this->load->model('Model');
    }
    
	public function index()
	{
		$data = array(
			'main' => 'admin/pembayaran_daful/dashboard',
            'thn_ajaran' => $this->Model->list_data_all('tb_kelas'),
            'set_spp' => $this->Model->list_data_all('tb_set_daftar_ulang'),
		);
		$this->load->view('layout', $data);
	}

	public function add_setting_pembayaran_daful(){
        $data = array(
			'main' => 'admin/pembayaran_daful/setting_pembayaran_spp1',
            'kelas' => $this->Model->list_data_all('tb_kelas'),
		);
		$this->load->view('layout', $data);
    }

    public function add_setting_pembayaran_daful1(){
        $keterangan = $this->input->post('keterangan', true);
        $kelas = $this->input->post('kelas', true);
        $dari = $this->input->post('dari', true);
        $sampai = $this->input->post('sampai', true);
        $data = array(
			'main' => 'admin/pembayaran_daful/setting_pembayaran_daful2',    
            'keterangan' => $keterangan,
            'kelas' => $this->Model->list_data_all('tb_kelas'),
            'dari' => $dari,
            'sampai' => $sampai,
            'id_kelas' => $kelas,
            'list_siswa' => $this->Model->get_data('tb_siswa', array('id_kelas' => $kelas)),
            'list_detail_daful' => $this->Model->list_data_all('tb_detail_daftar_ulang'),
		);
		$this->load->view('layout', $data);
    }

    public function store(){
    	$this->db->trans_begin();
    	$data1 = array(
    		'keterangan' => $this->input->post('keterangan', true),
    		'dari' => $this->input->post('dari', true),
    		'sampai' => $this->input->post('sampai', true),
    		'id_kelas' => $this->input->post('kelas', true),
    		'max_angsuran' => $this->input->post('max_cicilan', true),
    		'biaya_daful' => $this->input->post('biaya_daful', true),
    	);
    	$this->db->insert('tb_set_daftar_ulang', $data1);
    	$id_set_daftar_ulang = $this->db->insert_id();
    	// $id_set_daftar_ulang = 1;
    	$data2 = array();
    	for($i=0;$i<count($this->input->post('id_siswa', true));$i++){
    		$data2[] = array(
    			'id_set_daftar_ulang' => $id_set_daftar_ulang,
    			'id_siswa' => $this->input->post('id_siswa', true)[$i]
    		);
    	}
    	$this->db->insert_batch('tb_siswa_di_pembayaran_daful', $data2);
    	
    	$data3 = array();
    	for($i=0;$i<count($this->input->post('id_detail_daful_plus', true));$i++){
    		$data3[] = array(
    			'id_set_daftar_ulang' => $id_set_daftar_ulang,
    			'id_detail_daftar_ulang' => $this->input->post('id_detail_daful_plus', true)[$i],
    			'nominal_bayar' => $this->input->post('biaya_detail_daful_plus', true)[$i]
    		);
    	}
    	$this->db->insert_batch('tb_detail_set_daftar_ulang', $data3);
    	if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo '<script>alert("data gagal disimpan");window.history.back();</script>';
        }
        else
        {
            $this->db->trans_commit();
            echo '<script>alert("data berhasil disimpan");window.location.href = "'.base_url().'pembayaran_daful";</script>';
        }
    }

    public function detail($id){
    	$query = $this->Model->get_data('tb_set_daftar_ulang', array('id_set_daftar_ulang' => $id));

    	$query_list_siswa = $this->Model->kueri("select * from tb_siswa_di_pembayaran_daful join tb_siswa on tb_siswa_di_pembayaran_daful.id_siswa = tb_siswa.id_siswa where tb_siswa_di_pembayaran_daful.id_set_daftar_ulang = '$id'");

    	$query_list_detail_daful = $this->Model->kueri("select * from tb_detail_set_daftar_ulang join tb_detail_daftar_ulang on tb_detail_set_daftar_ulang.id_detail_daftar_ulang = tb_detail_daftar_ulang.id_detail_daftar_ulang where tb_detail_set_daftar_ulang.id_set_daftar_ulang = '$id'");
    	$data = array(
    		'main' => 'admin/pembayaran_daful/detail_pembayaran_daful',
			'row_data' => $query,
            'list_siswa' => $query_list_siswa,
            'list_detail_daful' => $query_list_detail_daful,
            'kelas' => $this->Model->list_data_all('tb_kelas'),
		);
		$this->load->view('layout', $data);
    }

    public function transaksi_daful($id_siswa, $id_set_daftar_ulang){
    	$query = $this->Model->get_data('tb_set_daftar_ulang', array('id_set_daftar_ulang' => $id_set_daftar_ulang));
    	$query_siswa = $this->Model->get_data('tb_siswa', array('id_siswa' => $id_siswa));
    	$data = array(
    		'main' => 'admin/pembayaran_daful/transaksi_pembayaran_daful',
			'row_data' => $query,
            'list_siswa' => $query_siswa,  
            'kelas' => $this->Model->list_data_all('tb_kelas'),
            'transaksi_pembayaran_daful' => $this->Model->kueri("select * from tb_transaksi_pembayaran_daful where id_siswa = '$id_siswa' and id_set_daftar_ulang = '$id_set_daftar_ulang' order by id_transaksi_pembayaran_daful DESC")
		);
		$this->load->view('layout', $data);
    }

    public function getkwitansi(){
        $id = $this->input->post('id', true);
        $acak = rand(10, 99);
        $nokwitansi =  date('YmdHis').$acak;
        $pecah = explode('_', $id);
        $id_siswa = $pecah[0];
        $id_set_daftar_ulang = $pecah[1];
        $query = $this->Model->get_data('tb_set_daftar_ulang', array('id_set_daftar_ulang' => $id_set_daftar_ulang));
        $data = array(
            // 'main' => 'transaksi_bayar_spp',
            'row' => $query,
            'id_siswa' => $id_siswa,
            'id_set_daftar_ulang' => $id_set_daftar_ulang,
            'no_kwitansi' => $nokwitansi,
        );
        $this->load->view('admin/pembayaran_daful/transaksi_bayar_daful', $data);
    }

    public function proses_pembayaran_daful(){
        $id_set_daftar_ulang = $this->input->post('id_set_daftar_ulang');
        $id_siswa = $this->input->post('id_siswa');
        $getbiayadaful = $this->Model->get_data('tb_set_daftar_ulang', array('id_set_daftar_ulang' => $this->input->post('id_set_daftar_ulang')));
        $biaya_daful = $getbiayadaful->row()->biaya_daful;
        $getsudahdibayar = $this->Model->kueri("select sum(jumlah_bayar) as sudah_dibayar from tb_transaksi_pembayaran_daful where id_set_daftar_ulang ='$id_set_daftar_ulang' and id_siswa = '$id_siswa'");
        $sudah_dibayar = $getsudahdibayar->row()->sudah_dibayar;
        if($biaya_daful == $sudah_dibayar){
            echo '<script>alert("Tidak diperbolehkan karena daftar ulang sudah lunas");location.reload();</script>';
            exit();
        }
    	$data = array(
            'no_kwitansi' => $this->input->post('no_kwitansi'),
            'jumlah_bayar' => $this->input->post('nominal_bayar'),
            'tanggal_transaksi' => date('Y-m-d', strtotime($this->input->post('tgl_trx'))).' '.date('H:i:s'),
            'status' => 'sudah bayar',
            'id_siswa' => $this->input->post('id_siswa'),
            'id_set_daftar_ulang' => $this->input->post('id_set_daftar_ulang')
        );
        $simpan = $this->Model->simpan_data($data, 'tb_transaksi_pembayaran_daful');
        // $update = $this->Model->update_data('tb_transaksi_pembayaran_daful', $data, array('id_transaksi_pembayaran_daful' => $this->input->post('id_transaksi_spp')));
        if($simpan){
            echo '<script>alert("data berhasil disimpan");location.reload();</script>';
        }else{
            echo '<script>alert("data gagal disimpan");location.reload();</script>';
        }
    }

     public function cetak_laporan_cicilan($id_set_daftar_ulang){
        $query = $this->Model->kueri("select * from tb_set_daftar_ulang where id_set_daftar_ulang = '$id_set_daftar_ulang'");
        $query2 = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where id_set_spp = '$id_set_daftar_ulang' group by tb_transaksi_pembayaran_spp.id_siswa");
        
        $query3 = $this->Model->kueri("select count(*) as jumlah from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where id_set_spp = '$id_set_daftar_ulang' group by tb_transaksi_pembayaran_spp.id_siswa limit 1");

        $data = array(
            'tb_set_daful' => $query,
            'tb_transaksi_pembayaran_daful' => $query2,
            'list_siswa' => $this->Model->kueri("select * from tb_siswa_di_pembayaran_daful join tb_siswa on tb_siswa_di_pembayaran_daful.id_siswa = tb_siswa.id_siswa where id_set_daftar_ulang = '$id_set_daftar_ulang'"),
            'total' => $query3,
            'loop_bln_thn' => $this->cek_month1($query->row()->dari, $query->row()->sampai),
        
        );

        $this->load->view('admin/pembayaran_daful/laporan_cicilan', $data);
    }

    public function cek_month1($dari, $sampai){
        // Set timezone
        date_default_timezone_set('UTC');

        // Start date
        $date = $dari;
        // End date
        $end_date = $sampai;
        $tgl = array();
        while (strtotime($date) <= strtotime($end_date)) {
            $tgl [] =  array(
                'month' => date("m", strtotime($date)),
                'year' => date("Y", strtotime($date)),
            );
            $date = date ("Y-m-d", strtotime("+1 month", strtotime($date)));
        }
        return json_encode($tgl);
    }

    public function cetak_laporan_pembagi($id_set_daftar_ulang){
        $query = $this->Model->kueri("select * from tb_set_daftar_ulang where id_set_daftar_ulang = '$id_set_daftar_ulang'");
        $query2 = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where id_set_spp = '$id_set_daftar_ulang' group by tb_transaksi_pembayaran_spp.id_siswa");
        
        $query3 = $this->Model->kueri("select count(*) as jumlah from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where id_set_spp = '$id_set_daftar_ulang' group by tb_transaksi_pembayaran_spp.id_siswa limit 1");

        // $query_detail_daful = $this->Model->get_data('tb_detail_set_daftar_ulang', array('id_set_daftar_ulang' => $id_set_daftar_ulang));
        $query_detail_daful = $this->Model->kueri("select * from tb_detail_set_daftar_ulang join tb_detail_daftar_ulang on tb_detail_daftar_ulang.id_detail_daftar_ulang = tb_detail_set_daftar_ulang.id_detail_daftar_ulang where id_set_daftar_ulang = '$id_set_daftar_ulang'");
        $data = array(
            'tb_set_daful' => $query,
            'tb_transaksi_pembayaran_daful' => $query2,
            'list_siswa' => $this->Model->kueri("select * from tb_siswa_di_pembayaran_daful join tb_siswa on tb_siswa_di_pembayaran_daful.id_siswa = tb_siswa.id_siswa where id_set_daftar_ulang = '$id_set_daftar_ulang'"),
            'total' => $query3,
            'loop_bln_thn' => $this->cek_month1($query->row()->dari, $query->row()->sampai),
            'detail_daful' => $query_detail_daful
        
        );

        $this->load->view('admin/pembayaran_daful/laporan_cicilan_pembagi', $data);
    }

}

