<?php
    $pintu1=0; $pintu2=0; $pintu3=0; $pintuirigasi=0;
    $sp1="c"; $sp2="c"; $sp3="c"; $spirigasi="c";
    
    $Keterangan = "Tidak ada data !!";

    for ($i=0; $i < count($isi); $i++)
    {
        $status_pintu_1[$i] = $isi[$i]->pintu_air_1;
        $status_pintu_2[$i] = $isi[$i]->pintu_air_2;
        $status_pintu_3[$i] = $isi[$i]->pintu_air_3;
        $status_irigasi[$i] = $isi[$i]->pintu_air_irigasi;

        if ($tanggal == null && $bulan == null && $tahun == null)
        {
            $Keterangan = "Dihitung dari semua data";
        }
        else
        {
            $Keterangan = "Dihitung berdasarkan tanggal, bulan, dan tahun yang diinputkan";
        }

        if ($status_pintu_1[$i] == "Open") {
            if ($sp1 == "c") {
                $pintu1 += 1;
                $sp1 = "o";
            }
        }
        else if ($status_pintu_1[$i] == "Close") {
            $sp1 = "c";
        }
        if ($status_pintu_2[$i] == "Open") {
             if ($sp2 == "c") {
                $pintu2 += 1;
                $sp2 = "o";
            }
        }
        else if ($status_pintu_2[$i] == "Close") {
            $sp2 = "c";
        }
        if ($status_pintu_3[$i] == "Open") {
             if ($sp3 == "c") {
                $pintu3 += 1;
                $sp3 = "o";
            }
        }
        else if ($status_pintu_3[$i] == "Close") {
            $sp3 = "c";
        }
        if ($status_irigasi[$i] == "Open") {
             if ($spirigasi == "c") {
                $pintuirigasi += 1;
                $spirigasi = "o";
            }
        }
        else if ($status_irigasi[$i] == "Close") {
            $spirigasi = "c";
        }

    }
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <h3 class="card-title" style="text-align: center;">Rekap Pintu Air Kontrol</h3>
                       <br>
                    </div>
                    <div class="panel-body">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                  <tr class="bg-info">
                                    <th><center>Pintu Air 1</center></th>
                                    <th><center>Pintu Air 2</center></th>
                                    <th><center>Pintu Air 3</center></th>
                                    <th><center>Pintu Air Irigasi</center></th>
                                    <th><center>Keterangan</center></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td><center><?php echo $pintu1 ; ?></center></td>
                                      <td><center><?php echo $pintu2 ; ?></center></td>
                                      <td><center><?php echo $pintu3 ; ?></center></td>
                                      <td><center><?php echo $pintuirigasi ; ?></center></td>
                                      <td><center><?php echo $Keterangan ;?></center></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php echo form_open('Monitoring/rekap_pintu_kontrol_cari') ?>
                        <ul class="text-right">
                            <label>Tanggal</label>
                            <select name="tanggal">
                                <option value="">Semua</option>
                                <?php
                                  foreach ($option_tanggal as $dataTanggal) {
                                    echo '<option value="'.$dataTanggal->tanggal.'">'.$dataTanggal->tanggal.'</option>';
                                  }
                                ?>
                            </select>
                            <label>Bulan</label>
                            <select name="bulan">
                                <option value="">Semua</option>
                                <?php
                                  foreach ($option_bulan as $dataBulan) {
                                    echo '<option value="'.$dataBulan->bulan.'">'.$dataBulan->bulan.'</option>';
                                  }
                                ?>
                            </select>
                            <label>Tahun</label>
                            <select name="tahun">
                                <option value="">Semua</option>
                                <?php
                                foreach ($option_tahun as $dataTahun) {
                                    echo '<option value="'.$dataTahun->tahun.'">'.$dataTahun->tahun.'</option>';
                                  }
                                ?>
                            </select>
                            <button type="submit" class="text-right btn btn-primary btn-sm"><a class="text-right btn btn-primary btn-sm">  <i class="fa fa-search"></i> Cari</a></button>
                        </ul>
                    <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>