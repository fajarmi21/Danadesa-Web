
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

			<?php echo form_open('admin/c_perencanaan/update_apb_desa'); ?>

					<input type="hidden" name="id" value="<?php echo $hasil->id_apb_desa; ?>">
					<input type="hidden" name="id_nomor" value="<?php echo $hasil->nomor; ?>">
					<input type="hidden" name="id_tahun" value="<?php echo $hasil->tahun; ?>">
					<div class="form-group">
						 <label  class="col-md-6 control-label" for="nomor">Nomor</label>
						 <label  class="col-md-6 control-label" for="tahun">Tahun</label>
							<div class="col-md-6">
							 <input type="text" class="form-control input-md" name="nomor" id="nomor" size="100" placeholder="Nomor" value="<?php echo $hasil->nomor; ?>" required/>
							 <span>&nbsp;</span>
	 						</div>
						 	<div class="col-md-6">
							 <select class="form-control cari_tahun" name="tahun" required>
								 <option value=""></option>
								 <?php
								 for ($i=$tahun; $i >= 2010 ; $i--) { ?>
									 <option value="<?php echo $i; ?>" <?php if($hasil->tahun==$i){echo "selected";} ?>><?php echo $i; ?></option>
								 <?php
								 } ?>
							 </select>
							 <span>&nbsp;</span>
	 						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<div class="panel panel-info">
	 						 <div class="panel-heading">
	 					 	    <h3 class="panel-title"><b>Rekening</b> </h3>
	 					 	 </div>
	 						 <div class="panel-body">
				 				 <label  class="col-md-12 control-label" for="kode">Jenis Bank</label>
				 					<div class="col-md-12">
				 						 <input type="text" class="form-control input-md" name="kode" id="kode" value="<?php echo $hasil->kode; ?>" size="100" placeholder="Jenis Bank" required/>
				 						<span>&nbsp;</span>
				  				</div>
	 							 <label class="col-md-12 control-label" for="uraian">Nomer Rekening</label>
	 								<div class="col-md-12">
	 									<input type="number" class="form-control input-md" name="uraian" id="uraian" value="<?php echo $hasil->uraian; ?>" size="100" placeholder="Nomer Rekening">
	 									<span>&nbsp;</span>
	 								</div>
	 						 </div>
	 					 </div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<div class="panel panel-danger">
	 						 <div class="panel-heading">
	 					 	    <h3 class="panel-title"><b>Anggaran</b> </h3>
	 					 	 </div>
	 						 <div class="panel-body">
								 <div class="form-group">
										<label  class="col-md-2 control-label" for="jumlah">Jumlah</label>
										 <div class="col-md-10">
											<input type="text" class="form-control input-md" name="jumlah" id="jumlah" value="<?php echo number_format($hasil->jumlah,0,",","."); ?>" size="100" placeholder="Jumlah" required/>
											<span>&nbsp;</span>
										 </div>
								 </div>
								 <div class="form-group">
										<label  class="col-md-2 control-label" for="satuan">Satuan</label>
										 <div class="col-md-10">
											<input type="text" class="form-control input-md" name="satuan" id="satuan" value="<?php echo $hasil->satuan; ?>" size="100" placeholder="Satuan" required/>
											<span>&nbsp;</span>
										 </div>
								 </div>
								 <div class="form-group">
										<label  class="col-md-2 control-label" for="harga">Harga</label>
										 <div class="col-md-10">
											<input type="text" class="form-control input-md" name="harga" id="harga" value="Rp. <?php echo number_format($hasil->harga,0,",","."); ?>" size="100" placeholder="Harga" required/>
											<span>&nbsp;</span>
										 </div>
								 </div>
								 <div class="form-group">
										<label  class="col-md-2 control-label" for="anggaran">Anggaran</label>
										 <div class="col-md-10">
											<input type="text" class="form-control input-md" name="anggaran" id="anggaran" value="Rp. <?php echo number_format($hasil->anggaran,0,",","."); ?>" size="100" placeholder="Anggaran" required/>
											<span>&nbsp;</span>
										 </div>
								 </div>
	 						 </div>
	 					 </div>
						</div>
					</div>

				<hr>
				<div class="form-group">
				    <label class="col-md-0 control-label" for="simpan"></label>
				    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_perencanaan/apb_desa'"/>Batal</button>
						<button type="submit" class="btn btn-success" name="simpan" id="simpan" style="float:right;"/>Simpan</button>
				    </div>
				</div>
			</div>
		</div>

		<?php echo form_close(); ?>
	</div>

	<script>
	function nav_active(){
		document.getElementById("a-perencanaan").className = "collapsed active";
		var r = document.getElementById("perencanaan");
		r.className = "collapsed";

		var d = document.getElementById("nav-apb-desa");
		d.className = d.className + "active";
	}

	// very simple to use!
	$(document).ready(function() {
	  nav_active();
		$(".cari_tahun").select2({
				placeholder: "Pilih Tahun"
		});
		// $('#uraian').maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
		$('#jumlah').maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
		$('#harga').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		$('#anggaran').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
	  // $( "#ditetapkan_tgl" ).datepicker({ dateFormat: 'dd-mm-yy' });
	});
	</script>
