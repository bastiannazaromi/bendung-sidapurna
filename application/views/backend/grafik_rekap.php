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

<script type="text/javascript" src="<?php echo base_url('assets/template/admin/dist/js/highcharts.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/admin/dist/js/exporting.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/admin/dist/js/highcharts-3d.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url ('assets/template/admin/dist/js//export-data.js') ;?>"></script>

<script>
    var chart;
    var total=0;
    function tampil(){
            $.ajax({
                url:'<?php echo base_url('Dashboard/get_grafik_rekap')?>',
                dataType:'json',
                success:function(result){
                    if (result.length>total){
                        total=result.length;
                        var i;
                        var tinggi_air = [];
                        var limpasan_air = [];
                        var waktu = [];

                        for(i=0; i<result.length; i++){
                            tinggi_air[i] = Number(result[i].tinggi_air);
                            limpasan_air[i] = Number(result[i].limpasan_air);
                            waktu[i] = result[i].waktu;
                            chart.series[0].setData(tinggi_air);
                            chart.series[1].setData(limpasan_air);
                            chart.xAxis[0].setCategories(waktu);
                        }
                        
                    }
                    else if (result.length<=total)
                    {
                        var i;
                        var tinggi_air = [];
                        var limpasan_air = [];
                        var waktu = [];
                        for(i=0; i<result.length; i++){
                            tinggi_air[i] = Number(result[i].tinggi_air);
                            limpasan_air[i] = Number(result[i].limpasan_air);
                            waktu[i] = result[i].waktu;
                            chart.series[0].setData(tinggi_air);
                            chart.series[1].setData(limpasan_air);
                            chart.xAxis[0].setCategories(waktu);
                        }
                        
                    }

                    setTimeout(tampil, 2000); 
                }
            });
    }
    
    document.addEventListener('DOMContentLoaded',function(){
        
        chart=Highcharts.chart('grafik',{
            chart:{
            type: 'column',
            events:{
                    load:tampil
                }
            },
            title:{
                text:'Rekap Ketinggian Air'
            },

            yAxis: {
                title: {
                    text: 'Ketinggian'
                }
            },

            xAxis: {
                
            },
            
            series:[{
                name:"Tinggi Air"
            },
            {
                name:"Limpasan Air"
            }]
        });
    });    
</script>