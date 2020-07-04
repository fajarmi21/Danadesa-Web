<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url();?>uploads/logonew.png" type="image/x-icon" />
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
      <thead id="tr_head">
          <tr>
              <th width="1%" rowspan="2" id="rowspan2">No.</th>
              <th width="5%" rowspan="2" id="rowspan2">Nomor</th>
              <th width="5%" rowspan="2" id="rowspan2">Tahun</th>
              <th width="35%" colspan="2">Rekening</th>
              <th width="35%" colspan="4">Anggaran</th>
         </tr>
         <tr>
              <th width="5%">Kode</th>
              <th width="15%">Uraian</th>
              <th width="5%">Jumlah</th>
              <th width="5%">Satuan</th>
              <th width="15%">Harga</th>
              <th width="15%">Anggaran</th>
          </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        $total_jumlah = 0;
        $total_harga = 0;
        $total_anggaran = 0;
        foreach ($v_data->result() as $baris) {?>
          <tr id="tr">
            <th style="background-color: #f1f1f1;color: #222;"><?php echo $no++; ?>.</th>
            <td><?php echo $baris->nomor; ?></td>
            <td><?php echo $baris->tahun; ?></td>
            <td><?php echo $baris->kode; ?></td>
            <td><?php echo $baris->uraian; ?></td>
            <td><?php echo number_format($baris->jumlah, 0,",","."); ?></td>
            <td><?php echo $baris->satuan; ?></td>
            <td>Rp.<span style="float:right;"><?php echo number_format($baris->harga, 0,",","."); ?>,-</span></td>
            <td>Rp.<span style="float:right;"><?php echo number_format($baris->anggaran, 0,",","."); ?>,-</span></td>
          </tr>
        <?php
        $total_jumlah   += $baris->jumlah;
        $total_harga    += $baris->harga;
        $total_anggaran += $baris->anggaran;
        } ?>
      </tbody>
      <tfoot id="tr_foot">
        <tr>
          <th colspan="5" style="text-align:right">Total :</th>
          <th><?php echo number_format($total_jumlah, 0,",","."); ?></th>
          <th></th>
          <th><span style="float:left;">Rp.</span><span style="float:right;"><?php echo number_format($total_harga,0,",","."); ?>,-</span></th>
          <th><span style="float:left;">Rp.</span><span style="float:right;"><?php echo number_format($total_anggaran,0,",","."); ?>,-</span></th>
        </tr>
      </tfoot>
    </table>
  </body>
</html>
