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
       text-align:center;padding:0px;padding-top:15px;padding-bottom:15px;
     }
</style>
<h3><?= $page_title ?></h3>
<!-- <div class="alert alert-info alert-dismissible" role="alert">
  <b>Pembiayaan Desa</b><br>
  Adalah pembentukan dana cadangan, hasil penjualan kekayaan desa yang dipisahkan dan penyertaan modal desa.
</div> --><!-- 
<a href="apb_desa/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Create</a>
<a href="apb_desa/print" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> Print</a> -->
<hr>
<?php
echo $this->session->flashdata('msg');
?>
<div class="table-responsive">
<table id="table_id" class="table table-bordered table-striped display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="text-align: center"  rowspan="2" id="rowspan2">No.</th>
            <th style="text-align: center"  rowspan="2" id="rowspan2">Nama Dana Cadangan</th>
            <th style="text-align: center"  rowspan="2" id="rowspan2">Tahun</th>
            <th style="text-align: center"  colspan="3">Rekening</th>
            <th style="text-align: center"  colspan="3">Anggaran</th>
            <!-- <th style="text-align: center"  rowspan="2" id="rowspan2">Aksi</th> -->
       </tr>
       <tr>
            <th style="text-align: center" >Jenis Bank</th>
            <th style="text-align: center" >No Rekening</th>
            <th style="text-align: center" >Nama Pembeli</th>
            <th style="text-align: center" >Satuan</th>
            <th style="text-align: center" >Harga</th>
            <th style="text-align: center" >Terjual</th>
       </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $total_harga = 0;
      $total_anggaran = 0;
      foreach ($v_data->result() as $baris) {?>
        <tr>
         <th><?php echo $no++; ?>.</th>
          <td><?php echo $baris->nama_apb; ?></td>
          <td><?php echo $baris->tahun; ?></td>
          <td><?php echo $baris->nama_bank; ?></td>
          <td><?php echo $baris->uraian; ?></td>
          <td><?php echo $baris->satuan; ?></td>
          <td><?php echo $baris->jumlah; ?></td>
          <td>Rp.<span style="float:right;"><?php echo number_format($baris->anggaran, 0,",","."); ?>,-</span></td>
          <td>Rp.<span style="float:right;"><?php echo number_format($baris->harga, 0,",","."); ?>,-</span></td>
          <!-- <td align="center">
            <a href="edit_apb_desa/<?php echo $baris->id_apb_desa; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="hapus_apb_desa/<?php echo $baris->id_apb_desa; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a>
          </td> -->
        </tr>
      <?php
      $total_harga    += $baris->harga;
      } ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="8" style="text-align:right">Total :</th>
        <th><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-8px;"><?php echo number_format($total_harga,0,",","."); ?>,-</span></th>
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

	var d = document.getElementById("nav-pls-apb");
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
