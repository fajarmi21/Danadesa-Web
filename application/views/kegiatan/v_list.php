<link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url');?>assetku/DataTables/datatables.min.css"/>
<script type="text/javascript" src="<?=$this->config->item('base_url');?>assetku/DataTables/dataTables.min.js"></script>
<h3><?= $page_title ?></h3>
<hr>

<a href="c_kegiatan/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Create</a>
<hr>
<?php
echo $this->session->flashdata('msg');
?>
<table id="table_id" class="table table-bordered table-striped display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="5%;">No.</th>
            <th width="15%;">Nama</th>
            <th width="10%;">NIK</th>
            <th width="20%;">Alamat</th>
            <th width="10%;">No Telp</th>
            <th width="10%;">Username</th>
            <th width="10%;">Password</th>
            <th width="10%;">Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      foreach ($v_kegiatan->result() as $baris) {?>
        <tr>
          <td><?php echo $no++; ?>.</td>
          <td><?php echo $baris->nama_kegiatan; ?></td>
          <td><?php echo $baris->nik_kegiatan; ?></td>
          <td><?php echo $baris->alamat_kegiatan; ?></td>
          <td><?php echo $baris->telp_kegiatan; ?></td>
          <td><?php echo $baris->user_kegiatan; ?></td>
          <td><?php echo $baris->pass_kegiatan; ?></td>
          <td align="center">
            <a href="c_kegiatan/edit/<?php echo $baris->id_kegiatan; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="c_kegiatan/hapus/<?php echo $baris->id_kegiatan; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php
      } ?>
    </tbody>
</table>

<script>
function nav_active(){
	// document.getElementById("a-user").className = "collapsed active";
  document.getElementById("a-po").className = "collapsed active";
	// var r = document.getElementById("data-master");
	// r.className = "collapsed";

	var d = document.getElementById("nav-kegiatan");
	d.className = d.className + "active";
	}

// very simple to use!
$(document).ready(function() {
  nav_active();
  $('#table_id').DataTable();
});
</script>
