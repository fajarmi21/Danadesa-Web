<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();
    }
	public function index() 
	{
        // $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_pendapatan.id_kegiatan');
        $sql = $this->db->get('tbl_rka_pendapatan')->result();
        echo json_encode($sql);

        // echo "hh";
	}

    public function AdminPendapatan(){
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_pendapatan.id_kegiatan');
        $this->db->where(array('nama_kegiatan'=>$this->input->post('nama_kegiatan')));
        $sql = $this->db->get('tbl_rka_pendapatan')->result();
        echo json_encode($sql);
    }

    public function UpdatePnd(){
        $this->db->trans_begin();
        $id = $this->input->post('id');
        $id_kegiatan = $this->db->get_where("tbl_kegiatan",array('nama_kegiatan' => $this->input->post('nama_kegiatan')))->row("id_kegiatan");
        $data = array(
                'id_rka_pendapatan' => $this->input->post('id_rka_pendapatan'),
                'id_kegiatan'       => $id_kegiatan,
                'tahun_pendapatan'  => $this->input->post('tahun_pendapatan'),
                'jenis'             => $this->input->post('jenis'),
                'lokasi_kegiatan'   => $this->input->post('lokasi_kegiatan'),
                'jumlah'            => $this->input->post('jumlah'),
                'tgl_pembahasan'    => $this->input->post('tgl_pembahasan'),
                'kelompok'          => $this->input->post('kelompok')
              );
        $this->db->update("tbl_rka_pendapatan", $data, array('id_rka_pendapatan' => $id));
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

    public function KegiatanPND(){
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_pendapatan.id_kegiatan', 'left');
        $this->db->where(array('tbl_rka_pendapatan.id_kegiatan' => null));
        $sql = $this->db->get('tbl_rka_pendapatan')->result();
        echo json_encode($sql);
    }

    public function KegiatanPNDU(){
        $this->db->trans_begin();
        $x = $this->db->get_where('tbl_kegiatan', array('nama_kegiatan' => $this->input->post('nama_kegiatan')))->row('id_kegiatan');
        $this->db->update("tbl_rka_pendapatan", array('id_kegiatan' => $x), array('jenis' => $this->input->post('jenis')));
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();
            $r['status'] = '1';
            $r['message'] = 'Insert successfully';
        } else {
            $this->db->trans_rollback();
            $r['status'] = '0';
            $r['message'] = 'Insert unsuccessfully';
        }
        echo json_encode($r);
    }
}