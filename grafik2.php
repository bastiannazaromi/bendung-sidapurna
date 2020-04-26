        <div class="container">
            <div id="grafik2"></div>
        </div>    
        
        
        <script type="text/javascript" src="<?php echo base_url('assets/highchart/highcharts.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/highchart/exporting.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/highchart/highcharts-3d.js')?>"></script>
        <script>
            var chart;
            var total=0;
            function tampil(){
                    $.ajax({
                        url:'<?php echo base_url('sensor_gas/get_data_sensor')?>',
                        dataType:'json',
                        success:function(result){
                            if (result.length>total){
                                total=result.length;
                                var d_akhir=result.pop();
                                var d_sensor=Number(d_akhir.sensor_gas);
                                chart.series[0].addPoint(d_sensor,true,true);
                                
                            }
                            setTimeout(tampil, 1000); 
                        }
                    });
            }
            document.addEventListener('DOMContentLoaded',function(){
                
                chart=Highcharts.chart('grafik2',{
                    chart:{
                        events:{
                            load:tampil
                        }
                    },
                    title:{
                        text:'Grafik2'
                    },
                    series:[{
                        name:"Gafik",
                        data:[40,60,80,75]
                    }]
                });
            });    
        </script>