<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<style>
     .dataTable > thead > tr > th[class*="sort"]::after{display: none}
     table.dataTable thead .sorting,
     table.dataTable thead .sorting_asc,
     table.dataTable thead .sorting_desc {
        background : none;
     }

     #rowspan2{
       text-align:center;padding:0px;padding-bottom:30px;
     }
</style>
<h3><?= $page_title ?></h3>

<!-- <a href="rab/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Create</a> -->
<!-- <a href="rab/print" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> Print</a> -->
<hr>
<?php
echo $this->session->flashdata('msg');
?>
<div class="table-responsive">
<table id="table_id" class="table table-bordered table-striped display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th  style="text-align: center">No.</th>
            <th  style="text-align: center">Nama Perencanaan</th>
            <th  style="text-align: center">Bidang</th>
            <th  style="text-align: center">Program</th>
            <th  style="text-align: center">Ketua Kegiatan</th>
            <th  style="text-align: center">Tahun</th>
            <th  style="text-align: center">Tingkat Kegiatan</th>
            <th  style="text-align: center">Rencana Dimulai</th>
            <th  style="text-align: center">Rencana Selesai</th>
            <th  style="text-align: center">Dana Anggaran</th>
            <th  style="text-align: center">Dana Pengeluaran</th>
            <th  style="text-align: center">Sisa Dana</th>
            <th  style="text-align: center">Aksi</th>
        </tr>
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
          <td><?php echo $this->page_model->tgl_id("$baris->tgl_rka_pendapatan"); ?></td>
          <td><?php echo $this->page_model->tgl_id("$baris->selesai"); ?></td>
          <td><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format($baris->anggaran,0,",","."); ?>,-</span></td>
          <td>Rp.<span style="float:right;">
          <?php
            $this->db->select_sum('harga_detail')->from('tbl_detail')->where(array('id_rka_belanja' => $baris->id_rka_belanja));
            $query = $this->db->get()->row('harga_detail');
            // var_dump($query);
            echo number_format($query, 0,",",".");
          ?>,-</span></td>
          <td><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format(($baris->anggaran-$query), 0,",","."); ?>,-</span></td>
          <td align="center">
            <a href="detail/<?php echo $baris->id_rka_belanja; ?>" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i></a>
            <!-- <a href="hapus_rab/<?php echo $baris->id_rka_belanja; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a> -->
          </td>
        </tr>
      <?php
      // $sisa_anggaran = $anggaran - $query;
      $total_anggaran += $query;
      } ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="10" style="text-align:right">Total Pengeluaran :</th>
        <th><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format($total_anggaran,0,",","."); ?>,-</span></th>
        <th colspan="2" ></th>
      </tr>
    </tfoot>
</table>
</div>


<script>
function nav_active(){
	// document.getElementById("a-user").className = "collapsed active";
  document.getElementById("a-pelaksanaan").className = "collapsed active";
	var r = document.getElementById("pelaksanaan");
	r.className = "collapsed";

	var d = document.getElementById("nav-rab");
	d.className = d.className + "active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
  $('#table_id').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
    });
});
</script>
