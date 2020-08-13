<link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url');?>assetku/DataTables/datatables.min.css"/>
<script type="text/javascript" src="<?=$this->config->item('base_url');?>assetku/DataTables/dataTables.min.js"></script>

<style>
     .dataTable > thead > tr > th[class*="sort"]::after{display: none}
     table.dataTable thead .sorting,
     table.dataTable thead .sorting_asc,
     table.dataTable thead .sorting_desc {
        background : none;
     }

     #rowspan2{
       text-align:center;padding:0px;padding-top:15px;padding-bottom:15px;
     }
</style>
<h3><?= $page_title ?></h3>
<hr>

<a href="rka_belanja/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Create</a>
<!-- <a href="rka_belanja/print" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> Print</a> -->
<hr>
<?php
echo $this->session->flashdata('msg');
?>
<div class="table-responsive">
<table id="table_id" class="table table-bordered table-striped display" cellspacing="0" width="100%">
    <thead>
            <th width="1%;" style="text-align: center">No.</th>
            <th width="16%;" style="text-align: center">Nama Kegiatan</th>
            <th width="10%;" style="text-align: center">Bidang</th>
            <th width="10%;" style="text-align: center">Program</th>
            <th width="10%;" style="text-align: center">Ketua Kegiatan</th>
            <th width="5%;" style="text-align: center">Tahun</th>
            <th width="10%;" style="text-align: center">Tingkat Kegiatan</th>
            <th width="8%;" style="text-align: center">Rencana Dimulai</th>
            <th width="8%;" style="text-align: center">Rencana Selesai</th>
            <th width="10%;" style="text-align: center">Anggaran</th>
            <th width="10%;" style="text-align: center">Aksi</th>
    </thead>
    <tbody>
      <?php
      $no=1;
      $total_anggaran = 0;
      foreach ($v_data->result() as $baris) {?>
        <tr>
          <td><?php echo $no++; ?>.</td>
          <td><?php echo $baris->pelaksana_kegiatan; ?></td>
          <td><?php echo $baris->nama_bidang; ?></td>
          <td><?php echo $baris->nama_program; ?></td>
          <td><?php echo $baris->nama_kegiatan; ?></td>
          <td><?php echo $baris->tahun; ?></td>
          <td><?php echo $baris->nama_dusun; ?></td>
          <td><?php echo $this->page_model->tgl_id(Date("d-m-Y",strtotime($baris->tgl_rka_belanja))); ?></td>
          <td><?php echo $this->page_model->tgl_id("$baris->selesai"); ?></td>
          <td>Rp.<span style="float:right;"><?php echo number_format($baris->anggaran, 0,",","."); ?>,-</span></td>

          <td align="center">
            <a href="edit_rka_belanja/<?php echo $baris->id_rka_belanja; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="hapus_rka_belanja/<?php echo $baris->id_rka_belanja; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php
      $total_anggaran += $baris->anggaran;
      } ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="9" style="text-align:right">Total Anggaran :</th>
        <th><span style="margin-left:-18px;"> Rp.</span><span style="float:right;margin-right:-17px;"><?php echo number_format($total_anggaran,0,",","."); ?>,-</span></th>

      </tr>
    </tfoot>
</table>
</div>

<script>
function nav_active(){
	// document.getElementById("a-user").className = "collapsed active";
  document.getElementById("a-perencanaan").className = "collapsed active";
	var r = document.getElementById("perencanaan");
	r.className = "collapsed";

	var d = document.getElementById("nav-rka-belanja");
	d.className = d.className + "active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
  $('#table_id').DataTable({
  });
});
</script>
