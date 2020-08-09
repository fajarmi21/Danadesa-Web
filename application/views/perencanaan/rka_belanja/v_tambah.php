<script type="text/javascript" src="<?=$this->config->item('base_url');?>assetku/js/jquery.maskMoney.min.js"></script>
<link href="<?=$this->config->item('base_url');?>assetku/css/select2.min.css" rel="stylesheet" />
<script src="<?=$this->config->item('base_url');?>assetku/js/select2.min.js"></script>
<script src="<?=$this->config->item('base_url');?>assetku/js/jquery-ui.js"></script>

<h2><?= $page_title ?></h2>

<hr>
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><b>Form Tambah</b> </h3>
	  </div>
	  <div class="panel-body">

			<?php $flashmessage = $this->session->flashdata('exist');
				echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
				$tahun = date('Y');
				$this->db->where('tahun', $tahun);
				 ?>

			<?php echo form_open('admin/c_perencanaan/simpan_rka_belanja'); ?>

				<div class="form-group">
					 <label  class="col-md-4 control-label" for="pelaksana_kegiatan">Nama Kegiatan</label>
					 <div class="col-md-8">
						<input type="text" class="form-control input-md" name="pelaksana_kegiatan" id="pelaksana_kegiatan" size="10" placeholder="Nama Kegiatan" required/>
						<span>&nbsp;</span>
						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="id_kegiatan">Ketua Kegiatan</label>
						<div class="col-md-8">
						<select class="form-control cari_kegiatan" name="id_kegiatan" required>
								<option value=""></option>
								<?php
								foreach ($v_kegiatan->result() as $baris) {?>
									<option value="<?php echo $baris->id_kegiatan; ?>"><?php echo $baris->nama_kegiatan; ?></option>
								<?php
								} ?>
							</select>
						 <span>&nbsp;</span>
 						</div>
				</div>
			    <div class="form-group">
			    	 <label  class="col-md-4 control-label" for="id_bidang">Bidang</label>
			        <div class="col-md-8">
							<select class="form-control cari_bidang" name="id_bidang" required>
								<option value=""></option>
								<?php
								foreach ($v_bidang->result() as $baris) {?>
									<option value="<?php echo $baris->id_bidang; ?>"><?php echo $baris->nama_bidang; ?></option>
								<?php
								} ?>
							</select>
							<span>&nbsp;</span>
				      </div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="id_program">Program</label>
						<div class="col-md-8">
						<select class="form-control cari_program" name="id_program" required>
							<option value=""></option>
							<?php
							foreach ($v_program->result() as $baris) {?>
								<option value="<?php echo $baris->id_program; ?>"><?php echo $baris->nama_program; ?></option>
							<?php
							} ?>
						</select>
						<span>&nbsp;</span>
						</div>
				</div>
			  <div class="form-group">
					 <label  class="col-md-4 control-label" for="tahun">Tahun</label>
					 <div class="col-md-8">
						 <select class="form-control cari_tahun" name="tahun" required>
							 <option value=""></option>
							 <?php
							 for ($i=$tahun; $i >= 2010 ; $i--) { ?>
								 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							 <?php
							 } ?>
						 </select>
						 <span>&nbsp;</span>
 						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="id_dusun">Tingkat Kegiatan</label>
						<div class="col-md-8">
						<select class="form-control cari_dusun" name="id_dusun" required>
								<option value=""></option>
								<?php
								foreach ($v_dusun->result() as $baris) {?>
									<option value="<?php echo $baris->id_dusun; ?>"><?php echo $baris->nama_dusun; ?></option>
								<?php
								} ?>
							</select>
						 <span>&nbsp;</span>
 						</div>
				</div>
				
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="tgl_rka_belanja">Rencana Dilaksanakan</label>
					 <div class="col-md-8">
						 <input type="text" class="form-control input-md" name="tgl_rka_belanja" id="tgl_rka_belanja" value="<?php echo date('d-m-Y'); ?>" size="10" placeholder="Ditetapkan Tanggal" required/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="selesai">Rencana Selesai</label>
					 <div class="col-md-8">
						 <input type="text" class="form-control input-md" name="selesai" id="selesai" value="<?php echo date('d-m-Y'); ?>" size="10" placeholder="Ditetapkan Tanggal" required/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="anggaran">Anggaran</label>
						<div class="col-md-8">
						 <input type="text" class="form-control input-md" name="anggaran" id="anggaran" size="100" placeholder="Anggaran" required/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				<div class="form-group">
					<div class="image-editor ">
						<label class="col-md-4 control-label" for="bukti">Foto Kegiatan Pengeluaran</label>
						<div class="col-md-8">
							<div id="lihat">
								<div class="cropit-image-preview"></div>
								<input type="range" class="cropit-image-zoom-input" style="width: 200px">
								<br>
							</div>
							<input type="file" id="image" class="cropit-image-input custom" accept="image/*">
							<input type="hidden" name="image-data" class="hidden-image-data" />
							<span>&nbsp;</span>
						</div>
					</div>
				</div>

			<hr>
			<div class="form-group">
			    <label class="col-md-0 control-label" for="simpan"></label>
			    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_perencanaan/rka_belanja'"/>Batal</button>
				<button type="submit" class="btn btn-success" name="simpan" id="simpan" style="float:right;"/>Simpan</button>
			    </div>
			</div>
		</div>
	</div>

	<?php echo form_close(); ?>
</div>
<!-- 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>

 -->
 
<style>
	/* Show load indicator when image is being loaded */
	.cropit-image-preview.cropit-image-loading .spinner {
		opacity: 1;
	}

	/* Show move cursor when image has been loaded */
	.cropit-image-preview.cropit-image-loaded {
		cursor: move;
	}

	/* Gray out zoom slider when the image cannot be zoomed */
	.cropit-image-zoom-input[disabled] {
		opacity: .2;
	}


	.cropit-image-preview {
		background-color: #f8f8f8;
		background-size: cover;
		border: 1px solid #ccc;
		border-radius: 3px;
		width: 200px;
		height: 200px;
		cursor: move;
	}

	.cropit-image-background {
		opacity: .2;
		cursor: auto;
	}

	.image-size-label {
		margin-top: 10px;
	}

	input {
		display: block;
	}

	button[type="submit"] {
		margin-top: 10px;
	}
</style>
<script src="<?php echo base_url(); ?>assetku/cropit/jquery.cropit.js"></script>
<script>
	$(function() {
		$('.image-editor').cropit({
			imageState: {
				src: '<?= base_url() . $hasil->image ?>'
			}
		});

		$('form').submit(function() {
			// Move cropped image data to hidden input
			var imageData = $('.image-editor').cropit('export', {
				type: 'image/jpeg',
				quality: 2,
				originalSize: false
			});
			$('.hidden-image-data').val(imageData);

			// Prevent the form from actually submitting
			return true;
		});
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#bukti').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#bukti").change(function() {
		readURL(this); {
			document.getElementById("lihat").style.display = "block";
		}
	});

	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#blah').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

function nav_active(){
	document.getElementById("a-perencanaan").className = "collapsed active";
	var r = document.getElementById("perencanaan");
	r.className = "collapsed";

	var d = document.getElementById("nav-rka-belanja");
	d.className = d.className + "active";
}

$("#imgInp").change(function() {
		readURL(this); {
			document.getElementById("blah").style.display = 'block';
		}

	});


$(document).ready(function() {
	// document.getElementById("lihat").style.display = "block";
	// $(".cropit-image-preview").reload();

  nav_active();
	$(".cari_bidang").select2({
			placeholder: "Pilih Bidang"
	});
	$(".cari_program").select2({
			placeholder: "Pilih Program"
	});
	$(".cari_kegiatan").select2({
			placeholder: "Pilih Kegiatan"
	});
	$(".cari_dusun").select2({
			placeholder: "Pilih Tingkat Kegiatan"
	});
	$(".cari_tahun").select2({
			placeholder: "Pilih Tahun"
	});

	
	$('#anggaran').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
	var to = $("#selesai").val().split("-");
	$("#tgl_rka_belanja").datepicker({
		dateFormat: 'dd-mm-yy',
		maxDate: new Date(to[2], to[1] - 1, to[0])
	});
	var from = $("#tgl_rka_belanja").val().split("-");
	$("#selesai").datepicker({
		dateFormat: 'dd-mm-yy',
		minDate: new Date(from[2], from[1] - 1, from[0])
	});
});
</script>
