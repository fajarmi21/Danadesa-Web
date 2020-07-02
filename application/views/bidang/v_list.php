<link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url');?>assetku/DataTables/datatables.min.css"/>
<script type="text/javascript" src="<?=$this->config->item('base_url');?>assetku/DataTables/dataTables.min.js"></script>
<h3><?= $page_title ?></h3>
<hr>

<a href="c_bidang/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Create</a>
<hr>
<?php
echo $this->session->flashdata('msg');
?>
<table id="table_id" class="table table-bordered table-striped display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="7%;">No.</th>
            <th width="10%;">Kode Bidang</th>
            <th width="70%;">Nama Bidang</th>
            <th width="13%;">Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      foreach ($v_bidang->result() as $baris) {?>
        <tr>
          <td><?php echo $no++; ?>.</td>
          <td><?php echo $baris->kode_bidang; ?></td>
          <td><?php echo $baris->nama_bidang; ?></td>
          <td align="center">
            <a href="c_bidang/edit/<?php echo $baris->id_bidang; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="c_bidang/hapus/<?php echo $baris->id_bidang; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php
      } ?>
    </tbody>
</table>

<script>
function nav_active(){
	// document.getElementById("a-user").className = "collapsed active";
  document.getElementById("a-data-master").className = "collapsed active";
	var r = document.getElementById("data-master");
	r.className = "collapsed";

	var d = document.getElementById("nav-bidang");
	d.className = d.className + "active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
  $('#table_id').DataTable();
});
</script>
