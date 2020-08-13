<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();

class C_admin extends CI_Controller {

    function  __construct()
    {
		parent::__construct();
        $this->load->helper('form');    
		// $this->load->model('m_kalkulasi'); 
		// $this->load->model('statistik/m_kk');
        $this->load->model('grafik/m_grafik');
		$this->load->model('m_logo');			
    }

   

	function index()
    {				
		$data['page_title'] = 'Administrator';
		// $data['konten_logo'] = $this->m_logo->getLogo();
		// $data['jumlah_penduduk'] = $this->m_kalkulasi->getTotalPenduduk();
		// $data['jumlah_penduduk_laki'] = $this->m_kalkulasi->getTotalPendudukByKelamin('1');
		// $data['jumlah_penduduk_perempuan'] = $this->m_kalkulasi->getTotalPendudukByKelamin('2');
		$data['angdesa'] = $this->m_grafik->getAdesa();
		$data['penyerapan'] = $this->m_grafik->getPenyerapan();
		$data['desa'] = $this->m_grafik->getDesa();
		$data['krajan'] = $this->m_grafik->getKrajan();
		$data['dukut'] = $this->m_grafik->getDukut();
		$data['dukse'] = $this->m_grafik->getDukse();
		$data['ngadirejo'] = $this->m_grafik->getNgadirejo();
		$data['tahun'] = $this->m_grafik->getTahun();
		$data['v_pendapatan'] = $this->db->query("SELECT SUM(jumlah) as jml FROM tbl_rka_pendapatan")->row('jml');
		$data['v_pengeluaran'] = $this->db->query("SELECT SUM(anggaran) as ang FROM tbl_rka_belanja")->row('ang');
		$data['danadesa'] = $data['v_pendapatan'] - $data['v_pengeluaran'];


 
		$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);	

		// $data['jumlah_kk_perempuan'] = $this->m_kk->getKkPerempuan();
		// $data['jumlah_kk_laki'] = $this->m_kk->getKkLaki();

		
		
		//$data['statistik'] = $this->load->view('web/content/java_statistik/kk', $data, TRUE);
		
		$data['content'] = $this->load->view('v_admin', $data, TRUE);

		// $data['total'] = $this->m_kalkulasi->getTotalPerencanaan();
		// $data['perencanaan_dusun'] = $this->m_grafikperencanaan->getTotalPendudukByDusun('0');
		// $data['content'] = $this->load->view('v_admin', $data, TRUE);
		// $data = $this->chart_model->get_data()->result();
  //       $x['data'] = json_encode($data);

		// $data['menu'] = $this->load->view('menu/v_admin', $x, TRUE);	
		
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');         
    }

    
}
?>