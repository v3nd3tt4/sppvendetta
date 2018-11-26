<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_pembayaran extends CI_Controller {

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
			'main' => 'admin/jns_byr/jns_byr_list',
            'thn_ajaran' => $this->Model->list_data_all('tb_jenis_pembayaran')
		);
		$this->load->view('layout', $data);
	}
    public function add(){
        $data = array(
			'main' => 'admin/jns_byr/jns_byr_add',
		);
		$this->load->view('layout', $data);
    }
    
    public function store(){
        $nama_jenis_pembayaran = $this->input->post('nama_jenis_pembayaran', true);
        $keterangan = $this->input->post('keterangan', true);
        $data = array(
            'nama_jenis_pembayaran' => $nama_jenis_pembayaran,
            'keterangan' => $keterangan
        );
        $save = $this->Model->simpan_data($data, 'tb_jenis_pembayaran');
        if($save){
            echo '<script>alert("data berhasil disimpan");window.location.href = "'.base_url().'jenis_pembayaran";</script>';
        }else{
            echo '<script>alert("data gagal disimpan");window.location.href = "'.base_url().'jenis_pembayaran/add";</script>';
        }
    }
    
    public function remove($id){
        $hapus = $this->Model->hapus_data(array('id_jenis_pembayaran' => $id), 'tb_jenis_pembayaran');
        if($hapus){
            echo '<script>alert("data berhasil dihapus");window.location.href = "'.base_url().'jenis_pembayaran";</script>';
        }else{
            echo '<script>alert("data gagal dihapus");window.location.href = "'.base_url().'jenis_pembayaran";</script>';
        } 
    }
    
    public function edit($id){
        $data = array(
			'main' => 'admin/jns_byr/jns_byr_edit',
            'jenis_pembayaran' => $this->Model->get_data('tb_jenis_pembayaran', array('id_jenis_pembayaran' => $id))
		);
		$this->load->view('layout', $data);
    }
    
    public function update(){
        $nama_jenis_pembayaran = $this->input->post('nama_jenis_pembayaran', true);
        $keterangan = $this->input->post('keterangan', true);
        $data = array(
            'nama_jenis_pembayaran' => $nama_jenis_pembayaran,
            'keterangan' => $keterangan
        );
        $id_jenis_pembayaran = $this->input->post('id_jenis_pembayaran', true);
        
        $save = $this->Model->update_data('tb_jenis_pembayaran', $data, array('id_jenis_pembayaran' => $id_jenis_pembayaran));
        if($save){
            echo '<script>alert("data berhasil diedit");window.location.href = "'.base_url().'jenis_pembayaran";</script>';
        }else{
            echo '<script>alert("data gagal diedit");window.location.href = "'.base_url().'jenis_pembayaran/edit/'.$id_jenis_pembayaran.'";</script>';
        }
    }
}
