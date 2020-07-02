<script type="text/javascript" src="<?=$this->config->item('base_url');?>assetku/js/jquery.maskMoney.min.js"></script>
<link href="<?=$this->config->item('base_url');?>assetku/css/select2.min.css" rel="stylesheet" />
<script src="<?=$this->config->item('base_url');?>assetku/js/select2.min.js"></script>
<script src="<?=$this->config->item('base_url');?>assetku/js/jquery-ui.js"></script>

<h3><?= $page_title ?></h3>
Silahkan tentukan tahun dibawah ini.
<hr>
<div class="form-group">
   <label  class="col-md-2 control-label" for="tgl">Pilih Tahun</label>
    <div class="col-md-2">
      <select class="form-control cari_tahun" name="tahun" required>
        <option value=""></option>
        <?php
        $tahun = date('Y');
        for ($i=$tahun; $i >= 2010 ; $i--) { ?>
          <option value="<?php echo $i; ?>" <?php if($tahun==$i){echo "selected";} ?>><?php echo $i; ?></option>
        <?php
        } ?>
      </select>
    </div>

      <input type="button" onclick="btnproses();" class="btn btn-primary" name="proses" value="Proses" style="width:80px;">

</div>

</div>
<br><br>
<script>
function nav_active(){
	// document.getElementById("a-user").className = "collapsed active";
  document.getElementById("a-lap").className = "collapsed active";
	var r = document.getElementById("lap");
	r.className = "collapsed";

	var d = document.getElementById("nav-lad");
	d.className = d.className + "active";
	}

function btnproses()
{
  var thn = $('[name="tahun"]').val();
  window.open("<?=$this->config->item('base_url');?>admin/c_perencanaan/print_apb_desa/"+thn, "_blank");
}

// very simple to use!
$(document).ready(function() {
  nav_active();
  $(".cari_tahun").select2({
			placeholder: "Pilih Tahun"
	});
  $('#table_id').DataTable();
});
</script>
