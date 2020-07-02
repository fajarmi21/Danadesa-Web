<h2><?= $page_title ?></h2>
<hr>
<div class="col-md-3"></div>
<div class="col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><b>Form Edit</b> </h3>
	  </div>
	  <div class="panel-body">

			<?php $flashmessage = $this->session->flashdata('exist');
				echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': ''; ?>

			<?php echo form_open('admin/c_bidang/update'); ?>

          <input type="hidden" name="id" value="<?php echo $hasil->id_bidang; ?>">
			    <div class="form-group">
			    	 <label  class="col-md-4 control-label" for="nama_bidang">Nama Bidang</label>
			        <div class="col-md-8">
			         <input type="text" class="form-control input-md" name="nama_bidang" id="nama_bidang" size="100" value="<?php echo $hasil->nama_bidang; ?>" placeholder="Nama Bidang" required/>
			         <span class="help-block">
					<?php echo form_error('username', '<p class="field_error">','</p>')?>
			        </span>
			        </div>
				</div>

			<hr>
			<div class="form-group">
			    <label class="col-md-0 control-label" for="simpan"></label>
			    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_bidang'"/>Batal</button>
					<button type="submit" class="btn btn-success" name="simpan" id="simpan" style="float:right;"/>Update</button>
			    </div>
			</div>
		</div>
	</div>

	<?php echo form_close(); ?>
</div>

<script>
function nav_active(){
	document.getElementById("a-data-master").className = "collapsed active";
	var r = document.getElementById("data-master");
	r.className = "collapsed";

	var d = document.getElementById("nav-bidang");
	d.className = d.className + "active";
}

// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>
