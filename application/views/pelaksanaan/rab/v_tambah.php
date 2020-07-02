
<script type="text/javascript" src="<?=$this->config->item('base_url');?>assetku/js/jquery.maskMoney.min.js"></script>
<link href="<?=$this->config->item('base_url');?>assetku/css/select2.min.css" rel="stylesheet" />
<script src="<?=$this->config->item('base_url');?>assetku/js/select2.min.js"></script>

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

			<?php echo form_open('admin/c_pelaksanaan/simpan_rab'); ?>


			    <div class="form-group">
			    	 <label  class="col-md-4 control-label" for="id_rka_belanja">Rencana Kegiatan</label>
			        <div class="col-md-8">

					<?php foreach($idp as $id){?>
					<input type="hidden" name="idp" value="<?php echo $id['id_rka_belanja']+1;?>" required/>
					<?php } ?>
							<select class="form-control cari_bidang" name="id_rka_belanja" required>
								<option value=""></option>
								<?php
								foreach ($v_rka_belanja->result() as $baris) {?>
									<option value="<?php echo $baris->id_rka_belanja; ?>"><?php echo $baris->pelaksana_kegiatan; ?></option>
								<?php
								} ?>
							</select>
							<span>&nbsp;</span>
				      </div>
				</div>
				<!-- <div class="form-group">
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
					 <label  class="col-md-4 control-label" for="pelaksana_kegiatan">Keterangan</label>
						<div class="col-md-8">
							<textarea name="pelaksana_kegiatan" rows="3" cols="80" class="form-control" placeholder="Uraian Kegiatan" required></textarea>
						<span>&nbsp;</span>
						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="tgl_rka_belanja">Rencana Dilaksanakan</label>
					 <div class="col-md-8">
						 <input type="text" class="form-control input-md" name="tgl_rka_belanja" id="tgl_rka_belanja" value="<?php echo date('d-m-Y'); ?>" size="10" placeholder="Ditetapkan Tanggal" required/>
						 <span>&nbsp;</span>
 						</div>
				</div> -->
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="jml_tim">Jumlah Tim</label>
						<div class="col-md-8">
						 <input type="text" class="form-control input-md" name="jml_tim" id="jml_tim" size="100" placeholder="Jumlah Tim" required/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				<!-- <div class="form-group">
					 <label  class="col-md-4 control-label" for="tgl">Tanggal</label>
						<div class="col-md-8">
						 <input type="date" class="form-control input-md" name="tgl" id="jml_tim" size="100" placeholder="Jumlah Tim" required/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="ket">Keterangan</label>
						<div class="col-md-8">
						 <input type="text" class="form-control input-md" name="ket" id="jml_tim" size="100" placeholder="Keterangan" required/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="harga">Harga</label>
						<div class="col-md-8">
						 <input type="number" class="form-control input-md" name="harga" id="jml_tim" size="100" placeholder="Harga" required/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="nota">Nota</label>
						<div class="col-md-8">
						 <input type="number" class="form-control input-md" name="nota" id="jml_tim" size="100" placeholder="No nota" required/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				 -->
				<!-- <div class="form-group">
					 <label  class="col-md-4 control-label" for="anggaran">Anggaran</label>
						<div class="col-md-8">
						 <input type="text" class="form-control input-md" name="anggaran" id="anggaran" size="100" placeholder="Anggaran" required/>
						 <span>&nbsp;</span>
 						</div>
				</div> -->

				<!-- <div class="form-group"> 
					<div class="image-editor ">	
						<label class="col-md-4 control-label" for="image">Foto 1</label>
						<div class="col-md-8">
							<div id="lihat">
							<div class="cropit-image-preview" ></div>				
								<input type="range" class="cropit-image-zoom-input" style="width: 200px">
								<br>
							</div>
							<input type="file" id="ft1" class="cropit-image-input custom" accept="image/*">
							<input type="hidden" name="image-data" class="hidden-image-data" />		
							<span>&nbsp;</span>		
						</div>
			
					</div>				
				</div>	 -->

			<hr>
			<div class="form-group">
			    <label class="col-md-0 control-label" for="simpan"></label>
			    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_pelaksanaan/rab'"/>Batal</button>
					<button type="submit" class="btn btn-success" name="simpan" id="simpan" style="float:right;"/>Simpan</button>
			    </div>
			</div>
		</div>
	</div>

	<?php echo form_close(); ?>
</div>


<script>
function nav_active(){
	document.getElementById("a-pelaksanaan").className = "collapsed active";
	var r = document.getElementById("pelaksanaan");
	r.className = "collapsed";

	var d = document.getElementById("nav-rab");
	d.className = d.className + "active";
}






// very simple to use!
$(document).ready(function() {
  nav_active();
	$(".cari_bidang").select2({
			placeholder: "Pilih Rencana Kegiatan"
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
	$( "#tgl_rka_belanja" ).datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>
