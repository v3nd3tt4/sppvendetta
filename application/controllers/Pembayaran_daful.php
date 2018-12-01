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
            'set_spp' => $this->Model->kueri('select tb_set_spp.*, tb_jenis_pembayaran.nama_jenis_pembayaran from tb_set_spp join tb_jenis_pembayaran on tb_jenis_pembayaran.id_jenis_pembayaran = tb_set_spp.id_jenis_pembayaran where tb_set_spp.id_jenis_pembayaran = "2"')
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
    	
    }
}