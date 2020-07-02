<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_bidang extends CI_Controller {

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
        $data['page_title'] = 'DATA BIDANG';
        $this->db->order_by('kode_bidang', 'ASC');
        $data['v_bidang'] = $this->db->get('tbl_bidang');
		    $data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('bidang/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function add(){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['page_title'] = 'Tambah Bidang';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('bidang/v_tambah', $data, TRUE);
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');

    }

    function simpan() {
      $session['hasil'] = $this->session->userdata('logged_in');
      $role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Administrator')
      {
          $nama_bidang = $this->input->post('nama_bidang', TRUE);

      		$this->form_validation->set_rules('nama_bidang', 'nama_bidang', 'required');

      		if ($this->form_validation->run() == TRUE)
      		{

            // $tahun = date('Y');
            // $this->db->where('thn', $tahun);
            $this->db->order_by('kode_bidang', 'DESC');
            $this->db->limit(1);
            $cek_na = $this->db->get('tbl_bidang');
            if ($cek_na->num_rows() == 0) {
              $no_urut        = "B001";
            }else{
              $noUrut 	    		= substr($cek_na->row()->kode_bidang, 1, 3);
              $noUrut++;
              $no_urut				= "B".sprintf("%03s", $noUrut);
            }

      				$data = array(
                'kode_bidang' => $no_urut,
      					'nama_bidang' => $nama_bidang
      				);
      				$this->db->insert("tbl_bidang",$data);
              $this->session->set_flashdata('msg',
                '
                <div class="alert alert-success alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                   </button>
                   <strong>Sukses!</strong> Berhasil ditambah.
                </div>'
              );
      				redirect('admin/c_bidang');

          }
      		else $this->add();
      }
    }

      function edit($id=''){
          $session['hasil'] = $this->session->userdata('logged_in');
      		$role = $session['hasil']->role;
      		if($this->session->userdata('logged_in') AND $role == 'Administrator')
      		{
      			$data['hasil'] = $this->db->get_where("tbl_bidang", array('id_bidang' => "$id"))->row();

      			$data['page_title'] = 'Edit Data Bidang';
      			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
      			$data['content'] = $this->load->view('bidang/v_ubah', $data, TRUE);

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
            $nama_bidang = $this->input->post('nama_bidang', TRUE);

        		$this->form_validation->set_rules('nama_bidang', 'nama_bidang', 'required');

        		if ($this->form_validation->run() == TRUE)
        		{
        				$data = array(
        					'nama_bidang' => $nama_bidang
        				);
        				$this->db->update("tbl_bidang", $data, array('id_bidang' => "$id"));
                $this->session->set_flashdata('msg',
                  '
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                     </button>
                     <strong>Sukses!</strong> Berhasil diupdate.
                  </div>'
                );
        				redirect('admin/c_bidang');

            }
        		else $this->add();
        }
      }

      function hapus($id='') {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->role;
        if($this->session->userdata('logged_in') AND $role == 'Administrator')
        {
                $this->db->delete("tbl_bidang", array('id_bidang' => "$id"));
                $this->session->set_flashdata('msg',
                  '
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                     </button>
                     <strong>Sukses!</strong> Berhasil dihapus.
                  </div>'
                );
                redirect('admin/c_bidang');
        }
      }

}
?>
