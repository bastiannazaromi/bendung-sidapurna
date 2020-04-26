<?php
    foreach($isi as $data){
        $waktu[] = $data->waktu;
        $tinggi_air[] = (float) $data->tinggi_air;
        $limpasan_air[] = (float) $data->limpasan_air;
    }
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="grafik col-md-12">
                <div class="card">
                    <div class="card-header">
                        
                    </div>
                    <div id="grafik" style="width:100%; height:480px;"></div>
                    <div class=" col-md-12">
                        <?php echo form_open('Dashboard/grafik_rekap_cari') ?>
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
</section>

<script src="<?php echo base_url ('assets/template/admin/dist/js/highcharts.js') ;?>"></script>
<script src="<?php echo base_url ('assets/template/admin/dist/js/exporting.js') ;?>"></script>
<script src="<?php echo base_url ('assets/template/admin/dist/js/series-label.js') ;?>"></script>
<script src="<?php echo base_url ('assets/template/admin/dist/js//export-data.js') ;?>"></script>

<script type="text/javascript">
    Highcharts.chart('grafik', {
        chart:{
            type: 'column'
        },
        title: {
            text: 'Grafik Ketinggian Air'
        },

        yAxis: {
            title: {
                text: 'Ketinggian'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        xAxis: {
            categories: <?php echo json_encode($waktu);?>
        },

        series: [{
            name: 'Tinggi Air',
            data: <?php echo json_encode($tinggi_air);?>
        },
        {
            name: 'Tinggi Limpasan',
            data: <?php echo json_encode($limpasan_air);?>
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script>