<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

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
			'main' => 'admin/pembayaran/setting_pembayaran_spp',
            'thn_ajaran' => $this->Model->list_data_all('tb_kelas'),
            'set_spp' => $this->Model->kueri('select tb_set_spp.*, tb_jenis_pembayaran.nama_jenis_pembayaran from tb_set_spp join tb_jenis_pembayaran on tb_jenis_pembayaran.id_jenis_pembayaran = tb_set_spp.id_jenis_pembayaran where tb_set_spp.id_jenis_pembayaran = "1"')
		);
		$this->load->view('layout', $data);
	}
    
    public function setting_pembayaran_spp(){
        $data = array(
			'main' => 'admin/pembayaran/setting_pembayaran_spp',
            'thn_ajaran' => $this->Model->list_data_all('tb_kelas'),
            'set_spp' => $this->Model->kueri('select tb_set_spp.*, tb_jenis_pembayaran.nama_jenis_pembayaran from tb_set_spp join tb_jenis_pembayaran on tb_jenis_pembayaran.id_jenis_pembayaran = tb_set_spp.id_jenis_pembayaran where tb_set_spp.id_jenis_pembayaran = "1"')
		);
		$this->load->view('layout', $data);
    }
    
    public function add_setting_pembayaran_spp(){
        $data = array(
			'main' => 'admin/pembayaran/setting_pembayaran_spp1',
            'kelas' => $this->Model->list_data_all('tb_kelas'),
		);
		$this->load->view('layout', $data);
    }
    
    public function add_setting_pembayaran_spp1(){
        $keterangan = $this->input->post('keterangan', true);
        $kelas = $this->input->post('kelas', true);
        $dari = $this->input->post('dari', true);
        $sampai = $this->input->post('sampai', true);
        $data = array(
			'main' => 'admin/pembayaran/setting_pembayaran_spp2',    
            'keterangan' => $keterangan,
            'kelas' => $this->Model->list_data_all('tb_kelas'),
            'dari' => $dari,
            'sampai' => $sampai,
            'id_kelas' => $kelas,
            'list_siswa' => $this->Model->get_data('tb_siswa', array('id_kelas' => $kelas)),
		);
		$this->load->view('layout', $data);
    }
    
    public function store(){
        $this->db->trans_begin();
        $data1 = array(
            'keterangan' => $this->input->post('keterangan', true),
            'id_jenis_pembayaran' => '1', 
            'dari' => $this->input->post('dari', true),
            'sampai' => $this->input->post('sampai', true),
            'id_kelas' => $this->input->post('kelas', true),
        );
        $this->db->insert('tb_set_spp', $data1);
        $id_set_spp = $this->db->insert_id();
        
        $data2 = array();
        
        $bulantahun = json_decode($this->cek_month1($this->input->post('dari', true), $this->input->post('sampai', true)));
        for($i=0;$i<count($this->input->post('id_siswa', true));$i++){
            foreach($bulantahun as $row_bulan){
                $data2[] = array(
                    'id_siswa' => $this->input->post('id_siswa', true)[$i],
                    'id_set_spp' => $id_set_spp,
                    'nominal_default' => $this->input->post('kewajiban_bayar', true)[$i],
                    'bulan' => $row_bulan->month,
                    'tahun' => $row_bulan->year,
                );
            }
            
        }
        $this->db->insert_batch('tb_transaksi_pembayaran_spp', $data2);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo '<script>alert("data gagal disimpan");window.history.back();</script>';
        }
        else
        {
            $this->db->trans_commit();
            echo '<script>alert("data berhasil disimpan");window.location.href = "'.base_url().'pembayaran";</script>';
        }
        
    }
    
    public function cek_month(){
        $start_month = 7;
        $end_month = 6;
        $start_year = 2018;

        for($m=$start_month; $m<=12; ++$m){

            if($start_month == 12 && $m==12 && $end_month < 12) 
            {
               $m = 0;
               $start_year = $start_year+1;
            }
            echo date('F Y', mktime(0, 0, 0, $m, 1, $start_year)).'<br>';
            if($m == $end_month) break;
        }
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
    
    public function detail($id_set_spp){
        $query = $this->Model->get_data('tb_set_spp', array('id_set_spp' => $id_set_spp));
        $query2 = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_siswa.id_siswa = tb_transaksi_pembayaran_spp.id_siswa where tb_transaksi_pembayaran_spp.id_set_spp = '$id_set_spp' group by tb_transaksi_pembayaran_spp.id_siswa");
//        $query2 = $this->Model->get_data('tb_transaksi_pembayaran_spp', array('id_set_spp' => $id_set_spp));
        $data = array(
            'main' => 'admin/pembayaran/detail_set_spp',
            'set_spp' => $query,
            'list_siswa' => $query2,
            'kelas' => $this->Model->list_data_all('tb_kelas'),
        );
        $this->load->view('layout', $data);
    }
    
    public function lihat_bayar_tansaksi($id_set_spp, $id_siswa){
        $query = $this->Model->get_data('tb_set_spp', array('id_set_spp' => $id_set_spp));
        $querysiswa = $this->Model->kueri("select * from tb_siswa join tb_kelas on tb_siswa.id_kelas = tb_kelas.id_kelas where tb_siswa.id_siswa = '$id_siswa'");
        $query2 = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp where tb_transaksi_pembayaran_spp.id_set_spp = '$id_set_spp' and tb_transaksi_pembayaran_spp.id_siswa = '$id_siswa'");
//        $query2 = $this->Model->get_data('tb_transaksi_pembayaran_spp', array('id_set_spp' => $id_set_spp));
        $data = array(
            'main' => 'admin/pembayaran/detail_transaksi_spp',
            'set_spp' => $query,
            'list_transaksi' => $query2,
            'kelas' => $this->Model->list_data_all('tb_kelas'),
            'siswa' => $querysiswa
        );
        $this->load->view('layout', $data);
    }

    public function getkwitansi(){
        $id = $this->input->post('id', true);
        $acak = rand(10, 99);
        $nokwitansi =  date('YmdHis').$acak;
        $query = $this->Model->get_data('tb_transaksi_pembayaran_spp', array('id_transaksi_spp' => $id));
        $data = array(
            // 'main' => 'transaksi_bayar_spp',
            'row' => $query,
            'no_kwitansi' => $nokwitansi,
        );
        $this->load->view('transaksi_bayar_spp', $data);
    }

    public function proses_pemabayaran_spp(){
        $data = array(
            'no_kwitansi' => $this->input->post('no_kwitansi'),
            'jumlah_bayar' => $this->input->post('nominal_bayar'),
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'status' => 'sudah bayar'
        );
        $update = $this->Model->update_data('tb_transaksi_pembayaran_spp', $data, array('id_transaksi_spp' => $this->input->post('id_transaksi_spp')));
        if($update){
            echo '<script>alert("data berhasil disimpan");location.reload();</script>';
        }else{
            echo '<script>alert("data gagal disimpan");location.reload();</script>';
        }
    }

    public function cetak_laporan_cicilan($id_set_spp){
        $query = $this->Model->kueri("select * from tb_set_spp where id_set_spp = '$id_set_spp'");
        $query2 = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where id_set_spp = '$id_set_spp' group by tb_transaksi_pembayaran_spp.id_siswa");
        $query4 = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where id_set_spp = '$id_set_spp'");
        $query3 = $this->Model->kueri("select count(*) as jumlah from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where id_set_spp = '$id_set_spp' group by tb_transaksi_pembayaran_spp.id_siswa limit 1");
        $data = array(
            'tb_set_spp' => $query,
            'tb_transaksi_pembayaran_spp' => $query2,
            'total' => $query3,
            'loop_bln_thn' => $this->cek_month1($query->row()->dari, $query->row()->sampai),
            'loop_siswa' => $query4 
        );

        $this->load->view('admin/pembayaran/laporan_cicilan', $data);
    }
    
}