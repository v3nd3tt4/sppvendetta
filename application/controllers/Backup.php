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

    // public function proses_backupdatabase(){
    // 	$ket = $this->input->post('keterangan', true);
    	

	// 	ini_set('display_errors', 1);
	// 	ini_set('display_startup_errors', 1);
	// 	error_reporting(E_ALL);
	// 	$database = 'sppvendetta';
	// 	$user = 'root';
	// 	$pass = 'goldroger27';
	// 	$host = 'localhost';
	// 	$dir = $ket.'.sql';
	// 	echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";
	// 	exec("E:\xampp\mysql\bin\mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);
	// 	//var_dump($output);
    // }
	public function proses(
		$host='localhost',
		$user='root',
		$pass='',
		$name='database_spp_asli',
		$tables=false, 
		$backup_name=false){

		set_time_limit(3000); 
		$mysqli = new mysqli($host,$user,$pass,$name); 
		$mysqli->select_db($name); 
		$mysqli->query("SET NAMES 'utf8'");
		$queryTables = $mysqli->query('SHOW TABLES'); 
		while($row = $queryTables->fetch_row()) { 
		$target_tables[] = $row[0]; 
		}	
		if($tables !== false) { 
		$target_tables = array_intersect($target_tables, $tables); 
		} 
		$content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `".$name."`\r\n--\r\n\r\n\r\n";
		foreach($target_tables as $table){
		if (empty($table)){ continue; } 
		$result	= $mysqli->query('SELECT * FROM `'.$table.'`');  	
		$fields_amount=$result->field_count;  
		$rows_num=$mysqli->affected_rows; 	
		$res = $mysqli->query('SHOW CREATE TABLE '.$table);	
		$TableMLine=$res->fetch_row(); 
		$content .= "\n\n".$TableMLine[1].";\n\n";  
		$TableMLine[1]=str_ireplace('CREATE TABLE `','CREATE TABLE IF NOT EXISTS `',$TableMLine[1]);
		for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
			while($row = $result->fetch_row())	{ //when started (and every after 100 command cycle):
				if ($st_counter%100 == 0 || $st_counter == 0 )	{
					$content .= "\nINSERT INTO ".$table." VALUES";}
					$content .= "\n(";    
					for($j=0; $j<$fields_amount; $j++){ 
						$row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
						if (isset($row[$j])){
							$content .= '"'.$row[$j].'"' ;
						} else {
							$content .= '""';
						}	   
						if ($j<($fields_amount-1)){
							$content.= ',';
						}   
					}        
					$content .=")";
				//every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
				if ((($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {
					$content .= ";";
				} else {
					$content .= ",";
				}	
				$st_counter=$st_counter+1;
			}
		} $content .="\n\n\n";
		}
		$content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
		$backup_name = $backup_name ? $backup_name : $name.'___('.date('H-i-s').'_'.date('d-m-Y').').sql';
		ob_get_clean(); 
		header('Content-Type: application/octet-stream');  
		header("Content-Transfer-Encoding: Binary");  
		header('Content-Length: '. (function_exists('mb_strlen') ? mb_strlen($content, '8bit'): strlen($content)) );    
		header("Content-disposition: attachment; filename=\"".$backup_name."\""); 
		echo $content; exit;
		}
}