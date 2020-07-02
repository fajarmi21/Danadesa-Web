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
      <thead id="tr_head">
        <tr>
            <th width="1%" rowspan="2" id="rowspan2">No.</th>
            <th width="5%" rowspan="2" id="rowspan2">Tanggal</th>
            <th width="10%" colspan="2">Bidang</th>
            <th width="10%" colspan="2">Kegiatan</th>
            <th width="10%" rowspan="2" id="rowspan2">Pemasukkan</th>
            <th width="10%" rowspan="2" id="rowspan2">Pencairan s/d yang lalu</th>
            <th width="10%" rowspan="2" id="rowspan2">Permintaan Sekarang</th>
            <th width="10%" rowspan="2" id="rowspan2">Jumlah s/d sekarang</th>
            <th width="10%" rowspan="2" id="rowspan2">Sisa Dana</th>
        </tr>
        <tr>
          <th width="5%">Kode</th>
          <th width="10%">Uraian</th>
          <th width="5%">Kode</th>
          <th width="10%">Uraian</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        $total_pemasukkan  = 0;
        $total_pencairan   = 0;
        $total_permintaan  = 0;
        $total_jumlah      = 0;
        $total_sisa_dana   = 0;
        foreach ($v_data->result() as $baris) {?>
          <tr id="tr">
            <th style="background-color: #f1f1f1;color: #222;"><?php echo $no++; ?>.</th>
            <td><?php echo $this->page_model->tgl_id("$baris->tgl"); ?></td>
            <td><?php echo $baris->kode_bidang; ?></td>
            <td><?php echo $baris->nama_bidang; ?></td>
            <td><?php echo $baris->kode_kegiatan; ?></td>
            <td><?php echo $baris->nama_kegiatan; ?></td>
            <td>Rp.<span style="float:right;"><?php echo number_format($baris->pemasukkan, 0,",","."); ?>,-</span></td>
            <td>Rp.<span style="float:right;"><?php echo number_format($baris->pencairan, 0,",","."); ?>,-</span></td>
            <td>Rp.<span style="float:right;"><?php echo number_format($baris->permintaan, 0,",","."); ?>,-</span></td>
            <td>Rp.<span style="float:right;"><?php echo number_format($baris->jumlah, 0,",","."); ?>,-</span></td>
            <td>Rp.<span style="float:right;"><?php echo number_format($baris->sisa_dana, 0,",","."); ?>,-</span></td>
          </tr>
        <?php
        $total_pemasukkan += $baris->pemasukkan;
        $total_pencairan  += $baris->pencairan;
        $total_permintaan += $baris->permintaan;
        $total_jumlah     += $baris->jumlah;
        $total_sisa_dana  += $baris->sisa_dana;
        } ?>
      </tbody>
      <tfoot id="tr_foot">
        <tr>
          <th colspan="6" style="text-align:right">Total :</th>
          <th><span style="float:left;">Rp.</span><span style="float:right;"><?php echo number_format($total_pemasukkan,0,",","."); ?>,-</span></th>
          <th><span style="float:left;">Rp.</span><span style="float:right;"><?php echo number_format($total_pencairan,0,",","."); ?>,-</span></th>
          <th><span style="float:left;">Rp.</span><span style="float:right;"><?php echo number_format($total_permintaan,0,",","."); ?>,-</span></th>
          <th><span style="float:left;">Rp.</span><span style="float:right;"><?php echo number_format($total_jumlah,0,",","."); ?>,-</span></th>
          <th><span style="float:left;">Rp.</span><span style="float:right;"><?php echo number_format($total_sisa_dana,0,",","."); ?>,-</span></th>
        </tr>
      </tfoot>
    </table>
  </body>
</html>
