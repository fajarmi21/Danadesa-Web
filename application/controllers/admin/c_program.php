<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_program extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
		    $this->load->library('encrypt');
    }

    function index()    {
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$this->lists();
		}else
			redirect('c_login', 'refresh');

    }

    function lists() {
        $data['page_title'] = 'DATA Program';
        $this->db->order_by('kode_program', 'ASC');
        $data['v_program'] = $this->db->get('tbl_program');
		    $data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('program/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function add(){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['page_title'] = 'Tambah Program';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('program/v_tambah', $data, TRUE);
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');

    }

    function simpan() {
      $session['hasil'] = $this->session->userdata('logged_in');
      $role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Administrator')
      {
          $nama_program = $this->input->post('nama_program', TRUE);

      		$this->form_validation->set_rules('nama_program', 'nama_program', 'required');

      		if ($this->form_validation->run() == TRUE)
      		{

            // $tahun = date('Y');
            // $this->db->where('thn', $tahun);
            $this->db->order_by('kode_program', 'DESC');
            $this->db->limit(1);
            $cek_na = $this->db->get('tbl_program');
            if ($cek_na->num_rows() == 0) {
              $no_urut        = "P001";
            }else{
              $noUrut 	    		= substr($cek_na->row()->kode_program, 1, 3);
              $noUrut++;
              $no_urut				= "P".sprintf("%03s", $noUrut);
            }

      				$data = array(
                'kode_program' => $no_urut,
      					'nama_program' => $nama_program
      				);
      				$this->db->insert("tbl_program",$data);
              $this->session->set_flashdata('msg',
                '
                <div class="alert alert-success alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                   </button>
                   <strong>Sukses!</strong> Berhasil ditambah.
                </div>'
              );
      				redirect('admin/c_program');

          }
      		else $this->add();
      }
    }

      function edit($id=''){
          $session['hasil'] = $this->session->userdata('logged_in');
      		$role = $session['hasil']->role;
      		if($this->session->userdata('logged_in') AND $role == 'Administrator')
      		{
      			$data['hasil'] = $this->db->get_where("tbl_program", array('id_program' => "$id"))->row();

      			$data['page_title'] = 'Edit Data Program';
      			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
      			$data['content'] = $this->load->view('program/v_ubah', $data, TRUE);

      			$this->load->view('utama', $data);
      		}else
      			redirect('c_login', 'refresh');
      }


      function update() {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->role;
        if($this->session->userdata('logged_in') AND $role == 'Administrator')
        {
            $id          = $this->input->post('id', TRUE);
            $nama_program = $this->input->post('nama_program', TRUE);

        		$this->form_validation->set_rules('nama_program', 'nama_program', 'required');

        		if ($this->form_validation->run() == TRUE)
        		{
        				$data = array(
        					'nama_program' => $nama_program
        				);
        				$this->db->update("tbl_program", $data, array('id_program' => "$id"));
                $this->session->set_flashdata('msg',
                  '
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                     </button>
                     <strong>Sukses!</strong> Berhasil diupdate.
                  </div>'
                );
        				redirect('admin/c_program');

            }
        		else $this->add();
        }
      }

      function hapus($id='') {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->role;
        if($this->session->userdata('logged_in') AND $role == 'Administrator')
        {
                $this->db->delete("tbl_program", array('id_program' => "$id"));
                $this->session->set_flashdata('msg',
                  '
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                     </button>
                     <strong>Sukses!</strong> Berhasil dihapus.
                  </div>'
                );
                redirect('admin/c_program');
        }
      }

}
?>
