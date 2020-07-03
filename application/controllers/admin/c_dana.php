<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_dana extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
		    $this->load->library('encrypt');
    }

    function index() {
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator') $this->lists();
		else redirect('c_login', 'refresh');
    }

    function lists() {
        $data['page_title'] = 'DANA DESA';
        // $this->db->order_by('kode_bidang', 'ASC');
        $data['v_danadesa'] = $this->db->query("SELECT tahun, null as dk, SUM(jumlah) as dm FROM tbl_rka_pendapatan GROUP BY tahun UNION
        SELECT tahun, SUM(anggaran) as dk, null as dm FROM tbl_rka_belanja GROUP BY tahun ORDER BY tahun")->result_array();
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('dana/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }
}
