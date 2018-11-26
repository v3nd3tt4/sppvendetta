<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
			'main' => 'admin/siswa/siswa_list',
            'siswa' => $this->Model->kueri('select * from tb_siswa left join tb_kelas on tb_siswa.id_kelas = tb_kelas.id_kelas')
		);
		$this->load->view('layout', $data);
	}
    public function add(){
        $data = array(
			'main' => 'admin/siswa/siswa_add',
            'kelas' => $this->Model->list_data_all('tb_kelas')
		);
		$this->load->view('layout', $data);
    }
    
    public function store(){
        $nis = $this->input->post('nis', true);
        $nama_siswa = $this->input->post('nama_siswa', true);
        $id_kelas = $this->input->post('id_kelas', true);
        $data = array(
            'nis' => $nis,
            'nama_siswa' => $nama_siswa,
            'id_kelas' => $id_kelas,
        );
        $save = $this->Model->simpan_data($data, 'tb_siswa');
        if($save){
            echo '<script>alert("data berhasil disimpan");window.location.href = "'.base_url().'siswa";</script>';
        }else{
            echo '<script>alert("data gagal disimpan");window.location.href = "'.base_url().'siswa/add";</script>';
        }
    }
    
    public function remove($id){
        $hapus = $this->Model->hapus_data(array('id_siswa' => $id), 'tb_siswa');
        if($hapus){
            echo '<script>alert("data berhasil dihapus");window.location.href = "'.base_url().'siswa";</script>';
        }else{
            echo '<script>alert("data gagal dihapus");window.location.href = "'.base_url().'siswa";</script>';
        } 
    }
    
    public function edit($id){
        $data = array(
			'main' => 'admin/siswa/siswa_edit',
            'siswa' => $this->Model->get_data('tb_siswa', array('id_siswa' => $id)),
            'kelas' => $this->Model->list_data_all('tb_kelas')
		);
		$this->load->view('layout', $data);
    }
    
    public function update(){
        $nis = $this->input->post('nis', true);
        $nama_siswa = $this->input->post('nama_siswa', true);
        $id_kelas = $this->input->post('id_kelas', true);
        $data = array(
            'nis' => $nis,
            'nama_siswa' => $nama_siswa,
            'id_kelas' => $id_kelas,
        );
        $id_siswa = $this->input->post('id_siswa', true);
        
        $save = $this->Model->update_data('tb_siswa', $data, array('id_siswa' => $id_siswa));
        if($save){
            echo '<script>alert("data berhasil diedit");window.location.href = "'.base_url().'siswa";</script>';
        }else{
            echo '<script>alert("data gagal diedit");window.location.href = "'.base_url().'siswa/edit/'.$id_siswa.'";</script>';
        }
    }
}
