<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

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
    
    public function backupdatabase(){
        $data = array(
			'main' => 'admin/backup/backupdatabase',
            
		);
		$this->load->view('layout', $data);
    }

    public function proses_backupdatabase(){
    	$ket = $this->input->post('keterangan', true);
    	

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$database = 'sppvendetta';
		$user = 'root';
		$pass = 'goldroger27';
		$host = 'localhost';
		$dir = $ket.'.sql';
		echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";
		exec("/Applications/XAMPP/bin/mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);
		//var_dump($output);
    }
}