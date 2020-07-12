<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_kegiatan extends CI_Controller {

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
        $data['page_title'] = 'Ketua Kegiatan';
        $this->db->order_by('kode_kegiatan', 'ASC');
        $data['v_kegiatan'] = $this->db->get('tbl_kegiatan');
		    $data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
        $data['content'] = $this->load->view('kegiatan/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function add(){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Administrator')
		{
			$data['page_title'] = 'Tambah Ketua Kegiatan';
			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
			$data['content'] = $this->load->view('kegiatan/v_tambah', $data, TRUE);
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');

    }

    function simpan() {
      $session['hasil'] = $this->session->userdata('logged_in');
      $role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Administrator')
      {
          $nama_kegiatan = $this->input->post('nama_kegiatan', TRUE);
          $nik_kegiatan =$this->input->post('nik_kegiatan', TRUE);
          $alamat_kegiatan = $this->input->post('alamat_kegiatan', TRUE);
          $telp_kegiatan = $this->input->post('telp_kegiatan',TRUE);
          $user_kegiatan = $this->input->post('user_kegiatan',TRUE);
          $pass_kegiatan = $this->input->post('pass_kegiatan',TRUE);

      		$this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'nik_kegiatan', 'alamat_kegiatan', 'telp_kegiatan', 'user_kegiatan', 'pass_kegiatan', 'required');

      		if ($this->form_validation->run() == TRUE)
      		{
            $newfile = $this->input->post('image-data', TRUE);
    
            define('UPLOAD_DIR', 'uploads/');
            $img = $newfile;
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = UPLOAD_DIR . $this->input->post('kode_kegiatan') . '.jpg';
            $success = file_put_contents($file, $data);
            $path = $file;

            // $tahun = date('Y');
            // $this->db->where('thn', $tahun);
            $this->db->order_by('kode_kegiatan', 'DESC');
            $this->db->limit(1);
            $cek_na = $this->db->get('tbl_kegiatan');
            if ($cek_na->num_rows() == 0) {
              $no_urut        = "K001";
            }else{
              $noUrut 	    		= substr($cek_na->row()->kode_kegiatan, 1, 3);
              $noUrut++;
              $no_urut				= "K".sprintf("%03s", $noUrut);
            }

      				$data = array(
                'kode_kegiatan'   => $no_urut,
      					'nama_kegiatan'   => $nama_kegiatan,
                'nik_kegiatan'    => $nik_kegiatan,
                'alamat_kegiatan' => $alamat_kegiatan,
                'telp_kegiatan'   => $telp_kegiatan,
                'user_kegiatan'   => $user_kegiatan,
                'pass_kegiatan'   => $pass_kegiatan,
                'foto_ketua'      => $path
      				);
      				$this->db->insert("tbl_kegiatan",$data);
              $this->session->set_flashdata('msg',
                '
                <div class="alert alert-success alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                   </button>
                   <strong>Sukses!</strong> Berhasil ditambah.
                </div>'
              );
      				redirect('admin/c_kegiatan');

          }
      		else $this->add();
      }
    }

      function edit($id=''){
          $session['hasil'] = $this->session->userdata('logged_in');
      		$role = $session['hasil']->role;
      		if($this->session->userdata('logged_in') AND $role == 'Administrator')
      		{
      			$data['hasil'] = $this->db->get_where("tbl_kegiatan", array('id_kegiatan' => "$id"))->row();

      			$data['page_title'] = 'Edit Ketua Kegiatan';
      			$data['menu'] = $this->load->view('menu/v_admin', $data, TRUE);
      			$data['content'] = $this->load->view('kegiatan/v_ubah', $data, TRUE);

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
            $nama_kegiatan = $this->input->post('nama_kegiatan', TRUE);
            $nik_kegiatan =$this->input->post('nik_kegiatan', TRUE);
            $alamat_kegiatan = $this->input->post('alamat_kegiatan', TRUE);
            $telp_kegiatan = $this->input->post('telp_kegiatan',TRUE);
            $user_kegiatan = $this->input->post('user_kegiatan',TRUE);
            $pass_kegiatan = $this->input->post('pass_kegiatan',TRUE);




        		$this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan','nik_kegiatan', 'alamat_kegiatan', 'telp_kegiatan', 'user_kegiatan', 'pass_kegiatan', 'required');

        		if ($this->form_validation->run() == TRUE)
        		{

              $newfile = $this->input->post('image-data', TRUE);
    
            define('UPLOAD_DIR', 'uploads/');
            $img = $newfile;
            $img = str_replace('data:image/jpeg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = UPLOAD_DIR . $this->input->post('kode_kegiatan') . '.jpg';
            $success = file_put_contents($file, $data);
            $path = $file;

        				$data = array(
        					'nama_kegiatan' => $nama_kegiatan,
                  'nik_kegiatan' => $nik_kegiatan,
                  'alamat_kegiatan' => $alamat_kegiatan,
                  'telp_kegiatan' => $telp_kegiatan,
                  'user_kegiatan' => $user_kegiatan,
                  'pass_kegiatan' => $pass_kegiatan,
                  'foto_ketua'      => $path
        				);
        				$this->db->update("tbl_kegiatan", $data, array('id_kegiatan' => "$id"));
                $this->session->set_flashdata('msg',
                  '
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                     </button>
                     <strong>Sukses!</strong> Berhasil diupdate.
                  </div>'
                );
        				redirect('admin/c_kegiatan');

            }
        		else $this->add();
        }
      }

      function hapus($id='') {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->role;
        if($this->session->userdata('logged_in') AND $role == 'Administrator')
        {
                $this->db->delete("tbl_kegiatan", array('id_kegiatan' => "$id"));
                $this->session->set_flashdata('msg',
                  '
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                     </button>
                     <strong>Sukses!</strong> Berhasil dihapus.
                  </div>'
                );
                redirect('admin/c_kegiatan');
        }
      }

}
?>
