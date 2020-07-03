<link rel="stylesheet" type="text/css" href="<?= $this->config->item('base_url'); ?>assetku/DataTables/datatables.min.css" />
<script type="text/javascript" src="<?= $this->config->item('base_url'); ?>assetku/DataTables/dataTables.min.js"></script>
<h3><?= $page_title ?></h3>
<hr>
<?php
echo $this->session->flashdata('msg');
?>
<div class="col-md-12">
  <div class="col-md-6">
    <h4 style="margin:0px; margin-bottom: 10px;">
      <center>Dana Desa</center>
    </h4>
    <table id="table_dana" class="table table-bordered table-striped display responsive" width="100%">
      <thead>
        <tr>
          <th width="12%;">No.</th>
          <th>Tahun</th>
          <th>Dana Masuk</th>
          <th>Dana Keluar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($v_danadesa as $baris) { ?>
              <tr>
                <td><?= $no++; ?>.</td>
                <td><?= $baris["tahun"]; ?></td>
                <?php if ($baris["dm"]) { ?>
                  <td><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format($baris["dm"],0,",","."); ?>,-</span></td>
                  <td><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format(null,",","."); ?>,-</span></td>
                <?php } else { ?>
                  <td><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format(null,",","."); ?>,-</span></td>
                  <td><span style="margin-left:-8px;">Rp.</span><span style="float:right;margin-right:-7px;"><?php echo number_format($baris["dk"],0,",","."); ?>,-</span></td>
                <?php } ?>
              </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <h4 style="margin:0px; margin-bottom: 10px;">
      <center>Dana Cadangan</center>
    </h4>
    <table id="table_cad" class="table table-bordered table-striped display responsive" width="100%">
      <thead>
        <tr>
          <th width="12%;">No.</th>
          <th>Keterangan</th>
          <th>Tgl</th>
          <th>Dana Masuk</th>
          <th>Dana Keluar</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>

<script>
  function nav_active() {
    // document.getElementById("a-user").className = "collapsed active";
    document.getElementById("a-data-master").className = "collapsed active";
    var r = document.getElementById("data-master");
    r.className = "collapsed";

    var d = document.getElementById("nav-dana");
    d.className = d.className + "active";
  }

  // very simple to use!
  $(document).ready(function() {
    nav_active();
    $('#table_dana').DataTable();
    $('#table_cad').DataTable();
  });
</script>