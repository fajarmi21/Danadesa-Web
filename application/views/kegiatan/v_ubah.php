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

			<?php echo form_open('admin/c_kegiatan/update'); ?>

          <input type="hidden" name="id" value="<?php echo $hasil->id_kegiatan; ?>">
			    <div class="form-group">
			    	 <label  class="col-md-4 control-label" for="nama_kegiatan">Nama Ketua Kegiatan</label>
			        <div class="col-md-8">
			         <input type="text" class="form-control input-md" name="nama_kegiatan" id="nama_kegiatan" size="100" value="<?php echo $hasil->nama_kegiatan; ?>" placeholder="Nama Kegiatan" required/>
			         <span class="help-block">
					<?php echo form_error('username', '<p class="field_error">','</p>')?>
			        </span>
			        </div>

			         <label  class="col-md-4 control-label" for="nik_kegiatan">NIK</label>
			        <div class="col-md-8">
			         <input type="number" class="form-control input-md" name="nik_kegiatan" id="nik_kegiatan" size="100" value="<?php echo $hasil->nik_kegiatan; ?>" placeholder="NIK" required/>
			         <span class="help-block">
					<?php echo form_error('username', '<p class="field_error">','</p>')?>
			        </span>
			        </div>

			         <label  class="col-md-4 control-label" for="alamat_kegiatan">Alamat</label>
			        <div class="col-md-8">
			         <input type="text" class="form-control input-md" name="alamat_kegiatan" id="alamat_kegiatan" size="100" value="<?php echo $hasil->alamat_kegiatan; ?>" placeholder="Dusun - RT/RW" required/>
			         <span class="help-block">
					<?php echo form_error('username', '<p class="field_error">','</p>')?>
			        </span>
			        </div>

			         <label  class="col-md-4 control-label" for="telp_kegiatan">No. Telp</label>
			        <div class="col-md-8">
			         <input type="number" class="form-control input-md" name="telp_kegiatan" id="telp_kegiatan" size="100" value="<?php echo $hasil->telp_kegiatan; ?>" placeholder="No. Telp" required/>
			         <span class="help-block">
					<?php echo form_error('username', '<p class="field_error">','</p>')?>
			        </span>
			        </div>

			         <label  class="col-md-4 control-label" for="user_kegiatan">Username</label>
			        <div class="col-md-8">
			         <input type="text" class="form-control input-md" name="user_kegiatan" id="user_kegiatan" size="100" value="<?php echo $hasil->user_kegiatan; ?>" placeholder="Username" required/>
			         <span class="help-block">
					<?php echo form_error('username', '<p class="field_error">','</p>')?>
			        </span>
			        </div>

			         <label  class="col-md-4 control-label" for="pass_kegiatan">Password</label>
			        <div class="col-md-8">
			         <input type="password" class="form-control input-md" name="pass_kegiatan" id="[pass_kegiatan]" size="100" value="<?php echo $hasil->pass_kegiatan; ?>" placeholder="Password" required/>
			         <span class="help-block">
					<?php echo form_error('username', '<p class="field_error">','</p>')?>
			        </span>
			        </div>
				</div>

			<hr>
			<div class="form-group">
			    <label class="col-md-0 control-label" for="simpan"></label>
			    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_kegiatan'"/>Batal</button>
					<button type="submit" class="btn btn-success" name="simpan" id="simpan" style="float:right;"/>Update</button>
			    </div>
			</div>
		</div>
	</div>

	<?php echo form_close(); ?>
</div>

<script>
function nav_active(){
	document.getElementById("a-po").className = "collapsed active";
	// var r = document.getElementById("data-master");
	// r.className = "collapsed";

	var d = document.getElementById("nav-kegiatan");
	d.className = d.className + "active";
}

// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>
