<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadangan extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();
    }
	public function index() 
	{
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_apb_desa.id_kegiatan');
        $this->db->join('tbl_bank', 'tbl_bank.id_bank=tbl_apb_desa.id_bank');
        $sql = $this->db->get('tbl_apb_desa')->result();
        echo json_encode($sql);

        // echo "hh";
	}

	public function AdminCadangan()
	{ 
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_apb_desa.id_kegiatan');
        $this->db->join('tbl_bank', 'tbl_bank.id_bank=tbl_apb_desa.id_bank');
        $this->db->where(array('nama_kegiatan'=>$this->input->post('nama_kegiatan')));
        $sql = $this->db->get('tbl_apb_desa')->result();
        echo json_encode($sql);
	}

    public function UpdateDnc()
    {
        // $this->db->trans_begin();
        $id = $this->input->post('id');
        $id_bank = $this->db->get_where("tbl_bank",array('nama_bank' => $this->input->post('nama_bank')))->row("id_bank");
        $id_kegiatan = $this->db->get_where("tbl_kegiatan",array('nama_kegiatan' => $this->input->post('nama_kegiatan')))->row("id_kegiatan");
        $data = array(
            'tahun'              => $this->input->post('tahun'),
            'nama_apb'           => $this->input->post('nama_apb'),
            'id_kegiatan'        => $id_kegiatan,
            'jumlah'             => $this->input->post('jumlah'),
            'anggaran'           => $this->input->post('anggaran'),
            'tgl_apb_desa'       => $this->input->post('tgl_apb_desa'),
            'id_bank'            => $id_bank,
            'uraian'             => $this->input->post('uraian'),
            'satuan'             => $this->input->post('satuan'),
            'harga'              => $this->input->post('harga'),
              );
        $this->db->update("tbl_apb_desa", $data, array('id_apb_desa' => $id));
        // $this->db->trans_complete();
            if ($this->db->affected_rows() > 0) {
                // $this->db->trans_commit();
                $r['status'] = '1';
                $r['message'] = 'update Sukses';
            } else {
                // $this->db->trans_rollback();
                $r['status'] = '0';
                $r['message'] = $this->db->affected_rows();
            }
        echo json_encode($r);
    }

    public function ADeleteDnc(){
        $this->db->trans_begin();
        $id = $this->input->post('id');
        $this->db->update("tbl_rka_belanja", array('id_kegiatan' => null), array('id_rka_belanja' => $id));
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();
            $r['status'] = '1';
            $r['message'] = 'Delete Sukses';
        } else {
            $this->db->trans_rollback();
            $r['status'] = '0';
            $r['message'] = 'Delete Gagal';
        }
        echo json_encode($r);

    }

    public function kegiatan()
    {
        $this->db->select('tbl_rka_belanja.pelaksana_kegiatan');
        $this->db->join('tbl_bidang', 'tbl_bidang.id_bidang=tbl_rka_belanja.id_bidang');
        $this->db->join('tbl_program', 'tbl_program.id_program=tbl_rka_belanja.id_program');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_belanja.id_kegiatan');
        $this->db->join('ref_dusun', 'ref_dusun.id_dusun=tbl_rka_belanja.id_dusun');
        $this->db->where(array('tbl_rka_belanja.id_kegiatan' => null));
        $sql = $this->db->get('tbl_rka_belanja')->result();
        echo json_encode($sql);
    }

    public function kegiatanU()
    {
        $this->db->trans_begin();
        $x = $this->db->get_where('tbl_kegiatan', array('nama_kegiatan' => $this->input->post('nama_kegiatan')))->row('id_kegiatan');
        $this->db->update("tbl_rka_belanja", array('id_kegiatan' => $x), array('pelaksana_kegiatan' => $this->input->post('pelaksana_kegiatan')));
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();
            $r['status'] = '1';
            $r['message'] = 'Update Sukses';
        } else {
            $this->db->trans_rollback();
            $r['status'] = '0';
            $r['message'] = 'Update Gagal';
        }
        echo json_encode($r);
    }
}