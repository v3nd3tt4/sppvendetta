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
    
}