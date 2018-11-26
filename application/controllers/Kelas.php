<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

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
    public function add(){
        $data = array(
			'main' => 'admin/kelas/kelas_add',
		);
		$this->load->view('layout', $data);
    }
    
    public function store(){
        $nama_kelas = $this->input->post('nama_kelas', true);
        $keterangan = $this->input->post('keterangan', true);
        $data = array(
            'nama_kelas' => $nama_kelas,
            'keterangan' => $keterangan
        );
        $save = $this->Model->simpan_data($data, 'tb_kelas');
        if($save){
            echo '<script>alert("data berhasil disimpan");window.location.href = "'.base_url().'kelas";</script>';
        }else{
            echo '<script>alert("data gagal disimpan");window.location.href = "'.base_url().'kelas/add";</script>';
        }
    }
    
    public function remove($id){
        $hapus = $this->Model->hapus_data(array('id_kelas' => $id), 'tb_kelas');
        if($hapus){
            echo '<script>alert("data berhasil dihapus");window.location.href = "'.base_url().'kelas";</script>';
        }else{
            echo '<script>alert("data gagal dihapus");window.location.href = "'.base_url().'kelas";</script>';
        } 
    }
    
    public function edit($id){
        $data = array(
			'main' => 'admin/kelas/kelas_edit',
            'kelas' => $this->Model->get_data('tb_kelas', array('id_kelas' => $id))
		);
		$this->load->view('layout', $data);
    }
    
    public function update(){
        $nama_kelas = $this->input->post('nama_kelas', true);
        $keterangan = $this->input->post('keterangan', true);
        $id_kelas = $this->input->post('id_kelas', true);
        $data = array(
            'nama_kelas' => $nama_kelas,
            'keterangan' => $keterangan
        );
        $save = $this->Model->update_data('tb_kelas', $data, array('id_kelas' => $id_kelas));
        if($save){
            echo '<script>alert("data berhasil diedit");window.location.href = "'.base_url().'kelas";</script>';
        }else{
            echo '<script>alert("data gagal diedit");window.location.href = "'.base_url().'kelas/edit/'.$id_kelas.'";</script>';
        }
    }
}
