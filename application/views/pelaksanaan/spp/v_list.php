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
       text-align:center;padding:0px;padding-top:20px;padding-bottom:30px;
     }
</style>
<h3><?= $page_title ?></h3>
<hr>
<a href="spp/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Create</a>
<a href="spp/print" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> Print</a>
<hr>
<?php
echo $this->session->flashdata('msg');
?>
<div class="table-responsive">
<table id="table_id" class="table table-bordered table-striped display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="1%" rowspan="2" id="rowspan2">No.</th>
            <th width="5%" rowspan="2" id="rowspan2">Tanggal</th>
            <th width="10%" colspan="2">Bidang</th>
            <th width="10%" colspan="2">Kegiatan</th>
            <th width="10%" rowspan="2" id="rowspan2">Pemasukkan</th>
            <th width="10%" rowspan="2" id="rowspan2">Pencairan s/d yang lalu</th>
            <th width="10%" rowspan="2" id="rowspan2">Permintaan Sekarang</th>
            <th width="10%" rowspan="2" id="rowspan2">Jumlah s/d sekarang</th>
            <th width="10%" rowspan="2" id="rowspan2">Sisa Dana</th>
            <th width="9%" rowspan="2" id="rowspan2">Aksi</th>
        </tr>
        <tr>
          <th width="10%">Kode</th>
          <th width="15%">Uraian</th>
          <th width="10%">Kode</th>
          <th width="15%">Uraian</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $total_pemasukkan  = 0;
      $total_pencairan   = 0;
      $total_permintaan  = 0;
      $total_jumlah      = 0;
      $total_sisa_dana   = 0;
      foreach ($v_data->result() as $baris) {?>
        <tr>
          <th><?php echo $no++; ?>.</th>
          <td><?php echo $this->page_model->tgl_id("$baris->tgl"); ?></td>
          <td><?php echo $baris->kode_bidang; ?></td>
          <td><?php echo $baris->nama_bidang; ?></td>
          <td><?php echo $baris->kode_kegiatan; ?></td>
          <td><?php echo $baris->nama_kegiatan; ?></td>
          <td>Rp.<span style="float:right;"><?php echo number_format($baris->pemasukkan, 0,",","."); ?>,-</span></td>
          <td>Rp.<span style="float:right;"><?php echo number_format($baris->pencairan, 0,",","."); ?>,-</span></td>
          <td>Rp.<span style="float:right;"><?php echo number_format($baris->permintaan, 0,",","."); ?>,-</span></td>
          <td>Rp.<span style="float:right;"><?php echo number_format($baris->jumlah, 0,",","."); ?>,-</span></td>
          <td>Rp.<span style="float:right;"><?php echo number_format($baris->sisa_dana, 0,",","."); ?>,-</span></td>
          <td align="center">
            <!-- <a href="edit_spp/<?php echo $baris->id_spp; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> -->
            <a href="hapus_spp/<?php echo $baris->id_spp; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php
      $total_pemasukkan += $baris->pemasukkan;
      $total_pencairan  += $baris->pencairan;
      $total_permintaan += $baris->permintaan;
      $total_jumlah     += $baris->jumlah;
      $total_sisa_dana  += $baris->sisa_dana;
      } ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="6" style="text-align:right">Total :</th>
        <th><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format($total_pemasukkan,0,",","."); ?>,-</span></th>
        <th><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format($total_pencairan,0,",","."); ?>,-</span></th>
        <th><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format($total_permintaan,0,",","."); ?>,-</span></th>
        <th><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format($total_jumlah,0,",","."); ?>,-</span></th>
        <th><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format($total_sisa_dana,0,",","."); ?>,-</span></th>
        <th></th>
      </tr>
    </tfoot>
</table>
</div>
<br><br>
<script>
function nav_active(){
	// document.getElementById("a-user").className = "collapsed active";
  document.getElementById("a-pelaksanaan").className = "collapsed active";
	var r = document.getElementById("pelaksanaan");
	r.className = "collapsed";

	var d = document.getElementById("nav-spp");
	d.className = d.className + "active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
  $('#table_id').DataTable();
});
</script>
