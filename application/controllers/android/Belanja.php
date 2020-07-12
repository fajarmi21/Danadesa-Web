<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();
    }
	public function index() 
	{
        $this->db->join('tbl_bidang', 'tbl_bidang.id_bidang=tbl_rka_belanja.id_bidang');
        $this->db->join('tbl_program', 'tbl_program.id_program=tbl_rka_belanja.id_program');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_belanja.id_kegiatan');
        $this->db->join('ref_dusun', 'ref_dusun.id_dusun=tbl_rka_belanja.id_dusun');
        $sql = $this->db->get('tbl_rka_belanja')->result();
        echo json_encode($sql);

        // echo "hh";
	}

	public function AdminBelanja()
	{ 
		$this->db->join('tbl_bidang', 'tbl_bidang.id_bidang=tbl_rka_belanja.id_bidang');
        $this->db->join('tbl_program', 'tbl_program.id_program=tbl_rka_belanja.id_program');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_belanja.id_kegiatan');
        $this->db->join('ref_dusun', 'ref_dusun.id_dusun=tbl_rka_belanja.id_dusun');
        $this->db->where(array('nama_kegiatan'=>$this->input->post('nama_kegiatan')));
        $sql = $this->db->get('tbl_rka_belanja')->result();
        echo json_encode($sql);
	}

    public function UpdateBlj()
    {
        $this->db->trans_begin();
        $id = $this->input->post('id');
        $id_bidang = $this->db->get_where("tbl_bidang",array('nama_bidang' => $this->input->post('nama_bidang')))->row("id_bidang");
        $id_program = $this->db->get_where("tbl_program",array('nama_program' => $this->input->post('nama_program')))->row("id_program");
        $id_kegiatan = $this->db->get_where("tbl_kegiatan",array('nama_kegiatan' => $this->input->post('nama_kegiatan')))->row("id_kegiatan");
        $id_dusun = $this->db->get_where("ref_dusun",array('nama_dusun' => $this->input->post('nama_dusun')))->row("id_dusun");
        $data = array(
                'id_bidang'          => $id_bidang,
                'id_program'         => $id_program,
                'id_kegiatan'        => $id_kegiatan,
                'pelaksana_kegiatan' => $this->input->post('pelaksana_kegiatan'),
                'tahun'              => $this->input->post('tahun'),
                'id_dusun'           => $id_dusun,
                'tgl_rka_belanja'    => $this->input->post('tgl_rka_belanja'),
                'selesai'            => $this->input->post('selesai'),
                'anggaran'           => preg_replace('/[Rp. ]/', '', $this->input->post('anggaran'))
              );
        $this->db->update("tbl_rka_belanja", $data, array('id_rka_belanja' => $id));
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

    public function ADeleteBlj(){
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
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_belanja.id_kegiatan', 'left');
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

    public function PrcPls()
    {
        $this->db->join('tbl_rka_belanja', 'tbl_detail.id_rka_belanja=tbl_rka_belanja.id_rka_belanja');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan=tbl_rka_belanja.id_kegiatan');
        $this->db->where(array('tbl_rka_belanja.id_rka_belanja'=>$this->input->post('id_rka_belanja')));
        $sql = $this->db->get('tbl_detail')->result();
        echo json_encode($sql);
    }
    

    public function uploadDetail()
    {
        $imagename = $_FILES['imagename']['tmp_name'];
        $id_rka_belanja = $_POST['id_rka_belanja'];
        $tgl_detail = $_POST['tgl_detail'];
        $keterangan_detail = $_POST['keterangan_detail'];
        $harga_detail = $_POST['harga_detail'];

        if(!$imagename){
          echo json_encode(array('message'=>'required file is empty.'));
        }else{
            $dir = 'uploads/detail/';
            
            $newname = $dir . date('Ymdhms') . $this->input->post('id_rka_belanja') . '.jpg';
            
            move_uploaded_file($imagename, $newname);

            $data = array(
                'id_rka_belanja'     => $id_rka_belanja,
                'tgl_detail'         => $tgl_detail,
                'keterangan_detail'  => $keterangan_detail,
                'harga_detail'       => $harga_detail,
                'nota_detail'        => $newname
            );
          
            $this->db->trans_begin();
                $this->db->insert("tbl_detail", $data);
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

    public function deleteDetail()
    {      
        $this->db->trans_begin();
            $this->db->delete('tbl_detail', array('nota_detail' => $this->input->post('nota_detail')));
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

    public function updateDetail()
    {
        $id_rka_belanja = $_POST['id_rka_belanja'];
        $data['tgl_detail'] = $_POST['tgl_detail'];
        $data['keterangan_detail'] = $_POST['keterangan_detail'];
        $keterangan_detail_a = $_POST['keterangan_detail_a'];
        $data['harga_detail'] = $_POST['harga_detail'];

        if($_POST['imagename'] != "kosong"){
            $imagename = $_FILES['imagename']['tmp_name'];
            $dir = 'uploads/detail/';
            
            $newname = $dir . date('Ymdhms') . $this->input->post('id_rka_belanja') . '.jpg';
            
            move_uploaded_file($imagename, $newname);
            $data['nota_detail'] = $newname;
        }
          
        // $this->db->trans_begin();
        $this->db->update("tbl_detail", $data, array('keterangan_detail' => $keterangan_detail_a));
        // $this->db->trans_complete();
        if ($this->db->affected_rows() > 0) {
            // $this->db->trans_commit();
            $r['status'] = '1';
            $r['message'] = 'Update Sukses';
        } else {
            // $this->db->trans_rollback();
            $r['status'] = '0';
            $r['message'] = $this->db->affected_rows();
        }
        $x['message'] = $_POST['imagename'];
        echo json_encode($r);
    }
}