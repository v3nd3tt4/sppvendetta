<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller {

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
			'main' => 'admin/thn_ajaran/thn_ajaran_list',
            'thn_ajaran' => $this->Model->list_data_all('tb_tahun_ajaran')
		);
		$this->load->view('layout', $data);
	}
    public function add(){
        $data = array(
			'main' => 'admin/thn_ajaran/thn_ajaran_add',
		);
		$this->load->view('layout', $data);
    }
    
    public function store(){
        $tahun_ajaran = $this->input->post('thn_ajaran', true);
        $keterangan = $this->input->post('thn_ajaran_ket', true);
        $data = array(
            'nama_tahun_ajaran' => $tahun_ajaran,
            'keterangan' => $keterangan
        );
        $save = $this->Model->simpan_data($data, 'tb_tahun_ajaran');
        if($save){
            echo '<script>alert("data berhasil disimpan");window.location.href = "'.base_url().'tahun_ajaran";</script>';
        }else{
            echo '<script>alert("data gagal disimpan");window.location.href = "'.base_url().'tahun_ajaran/add";</script>';
        }
    }
    
    public function remove($id){
        $hapus = $this->Model->hapus_data(array('id_tahun_ajaran' => $id), 'tb_tahun_ajaran');
        if($hapus){
            echo '<script>alert("data berhasil dihapus");window.location.href = "'.base_url().'tahun_ajaran";</script>';
        }else{
            echo '<script>alert("data gagal dihapus");window.location.href = "'.base_url().'tahun_ajaran";</script>';
        } 
    }
    
    public function edit($id){
        $data = array(
			'main' => 'admin/thn_ajaran/thn_ajaran_edit',
            'thn_ajaran' => $this->Model->get_data('tb_tahun_ajaran', array('id_tahun_ajaran' => $id))
		);
		$this->load->view('layout', $data);
    }
    
    public function update(){
        $tahun_ajaran = $this->input->post('thn_ajaran', true);
        $keterangan = $this->input->post('thn_ajaran_ket', true);
        $id_tahun_ajaran = $this->input->post('id_tahun_ajaran', true);
        $data = array(
            'nama_tahun_ajaran' => $tahun_ajaran,
            'keterangan' => $keterangan
        );
        $save = $this->Model->update_data('tb_tahun_ajaran', $data, array('id_tahun_ajaran' => $id_tahun_ajaran));
        if($save){
            echo '<script>alert("data berhasil diedit");window.location.href = "'.base_url().'tahun_ajaran";</script>';
        }else{
            echo '<script>alert("data gagal diedit");window.location.href = "'.base_url().'tahun_ajaran/edit/'.$id_tahun_ajaran.'";</script>';
        }
    }
}
