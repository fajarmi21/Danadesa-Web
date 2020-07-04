
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
				<?php echo form_open('admin/c_pelaksanaan/update_pls_apb'); ?>
					<input type="hidden" name="id" value="<?php echo $hasil->id_apb_desa; ?>">

				<div class="form-group">
					 <label  class="col-md-4 control-label" for="nama_apb">Nama Dana Cadangan</label>
						<div class="col-md-8">
						 <input type="text" class="form-control input-md" name="nama_apb" value="<?php echo $hasil->nama_apb; ?>" id="nama_apb" size="100" placeholder="Nama Dana Cadangan" readonly/>
 						<span>&nbsp;</span>
 						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="tahun">Tahun</label>
						<div class="col-md-8">
						 <input type="text" class="form-control input-md" name="tahun" value="<?php echo $hasil->tahun; ?>" id="tahun" size="100" placeholder="Tahun" readonly/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="nama_kegiatan">Ketua Kegiatan</label>
						<div class="col-md-8">
						<input type="text" class="form-control input-md" name="nama_kegiatan" value="<?php echo $v_kegiatan->nama_kegiatan; ?>" id="nama_kegiatan" size="100"  readonly/>
						 <span>&nbsp;</span>
 						</div>
				</div>
				<div class="form-group">
					 <label  class="col-md-4 control-label" for="tgl_apb_desa">Tanggal Pembahasan</label>
						<div class="col-md-8">
						 <input type="text" class="form-control input-md" name="tgl_apb_desa" id="tgl_apb_desa" value="<?php if($hasil->tgl_apb_desa == ''){echo date('d-m-Y');}else{echo $hasil->tgl_apb_desa;} ?>" size="10" placeholder="Tanggal Pembahasan" readonly/>
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
			 				 <label  class="col-md-12 control-label" for="id_bank">Jenis Bank</label>
			 					<div class="col-md-12">
			 						 <select class="form-control cari_bank" name="id_bank" required>
										<option value=""></option>
									<?php
										foreach ($v_bank->result() as $baris) {?>
											<option value="<?php echo $baris->id_bank; ?>" <?php if($hasil->id_bank==$baris->id_bank){echo "selected";} ?>><?php echo $baris->nama_bank; ?></option>
										<?php
										} ?>
									</select>	
			 						 <span>&nbsp;</span>
			  				</div>
 							 <label class="col-md-12 control-label" for="uraian">Nomer Rekening</label>
 								<div class="col-md-12">
 									<input type="number" class="form-control input-md" name="uraian" value="<?php echo $hasil->uraian; ?>" id="uraian" size="100" placeholder="Nomer Rekening" required/>
 									<span>&nbsp;</span>
 								</div>
			  				<label class="col-md-12 control-label" for="satuan">Nama Pembeli</label>
 								<div class="col-md-12">
 									<input type="text" class="form-control input-md" name="satuan" value="<?php echo $hasil->satuan; ?>" id="satuan" size="100" placeholder="Nama Pembeli" required/>
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
									<label  class="col-md-2 control-label" for="jumlah">Satuan</label>
									 	<div class="col-md-10">
										 <input type="text" class="form-control input-md" name="jumlah" value="<?php echo $hasil->jumlah; ?>" id="jumlah" size="100" placeholder="Satuan" readonly/>
										<span>&nbsp;</span>
									 	</div>
							 	</div>
							 	<div class="form-group">
									<label  class="col-md-2 control-label" for="anggaran">Harga</label>
									   <div class="col-md-10">
										<input type="text" class="form-control input-md" name="anggaran" value="Rp. <?php echo number_format($hasil->anggaran,0,",","."); ?>" id="anggaran" size="100" placeholder="Harga" readonly/>
										<span>&nbsp;</span>
									   </div>
							 	</div>
							 	<div class="form-group">
									<label  class="col-md-2 control-label" for="harga">Terjual</label>
									<div class="col-md-10">
										<input type="text" class="form-control input-md" name="harga" value="Rp. <?php echo number_format($hasil->harga,0,",","."); ?>" id="harga" size="100" placeholder="Terjual" required/>
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
				    <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="location.href='<?= base_url() ?>admin/c_pelaksanaan/pls_apb'"/>Batal</button>
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

	var d = document.getElementById("nav-pls-apb");
		d.className = d.className + "active";
	}

	// very simple to use!
	$(document).ready(function() {
	  nav_active();
		// $(".cari_tahun").select2({
		// 		placeholder: "Pilih Tahun"
		// });
		$(".cari_tahun").select2("readonly", true);
		$(".cari_bank").select2({
				placeholder: "Pilih Bank"
		});
		$(".cari_ket").select2({
				placeholder: "Pilih Bank"
		});

	$('#anggaran').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
	$('#harga').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
    $( "#tgl_apb_desa" ).datepicker({ dateFormat: 'dd-mm-yy' });
	});
	</script>
