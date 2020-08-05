<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();
    }
	public function index() 
	{

        $sql["Prc"] = $this->db->query("SELECT SUM(jumlah) as jml FROM tbl_rka_pendapatan")->row('jml');
		$sql["Pnd"] = $this->db->query("SELECT SUM(anggaran) as ang FROM tbl_rka_belanja")->row('ang');
        $sql["total"] = $sql["Prc"] - $sql["Pnd"];        
        
        
        // $keg = $this->db->get_where('tbl_kegiatan', array('nama_kegiatan'=>$this->input->post('nama_kegiatan')))->row();
        // $sql['nik'] = $keg->nik_kegiatan;
        // $sql['foto'] = $keg->foto_ketua;

        // $this->db->join('tbl_bidang', 'tbl_bidang.id_bidang=tbl_rka_belanja.id_bidang');
        // $this->db->join('tbl_program', 'tbl_program.id_program=tbl_rka_belanja.id_program');
        // $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_belanja.id_kegiatan');
        // $this->db->join('ref_dusun', 'ref_dusun.id_dusun=tbl_rka_belanja.id_dusun');
        // $this->db->where(array('nama_kegiatan'=>$this->input->post('nama_kegiatan')));
        // $sql["prc"] = $this->db->get('tbl_rka_belanja')->num_rows();

        // $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_pendapatan.id_kegiatan');
        // $this->db->where(array('nama_kegiatan'=>$this->input->post('nama_kegiatan')));
        // $sql["pnd"] = $this->db->get('tbl_rka_pendapatan')->num_rows();
        
        // $sql["dana"] = $sql["pnd"] + $sql["prc"];
        echo json_encode($sql);
	}
}