
<script type="text/javascript" src="<?=$this->config->item('base_url');?>assetku/js/jquery.maskMoney.min.js"></script>
<link href="<?=$this->config->item('base_url');?>assetku/css/select2.min.css" rel="stylesheet" />
<script src="<?=$this->config->item('base_url');?>assetku/js/select2.min.js"></script>

<h2><?= $page_title ?></h2>

<hr>
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><b>Form Edit</b> </h3>
	  </div>
	  <div class="panel-body">

			<?php $flashmessage = $this->session->flashdata('exist');
				echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';

				$tahun = date('Y');
				echo $this->session->flashdata('msg');
				 ?>

			<?php echo form_open('admin/c_pelaksanaan/update_spp'); ?>

					<input type="hidden" name="id" value="<?php echo $hasil->id_spp; ?>">
					<div class="form-group">
						 <label  class="col-md-4 control-label" for="tgl">Tanggal</label>
							<div class="col-md-8">
								<input type="text" class="form-control input-md" name="tgl" id="tgl" value="<?php if($hasil->tgl == ''){echo date('d-m-Y');}else{echo $hasil->tgl;} ?>" size="10" placeholder="Tanggal" required/>
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
									<option value="<?php echo $baris->id_bidang; ?>" <?php if($hasil->id_bidang==$baris->id_bidang){echo "selected";} ?>><?php echo $baris->nama_bidang; ?></option>
								<?php
								} ?>
							</select>
							<span>&nbsp;</span>
				      </div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="id_kegiatan">Kegiatan</label>
						<div class="col-md-8">
						<select class="form-control cari_kegiatan" name="id_kegiatan" required>
							<option value=""></option>
							<?php
							foreach ($v_kegiatan->result() as $baris) {?>
								<option value="<?php echo $baris->id_kegiatan; ?>" <?php if($hasil->id_kegiatan==$baris->id_kegiatan){echo "selected";} ?>><?php echo $baris->nama_kegiatan; ?></option>
							<?php
							} ?>
						</select>
						<span>&nbsp;</span>
						</div>
			  </div>
					<div class="form-group">
						 <label  class="col-md-4 control-label" for="pemasukkan">Pemasukkan</label>
							<div class="col-md-8">
							 <input type="text" class="form-control input-md" name="pemasukkan" id="pemasukkan" size="100" value="Rp. <?php echo number_format($hasil->pemasukkan, 0,",","."); ?>" placeholder="Pemasukkan" required/>
							 <span>&nbsp;</span>
	 						</div>
					</div>
					<div class="form-group">
						 <label  class="col-md-4 control-label" for="pencairan">Pencairan s/d yang lalu</label>
							<div class="col-md-8">
							 <input type="text" class="form-control input-md" name="pencairan" id="pencairan" size="100" value="Rp. <?php echo number_format($hasil->pencairan, 0,",","."); ?>" placeholder="Pencairan s/d yang lalu"/>
							 <span>&nbsp;</span>
	 						</div>
					</div>
					<div class="form-group">
						 <label  class="col-md-4 control-label" for="permintaan">Permintaan Sekarang</label>
							<div class="col-md-8">
							 <input type="text" class="form-control input-md" name="permintaan" id="permintaan" size="100" value="Rp. <?php echo number_format($hasil->permintaan, 0,",","."); ?>" placeholder="Permintaan Sekarang" required/>
							 <span>&nbsp;</span>
	 						</div>
					</div>
					<div class="form-group">
						 <label  class="col-md-4 control-label" for="jumlah">Jumlah s/d sekarang</label>
							<div class="col-md-8">
							 <input type="text" class="form-control input-md" name="jumlah" id="jumlah" size="100" value="Rp. <?php echo number_format($hasil->jumlah, 0,",","."); ?>" placeholder="Jumlah s/d sekarang" required/>
							 <span>&nbsp;</span>
	 						</div>
					</div>
					<div class="form-group">
						 <label  class="col-md-4 control-label" for="sisa_dana">Sisa Dana</label>
							<div class="col-md-8">
							 <input type="text" class="form-control input-md" name="sisa_dana" id="sisa_dana" size="100" value="Rp. <?php echo number_format($hasil->sisa_dana, 0,",","."); ?>" placeholder="Sisa Dana" required/>
							 <span>&nbsp;</span>
	 						</div>
					</div>

				<hr>
				<div class="form-group">
				    <label class="col-md-0 control-label" for="simpan"></label>
				    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_pelaksanaan/spp'"/>Batal</button>
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

		var d = document.getElementById("nav-spp");
		d.className = d.className + "active";
	}

	// very simple to use!
	$(document).ready(function() {
	  nav_active();
		$(".cari_bidang").select2({
				placeholder: "Pilih Bidang"
		});
		$(".cari_kegiatan").select2({
				placeholder: "Pilih Kegiatan"
		});
		$('#pemasukkan').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		$('#pencairan').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		$('#permintaan').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		$('#jumlah').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		$('#sisa_dana').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		$( "#tgl" ).datepicker({ dateFormat: 'dd-mm-yy' });
	});
	</script>
