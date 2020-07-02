<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assetku/img/sideka.ico" type="image/x-icon" />
    <style>
    table{
        border-collapse: collapse;
        /* width: 70%; */
        margin: 0 auto;
    }
    table thead th{
        border:1px solid #000;
        padding: 3px;
        font-weight: bold;
        text-align: center;
    }

    #tr_head{
        background-color: #f1f1f1;
        color: #222;
    }

    #tr_head2{
        background-color: #f0f0f0;
        color: #222;
    }

    #tr td{
        border:1px solid #000;
        background-color: #f9f9f9;
        padding: 3px;
        vertical-align: top;
    }

    #tr_foot{
        background-color: #f1f1f1;
        color: #222;
    }

  		body{
  			font-family: Arial;
  		}

      h2{
        text-align:center;
      }
  	</style>
  </head>
  <body onload="window.print()">

    <h2><?php echo $page_title; ?></h2>
    <br>
    <table border="1" width="100%">
        <thead>
            <tr id="tr_head">
                <th width="1%;" rowspan="2" style="text-align:center;">No.</th>
                <th width="15%;" colspan="2" style="text-align:center;">Bidang</th>
                <th width="15%;" colspan="2" style="text-align:center;">Program</th>
                <th width="15%;" colspan="2" style="text-align:center;">Kegiatan</th>
                <th width="21%;" rowspan="2" style="text-align:center;">Pelaksana Kegiatan</th>
                <th width="20%;" rowspan="2" style="text-align:center;">Anggaran</th>
            </tr>
            <tr id="tr_head2">
                <th width="5%">Kode</th>
                <th width="15%">Uraian</th>
                <th width="5%">Kode</th>
                <th width="15%">Uraian</th>
                <th width="5%">Kode</th>
                <th width="15%">Uraian</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          $total_anggaran = 0;
          foreach ($v_data->result() as $baris) {?>
            <tr id="tr">
              <th style="background-color: #f1f1f1;color: #222;"><?php echo $no++; ?>.</th>
              <td><?php echo $baris->kode_bidang; ?></td>
              <td><?php echo $baris->nama_bidang; ?></td>
              <td><?php echo $baris->kode_program; ?></td>
              <td><?php echo $baris->nama_program; ?></td>
              <td><?php echo $baris->kode_kegiatan; ?></td>
              <td><?php echo $baris->nama_kegiatan; ?></td>
              <td><?php echo $baris->pelaksana_kegiatan; ?></td>
              <td>Rp.<span style="float:right;"><?php echo number_format($baris->anggaran, 0,",","."); ?>,-</span></td>
            </tr>
          <?php
          $total_anggaran += $baris->anggaran;
          } ?>
        </tbody>
        <tfoot>
          <tr id="tr_foot">
            <th colspan="8" align="right">Total Anggaran :&nbsp;</th>
            <th align="left">Rp.<span style="float:right;"><?php echo number_format($total_anggaran,0,",","."); ?>,-</span></th>
          </tr>
        </tfoot>
    </table>
  </body>
</html>
