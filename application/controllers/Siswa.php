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

    public function tunggakan($id_siswa){
        $query = $this->Model->kueri("select * from tb_set_spp join tb_siswa on tb_set_spp.id_kelas = tb_siswa.id_kelas where tb_set_spp.status_data != 'hapus' and tb_siswa.id_siswa = '$id_siswa' limit 1");
        // var_dump($this->cek_month1($query->row()->dari, $query->row()->sampai));exit();
        $query2 = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where tb_siswa.id_siswa = '$id_siswa' group by tb_transaksi_pembayaran_spp.id_siswa");
        $query4 = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where tb_siswa.id_siswa = '$id_siswa'");
        $query3 = $this->Model->kueri("select count(*) as jumlah from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where tb_siswa.id_siswa = '$id_siswa' group by tb_transaksi_pembayaran_spp.id_siswa limit 1");

        $query_daful = $this->Model->kueri("select * from tb_set_daftar_ulang join tb_siswa on tb_set_daftar_ulang.id_kelas = tb_siswa.id_kelas where tb_set_daftar_ulang.status_data != 'hapus' and tb_siswa.id_siswa = '$id_siswa' limit 1");

        $query2_daful = $this->Model->kueri("select * from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where id_set_spp = '".$query_daful->row()->id_set_daftar_ulang."' group by tb_transaksi_pembayaran_spp.id_siswa");
        
        $query3_daful = $this->Model->kueri("select count(*) as jumlah from tb_transaksi_pembayaran_spp join tb_siswa on tb_transaksi_pembayaran_spp.id_siswa = tb_siswa.id_siswa where id_set_spp = '".$query_daful->row()->id_set_daftar_ulang."' group by tb_transaksi_pembayaran_spp.id_siswa limit 1");

        // $query_detail_daful = $this->Model->get_data('tb_detail_set_daftar_ulang', array('id_set_daftar_ulang' => $id_set_daftar_ulang));
        $query_detail_daful = $this->Model->kueri("select * from tb_detail_set_daftar_ulang join tb_detail_daftar_ulang on tb_detail_daftar_ulang.id_detail_daftar_ulang = tb_detail_set_daftar_ulang.id_detail_daftar_ulang where id_set_daftar_ulang = '".$query_daful->row()->id_set_daftar_ulang."'");

        $data = array(
			// 'main' => 'admin/laporan/cetak_laporan_tunggakan',
            'siswa' => $this->Model->kueri('select * from tb_siswa left join tb_kelas on tb_siswa.id_kelas = tb_kelas.id_kelas where id_siswa = "'.$id_siswa.'"'),
            // 'tb_set_spp' => $query,
            'tb_transaksi_pembayaran_spp' => $query2,
            'total' => $query3,
            'loop_bln_thn' => $this->cek_month1($query->row()->dari, $query->row()->sampai),
            'loop_siswa' => $query4,

            'tb_set_daful' => $query_daful,
            'tb_transaksi_pembayaran_daful' => $query2_daful,
            'list_siswa' => $this->Model->kueri("select * from tb_siswa_di_pembayaran_daful join tb_siswa on tb_siswa_di_pembayaran_daful.id_siswa = tb_siswa.id_siswa where tb_siswa.id_siswa = '$id_siswa'"),
            'total_daful' => $query3_daful,
            'loop_bln_thn__daful' => $this->cek_month1($query_daful->row()->dari, $query_daful->row()->sampai),
            'detail_daful' => $query_detail_daful
		);
		$this->load->view('admin/laporan/cetak_laporan_tunggakan', $data);
    }
}
