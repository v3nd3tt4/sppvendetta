<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
    
    public function laporan_spp_perhari(){
        $data = array(
			'main' => 'admin/laporan/laporan_spp_perhari',
            
		);
		$this->load->view('layout', $data);
    }

    public function laporan_spp_pertgl(){
        $data = array(
            'main' => 'admin/laporan/laporan_spp_pertgl',
            
        );
        $this->load->view('layout', $data);
    }

    public function proses_laporan_spp(){
    	$dari = $this->input->post('dari', true);
    	$sampai = $this->input->post('sampai', true);
    	$query = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where (tanggal_transaksi BETWEEN '$dari' AND '$sampai') order by tanggal_transaksi DESC");
    	// var_dump($query->result());
    	$data = array(
    		'row' => $query,
    		'dari' => $dari,
    		'sampai' => $sampai
    	);
    	$this->load->view('admin/laporan/cetak_laporan_spp_perhari', $data);
    }

    public function proses_laporan_spp_pertgl(){
        $tgl = $this->input->post('tgl', true);
        $query = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where date(tanggal_transaksi) = '$tgl' order by tanggal_transaksi DESC");
        // var_dump($query->result());
        $data = array(
            'row' => $query,
            'tgl' => $tgl,
        );
        $this->load->view('admin/laporan/cetak_laporan_spp_pertgl', $data);
    }

    public function laporan_daful_perhari(){
        $data = array(
			'main' => 'admin/laporan/laporan_daful_perhari',
            
		);
		$this->load->view('layout', $data);
    }

    public function laporan_daful_pertgl(){
        $data = array(
            'main' => 'admin/laporan/laporan_daful_pertgl',
            
        );
        $this->load->view('layout', $data);
    }

    public function proses_laporan_daful(){
    	$dari = $this->input->post('dari', true);
    	$sampai = $this->input->post('sampai', true);
    	$query = $this->Model->kueri("select * from tb_transaksi_pembayaran_daful join tb_siswa on tb_transaksi_pembayaran_daful.id_siswa = tb_siswa.id_siswa where (tanggal_transaksi BETWEEN '$dari' AND '$sampai') order by tanggal_transaksi DESC");
    	// var_dump($query->result());
    	$data = array(
    		'row' => $query,
    		'dari' => $dari,
    		'sampai' => $sampai
    	);
    	$this->load->view('admin/laporan/cetak_laporan_daful_perhari', $data);
    }

    public function proses_laporan_daful_pertgl(){
        $tgl = $this->input->post('tgl', true);
        $sampai = $this->input->post('sampai', true);
        $query = $this->Model->kueri("select * from tb_transaksi_pembayaran_daful join tb_siswa on tb_transaksi_pembayaran_daful.id_siswa = tb_siswa.id_siswa where date(tanggal_transaksi) = '$tgl' order by tanggal_transaksi DESC");
        // var_dump($query->result());
        $data = array(
            'row' => $query,
            'tgl' => $tgl,
        );
        $this->load->view('admin/laporan/cetak_laporan_daful_pertgl', $data);
    }

}