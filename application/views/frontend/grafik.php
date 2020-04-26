<div class="content-wrapper">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
            
            </div>
            <div class="panel-body">
                <div id="grafik" style="width:100%; height:450px;"></div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url ('assets/template/admin/dist/js/jquery_1_11_3.min.js') ;?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/admin/dist/js/highcharts.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/admin/dist/js/exporting.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/admin/dist/js/highcharts-3d.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url ('assets/template/admin/dist/js//export-data.js') ;?>"></script>

<script>
var chart;
var total=0;
function tampil(){
        $.ajax({
            url:'<?php echo base_url('Monitoring/get_realtime')?>',
            dataType:'json',
            success:function(result){
                if (result.length>total){
                    total=result.length;
                    var d_tinggi_air = [];
                    var d_limpasan_air = [];
                    var d_waktu = [];
                    var d_akhir = result.pop();
                    var level = d_akhir.level;

                    if (level == "Siaga")
                    {
                        chart.series[0].update({color: "#ffff00"});
                        chart.series[1].update({color: "#b3b300"});
                    }
                    else if (level == "Awas")
                    {
                        chart.series[0].update({color: "#ff0000"});
                        chart.series[1].update({color: "#b30000"});
                    }
                    else if (level == "Siap")
                    {
                        chart.series[0].update({color: "#00aaff"}); 
                        chart.series[1].update({color: "#0077b3"});
                    }
                    else if (level == "Normal")
                    {
                        chart.series[0].update({color: "#33cc33"});
                        chart.series[1].update({color: "#248f24"});
                    }

                    d_tinggi_air[0] = Number(d_akhir.tinggi_air);
                    d_limpasan_air[0] = Number(d_akhir.limpasan_air);
                    d_waktu[0] = d_akhir.waktu;

                    chart.series[0].setData(d_tinggi_air);
                    chart.series[1].setData(d_limpasan_air);
                    chart.xAxis[0].setCategories(d_waktu);

                    chart.setTitle(null, { text: level});
                }
                else if (result.length<=total)
                {
                    var d_tinggi_air = [];
                    var d_limpasan_air = [];
                    var d_waktu = [];
                    var d_akhir = result.pop();
                    var level = d_akhir.level;

                    if (level == "Siaga")
                    {
                        chart.series[0].update({color: "#ffff00"});
                        chart.series[1].update({color: "#b3b300"});
                    }
                    else if (level == "Awas")
                    {
                        chart.series[0].update({color: "#ff0000"});
                        chart.series[1].update({color: "#b30000"});
                    }
                    else if (level == "Siap")
                    {
                        chart.series[0].update({color: "#00aaff"}); 
                        chart.series[1].update({color: "#0077b3"});
                    }
                    else if (level == "Normal")
                    {
                        chart.series[0].update({color: "#33cc33"});
                        chart.series[1].update({color: "#248f24"});
                    }

                    d_tinggi_air[0] = Number(d_akhir.tinggi_air);
                    d_limpasan_air[0] = Number(d_akhir.limpasan_air);
                    d_waktu[0] = d_akhir.waktu;

                    chart.series[0].setData(d_tinggi_air);
                    chart.series[1].setData(d_limpasan_air);
                    chart.xAxis[0].setCategories(d_waktu);

                    chart.setTitle(null, { text: 'Level : '+level});
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
            text:'Grafik Ketinggian Air'
        },

        subtitle: {

        },

        yAxis: {
            title: {
                text: 'Ketinggian'
            }
        },

        xAxis: [{

        },
        {

        }],

        series:[{
            name:"Tinggi Air"
        },
        {
            name:"Limpasan Air"
        }]
    });
});    
</script>