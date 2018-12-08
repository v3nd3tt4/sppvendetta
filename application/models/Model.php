<?php

class Model extends CI_Model {

    public function __construct(){
        parent::__construct();
//        $this->default = $this->load->database('default', TRUE);
//        $this->referensi = $this->load->database('referensi', TRUE);
    }
    
    function simpan_data($data, $table){
        $this->db->insert($table, $data);
        return true;
    }

    function kueri($query){
        return $this->db->query($query);
    }
    
    function list_data($table, $limit = '', $start = ''){
         return $query = $this->db->get($table, $limit, $start)->result();  
    }

    function list_data_all($table){
         return $query = $this->db->get($table)->result();  
    }
    
    function hapus_data($param, $table){
        return $this->db->delete($table, $param); 
    }
    
    function update_data($table, $data, $param){
        return $this->db->update($table, $data, $param);
    }
    
    function get_data($table, $param){
        return $this->db->get_where($table, $param);
    }
    
    function konversi_bulan($bulan){
        $bulannya = array (
            '1' =>   'Januari',
			'2' => 'Februari',
			'3' => 'Maret',
			'4' =>'April',
			'5' =>'Mei',
			'6' =>'Juni',
			'7' =>'Juli',
			'8' =>'Agustus',
			'9' =>'September',
            '01' =>   'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' =>'April',
            '05' =>'Mei',
            '06' =>'Juni',
            '07' =>'Juli',
            '08' =>'Agustus',
            '09' =>'September',
			'10' =>'Oktober',
			'11' =>'November',
			'12' =>'Desember'
		);

        return $bulannya[$bulan];
    }
    
}