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
            <th width="10%;" style="text-align: center;">Foto</th>
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
          <td style="text-align: center;"><img src="<?php echo base_url().$baris->foto_ketua; ?>" width="50" height="50"/></td>
          <td align="center">
            <a href="c_kegiatan/edit/<?php echo $baris->id_kegiatan; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="c_kegiatan/hapus/<?php echo $baris->id_kegiatan; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php
      } ?>
    </tbody>
</table>

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
        margin-top: 7px;
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
  src: '<?php echo site_url($result->image);?>'
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

</script>

<script>

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#bukti').attr('src', e.target.result);   
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#bukti").change(function(){
    readURL(this);
  {document.getElementById("lihat").style.display = "block";}
});
</script>

<script>
function nav_active(){
	// document.getElementById("a-user").className = "collapsed active";
  document.getElementById("a-po").className = "collapsed active";
	// var r = document.getElementById("data-master");
	// r.className = "collapsed";

	var d = document.getElementById("nav-kegiatan");
	d.className = d.className + "active";
	}

  $("#imgInp").change(function(){
    readURL(this);
  {document.getElementById("blah").style.display = 'block';}
  
  });

  // very simple to use!
  $(document).ready(function() {
  nav_active();
  $('#table_id').DataTable();
});


function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
  {document.getElementById("blah").style.display = 'block';}
  
});


$( document ).ready(function() {
   
   var cek = $('input[name="is_bsm"]:checked').val();  
   if(cek == 'Y') 
   {
    document.getElementById("bsm").style.display = 'block';
   }
   else document.getElementById("bsm").style.display = 'none';
   
    document.getElementById("lihat").style.display = "block";
  $(".cropit-image-preview").reload();


});
</script>
