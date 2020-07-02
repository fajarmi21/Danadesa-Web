<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_lap extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('page_model');
		    $this->load->library('encrypt');
    }

    function index()    {
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			redirect('admin/c_admin');//$this->lists();
		}else
			redirect('c_login', 'refresh');

    }


      function lra($aksi='',$id='')    {
      $session['hasil'] = $this->session->userdata('logged_in');
      $role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Administrator')
      {
        $this->lists_lra();
      }else
        redirect('c_login', 'refresh');
      }

      function lists_lra() {
          $data['page_title'] = 'Laporan Data Rencana Anggaran Tahunan';
          $this->db->order_by('id_rka_belanja', 'ASC');
          $data['v_data'] = $this->db->get('tbl_rka_belanja');
          $data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
          $data['content'] = $this->load->view('lap/lra/v_list', $data, TRUE);
          $this->load->view('utama', $data);
      }


      function lrea($aksi='',$id='')    {
      $session['hasil'] = $this->session->userdata('logged_in');
      $role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Administrator')
      {
        if ($aksi == 'add') {
          $this->add_lrea();
        }else if ($aksi == 'print') {
          $this->print_lrea();
        }else{
          $this->lists_lrea();
        }
      }else
        redirect('c_login', 'refresh');
      }

      function lists_lrea() {
          $data['page_title'] = 'Laporan Realisasi';
          $this->db->order_by('id_realisasi', 'ASC');
          $data['v_data'] = $this->db->get('tbl_realisasi');
          $data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
          $data['content'] = $this->load->view('lap/lrea/v_list', $data, TRUE);
          $this->load->view('utama', $data);
      }

      function add_lrea(){
      $session['hasil'] = $this->session->userdata('logged_in');
      $role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Administrator')
      {
        $data['page_title'] = 'Tambah Data Realisasi';
        $data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('lap/lrea/v_tambah', $data, TRUE);
        $this->load->view('utama', $data);
      }else
        redirect('c_login', 'refresh');
      }

      function simpan_lrea() {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->role;
        if($this->session->userdata('logged_in') AND $role == 'Administrator')
        {
                if (isset($_POST['simpan'])) {
                    $jumlah_anggaran  = preg_replace('/[Rp. ]/', '', $this->input->post('jumlah_anggaran'));
                    $jumlah_realisasi = preg_replace('/[Rp. ]/', '', $this->input->post('jumlah_realisasi'));
                    $data = array(
                      'kode_rekening'      => $this->input->post('kode_rekening'),
                      'uraian'             => $this->input->post('uraian'),
                      'jumlah_anggaran'    => $jumlah_anggaran,
                      'jumlah_realisasi'   => $jumlah_realisasi,
                      'lebih_kurang'       => $jumlah_anggaran - $jumlah_realisasi,
                      'keterangan'         => $this->input->post('keterangan'),
                      'tgl_realisasi'      => date('d-m-Y')
                    );
                    $this->db->insert("tbl_realisasi", $data);
                    $this->session->set_flashdata('msg',
                      '
                      <div class="alert alert-success alert-dismissible" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                         </button>
                         <strong>Sukses!</strong> Berhasil ditambah.
                      </div>'
                    );
                }
                redirect('admin/c_lap/lrea');
        }else
          redirect('c_login', 'refresh');
      }

      function print_lrea() {
          $data['page_title'] = 'Laporan Realisasi';
          $this->db->order_by('id_realisasi', 'ASC');
          $data['v_data'] = $this->db->get('tbl_realisasi');
          $this->load->view('lap/lrea/v_print', $data);
      }


      function lrap($aksi='',$id='')    {
      $session['hasil'] = $this->session->userdata('logged_in');
      $role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Administrator')
      {
        $this->lists_lrap();
      }else
        redirect('c_login', 'refresh');
      }

      function lists_lrap() {
          $data['page_title'] = 'Laporan Data Raperdes Tahunan';
          $this->db->order_by('id_rka_belanja', 'ASC');
          $data['v_data'] = $this->db->get('tbl_rka_belanja');
          $data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
          $data['content'] = $this->load->view('lap/lrap/v_list', $data, TRUE);
          $this->load->view('utama', $data);
      }


      function lad($aksi='',$id='')    {
      $session['hasil'] = $this->session->userdata('logged_in');
      $role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Administrator')
      {
        $this->lists_lad();
      }else
        redirect('c_login', 'refresh');
      }

      function lists_lad() {
          $data['page_title'] = 'Laporan Data APBD Tahunan';
          $this->db->order_by('id_rka_belanja', 'ASC');
          $data['v_data'] = $this->db->get('tbl_rka_belanja');
          $data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
          $data['content'] = $this->load->view('lap/lad/v_list', $data, TRUE);
          $this->load->view('utama', $data);
      }


}
?>
