<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();
    }
	public function index() 
	{
		$user_kegiatan = $this->input->post('user_kegiatan');
		$pass_kegiatan = $this->input->post('pass_kegiatan');
		if(isset($user_kegiatan) && isset($pass_kegiatan)){
			$sql = $this->db->get_where('tbl_kegiatan', array('user_kegiatan' => $user_kegiatan, 'pass_kegiatan' => $pass_kegiatan))->row();
			// != 0
			if(count($sql != 0)) {
				$response["value"] = 1;
				$response["message"] = "login berhasil";
				$response["nama_kegiatan"] = $sql->nama_kegiatan;
				echo json_encode($response);
			} else {
				$response["value"] = 0;
				$response["message"] = "login gagal";
				echo json_encode($response);
			}
		} else {
			$response["value"] = 2;
			if(!isset($user_kegiatan)) $em = "user_kegiatan";
			if(!isset($user_pass)) $ps = "user_pass";
			$response["message"] = "data kosong";
			echo json_encode($response);
		}
	}
}