<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaksanaan extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();
    }
	public function index() 
	{

        $this->db->join('tbl_rka_belanja', 'tbl_rka_belanja.id_rka_belanja=tbl_pelaksanaan.id_rka_belanja');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_bidang=tbl_rka_belanja.id_bidang');
        $this->db->join('tbl_program', 'tbl_program.id_program=tbl_rka_belanja.id_program');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_belanja.id_kegiatan');
        $this->db->join('ref_dusun', 'ref_dusun.id_dusun=tbl_rka_belanja.id_dusun');
        $sql = $this->db->get('tbl_pelaksanaan')->result();
        echo json_encode($sql);

	}

    public function AdminPelaksanaan(){
        $this->db->join('tbl_rka_belanja', 'tbl_rka_belanja.id_rka_belanja=tbl_pelaksanaan.id_rka_belanja');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_bidang=tbl_rka_belanja.id_bidang');
        $this->db->join('tbl_program', 'tbl_program.id_program=tbl_rka_belanja.id_program');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_belanja.id_kegiatan');
        $this->db->join('ref_dusun', 'ref_dusun.id_dusun=tbl_rka_belanja.id_dusun');
        $this->db->where(array('nama_kegiatan'=>$this->input->post('nama_kegiatan')));
        $sql = $this->db->get('tbl_pelaksanaan')->result();
        echo json_encode($sql);
    }

    public function UpdatePls(){
        $this->db->trans_begin();
        $id = $this->input->post('id');
        $id_rka_belanja = $this->db->get_where("tbl_rka_belanja",array('pelaksana_kegiatan' => $this->input->post('pelaksana_kegiatan')))->row("id_rka_belanja");
        $data = array(
                'id_rka_belanja'     => $id_rka_belanja,
                'jml_tim'            => $this->input->post('jml_tim'),
                'pelaksana_kegiatan' => $this->input->post('pelaksana_kegiatan')
              );
        $this->db->update("tbl_pelaksanaan", $data, array('id_pelaksanaan' => $id));
        $this->db->trans_complete();

                if ($this->db->trans_status() === TRUE) {
                    $this->db->trans_commit();
                    $r['status'] = '1';
                    $r['message'] = 'update successfully';
                } else {
                    $this->db->trans_rollback();
                    $r['status'] = '0';
                    $r['message'] = 'update unsuccessfully';
                }
        echo json_encode($r);
    }
}