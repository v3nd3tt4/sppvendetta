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
			'main' => 'admin/kelas/kelas_list',
            'thn_ajaran' => $this->Model->list_data_all('tb_kelas')
		);
		$this->load->view('layout', $data);
	}
    
    public function setting_pembayaran_spp(){
        $data = array(
			'main' => 'admin/pembayaran/setting_pembayaran_spp',
            'thn_ajaran' => $this->Model->list_data_all('tb_kelas')
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
    
    public function cek_month1(){
        // Set timezone
        date_default_timezone_set('UTC');

        // Start date
        $date = '2018-07-01';
        // End date
        $end_date = '2019-06-01';

        while (strtotime($date) <= strtotime($end_date)) {
            echo  date("m Y", strtotime($date)) . "<br/>";
            $date = date ("Y-m-d", strtotime("+1 month", strtotime($date)));
        }
        date("m Y", strtotime($date));
    }
    
}