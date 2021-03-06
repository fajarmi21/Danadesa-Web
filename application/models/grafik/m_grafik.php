<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Grafik extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->_table='tbl_rka_belanja';
	
    //get instance
    $this->CI = get_instance();
  }
	public function getTotalPerencanaan()
    {
        //Build contents query
        $this->db->select('*')->from($this->_table);
      
        $record_count = $this->db->get();
        return $record_count->num_rows();	
    }
	
	public function getTotalPendudukByDusun($id_dusun)
    {
        //Build contents query
        $this->db->select('*')->from($this->_table)->where('id_dusun',$id_dusun);
      
        $record_count = $this->db->get();
		return $record_count->num_rows();	
    }

    public function getAdesa()
    {
        $query = $this->db->query("SELECT SUM(jumlah) as jml, tahun FROM tbl_rka_pendapatan GROUP BY tahun");
        return $query->result_array();  
    } 
    public function getPenyerapan()
    {
        $query = $this->db->query("SELECT SUM(anggaran) as jml, tahun FROM tbl_rka_belanja GROUP BY tahun");
        return $query->result_array();  
    } 

    public function getDesa()
    {
        foreach ($this->getTahun() as $key) {
            $query[] = $this->db->query("SELECT id_dusun,anggaran,tahun from tbl_rka_belanja WHERE id_dusun = '0' and tahun =".$key['tahun'])->row_array();
            $x = array('anggaran' => '0', 'tahun' => $key['tahun']);
            if (end($query) == null) $query[end((array_keys($query)))] = $x;
        }
        return $query;
    }

    public function getKrajan()
    {
        foreach ($this->getTahun() as $key) {
            $query[] = $this->db->query("SELECT id_dusun,anggaran,tahun from tbl_rka_belanja WHERE id_dusun = '4' and tahun =".$key['tahun'])->row_array();
            $x = array('anggaran' => '0', 'tahun' => $key['tahun']);
            if (end($query) == null) $query[end((array_keys($query)))] = $x;
        }
        return $query;
    }

    public function getDukut()
    {
        foreach ($this->getTahun() as $key) {
            $query[] = $this->db->query("SELECT id_dusun,anggaran,tahun from tbl_rka_belanja WHERE id_dusun = '5' and tahun =".$key['tahun'])->row_array();
            $x = array('anggaran' => '0', 'tahun' => $key['tahun']);
            if (end($query) == null) $query[end((array_keys($query)))] = $x;
        }
        return $query;
    }

    public function getDukse()
    {
        foreach ($this->getTahun() as $key) {
            $query[] = $this->db->query("SELECT id_dusun,anggaran,tahun from tbl_rka_belanja WHERE id_dusun = '6' and tahun =".$key['tahun'])->row_array();
            $x = array('anggaran' => '0', 'tahun' => $key['tahun']);
            if (end($query) == null) $query[end((array_keys($query)))] = $x;
        }
        return $query; 
    }

    public function getNgadirejo()
    {
        foreach ($this->getTahun() as $key) {
            $query[] = $this->db->query("SELECT id_dusun,anggaran,tahun from tbl_rka_belanja WHERE id_dusun = '7' and tahun =".$key['tahun'])->row_array();
            $x = array('anggaran' => '0', 'tahun' => $key['tahun']);
            if (end($query) == null) $query[end((array_keys($query)))] = $x;
        }
        return $query;
    }

    public function getTahun()
    {
        $query = $this->db->query('SELECT tahun from tbl_rka_belanja GROUP BY tahun');
        return $query->result_array();
    } 
}
