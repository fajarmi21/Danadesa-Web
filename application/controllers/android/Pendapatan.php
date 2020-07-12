<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();
    }
	public function index() 
	{
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_pendapatan.id_kegiatan');
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
                'tahun'             => $this->input->post('tahun'),
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
                    $r['message'] = 'update Sukses';
                } else {
                    $this->db->trans_rollback();
                    $r['status'] = '0';
                    $r['message'] = 'update Gagal';
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
            $r['message'] = 'Insert Sukses';
        } else {
            $this->db->trans_rollback();
            $r['status'] = '0';
            $r['message'] = 'Insert Gagal';
        }
        echo json_encode($r);
    }

    public function PndPls()
    {
        $this->db->join('tbl_rka_pendapatan', 'tbl_detail_pendapatan.id_rka_pendapatan=tbl_rka_pendapatan.id_rka_pendapatan');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_pendapatan.id_kegiatan');
        $this->db->where(array('tbl_rka_pendapatan.id_rka_pendapatan'=>$this->input->post('id_rka_pendapatan')));
        $sql = $this->db->get('tbl_detail_pendapatan')->result();
        echo json_encode($sql);
    }

    public function uploadDetail()
    {
        $imagename = $_FILES['imagename']['tmp_name'];
        $id_rka_pendapatan = $_POST['id_rka_pendapatan'];
        $tgl_detail_p = $_POST['tgl_detail_p'];
        $ket_detail_p = $_POST['ket_detail_p'];
        $harga_detail_p = $_POST['harga_detail_p'];

        if(!$tgl_detail_p){
          echo json_encode(array('message'=>'required file is empty.'));
        }else{

            $data = array(
                'id_rka_pendapatan'    => $id_rka_pendapatan,
                'tgl_detail_p'         => $tgl_detail_p,
                'ket_detail_p'         => $ket_detail_p,
                'harga_detail_p'       => $harga_detail_p
            );
          
            $this->db->trans_begin();
                $this->db->insert("tbl_detail_pendapatan", $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === TRUE) {
                $this->db->trans_commit();
                $r['status'] = '1';
                $r['message'] = 'Insert Sukses';
            } else {
                $this->db->trans_rollback();
                $r['status'] = '0';
                $r['message'] = 'Insert Gagal';
            }
            echo json_encode($r);
        }
    }
}