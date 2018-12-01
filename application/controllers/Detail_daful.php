<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_daful extends CI_Controller {

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
			'main' => 'admin/detail_daful/dashboard',
			'list_detail_daful' => $this->Model->list_data_all('tb_detail_daftar_ulang')
            
		);
		$this->load->view('layout', $data);
	}

	public function list_detail_daful(){
		$data = array(
			'main' => 'admin/detail_daful/dashboard',
			'list_detail_daful' => $this->Model->list_data_all('tb_detail_daftar_ulang')
            
		);
		$this->load->view('layout', $data);
	}

	public function add(){
        $data = array(
			'main' => 'admin/detail_daful/detail_daful_add',
		);
		$this->load->view('layout', $data);
    }
    
    public function store(){
        $nama_kelas = $this->input->post('nama_detail_daful', true);
        
        $data = array(
            'nama_detail_pembayaran ' => $nama_kelas,
        );
        $save = $this->Model->simpan_data($data, 'tb_detail_daftar_ulang');
        if($save){
            echo '<script>alert("data berhasil disimpan");window.location.href = "'.base_url().'detail_daful";</script>';
        }else{
            echo '<script>alert("data gagal disimpan");window.location.href = "'.base_url().'detail_daful/add";</script>';
        }
    }
    
    public function remove($id){
        $hapus = $this->Model->hapus_data(array('id_detail_daftar_ulang' => $id), 'tb_detail_daftar_ulang');
        if($hapus){
            echo '<script>alert("data berhasil dihapus");window.location.href = "'.base_url().'detail_daful";</script>';
        }else{
            echo '<script>alert("data gagal dihapus");window.location.href = "'.base_url().'detail_daful";</script>';
        } 
    }
    
    public function edit($id){
        $data = array(
			'main' => 'admin/detail_daful/detail_daful_edit',
            'detail_daful' => $this->Model->get_data('tb_detail_daftar_ulang', array('id_detail_daftar_ulang' => $id))
		);
		$this->load->view('layout', $data);
    }
    
    public function update(){
        $nama_kelas = $this->input->post('nama_detail_daful', true);
        
        $data = array(
            'nama_detail_pembayaran ' => $nama_kelas,
        );
        
        $id_detail_daftar_ulang = $this->input->post('id_detail_daftar_ulang', true);
        
        $save = $this->Model->update_data('tb_detail_daftar_ulang', $data, array('id_detail_daftar_ulang' => $id_detail_daftar_ulang));
        if($save){
            echo '<script>alert("data berhasil diedit");window.location.href = "'.base_url().'detail_daful";</script>';
        }else{
            echo '<script>alert("data gagal diedit");window.location.href = "'.base_url().'detail_daful/edit/'.$id_detail_daftar_ulang.'";</script>';
        }
    }
}