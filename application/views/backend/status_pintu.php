<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                    <label>Keterangan</label><br>
                    <label>Pintu Air Utama : &nbsp</label><label class="keterangan"></label><br>
                    <label>Pintu Air irigasi : &nbsp</label><label class="keterangan2"></label>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><center>Pintu Air 1</center></h3>
                            </div>
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal dan Waktu</label>
                                        <input type="text" disabled="disabled" class="form-control" id="waktu_1">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-primary btn-block"><b>Status : </b><b id="pintu_air_1"></b></a>
                                </div>
                            </form>
                        </div>
                    </div>
            
                    <div class="col-lg-6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><center>Pintu Air 2</center></h3>
                            </div>
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal dan Waktu</label>
                                        <input type="text" disabled="disabled" class="form-control" id="waktu_2">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-primary btn-block"><b>Status : </b><b id="pintu_air_2"></b></a>
                                </div>
                            </form>
                        </div>
                    </div>
            
                    <div class="col-lg-6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><center>Pintu Air 3</center></h3>
                            </div>
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal dan Waktu</label>
                                        <input type="text" disabled="disabled" class="form-control" id="waktu_3">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-primary btn-block"><b>Status : </b><b id="pintu_air_3"></b></a>
                                </div>
                            </form>
                        </div>
                    </div>
                  
                    <div class="col-lg-6">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><center>Pintu Air Irigasi</center></h3>
                            </div>
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal dan Waktu</label>
                                        <input type="text" disabled="disabled" class="form-control" id="waktu_irigasi">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-primary btn-block"><b>Status : </b><b id="pintu_air_irigasi"></b></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        
<script type="text/javascript" src="<?php echo base_url('assets/template/admin/dist/js/highcharts.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/admin/dist/js/exporting.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/admin/dist/js/highcharts-3d.js')?>"></script>

<script>
  var total = 0;
  var d_waktu_kontrol;
  var d_waktu_otomatis;
  var pintu_air_1 = "";
  var pintu_air_2 = "";
  var pintu_air_3 = "";
  var pintu_air_irigasi = "";
  var status_pintu_air_1 = "";
  var status_pintu_air_2 = "";
  var status_pintu_air_3 = "";

  function pintu_air_utama(){
    $.ajax({
        url:'<?php echo base_url('Dashboard/get_realtime')?>',
        dataType:'json',
        success:function(result){
            if (result.length>total){
                total=result.length;
                var d_akhir=result.pop();

                d_waktu_otomatis=d_akhir.waktu;
                
                status_pintu_air_1 = d_akhir.status_pintu_air_1;
                status_pintu_air_2 = d_akhir.status_pintu_air_2;
                status_pintu_air_3 = d_akhir.status_pintu_air_3;
            }
            else if (result.length<=total)
            {
                var d_akhir=result.pop();
                d_waktu_otomatis=d_akhir.waktu;
                
                status_pintu_air_1 = d_akhir.status_pintu_air_1;
                status_pintu_air_2 = d_akhir.status_pintu_air_2;
                status_pintu_air_3 = d_akhir.status_pintu_air_3;
            }
            setTimeout(pintu_air_utama, 2000); 
        }
    });
  }

  function pintu_air_kontrol(){
    $.ajax({
        url:'<?php echo base_url('Dashboard/get_kontrol_pintu')?>',
        dataType:'json',
        success:function(result){
            if (result.length>total){
                total=result.length;
                var d_akhir=result.pop();

                d_waktu_kontrol=d_akhir.waktu;

                pintu_air_1 = d_akhir.pintu_air_1;
                pintu_air_2 = d_akhir.pintu_air_2;
                pintu_air_3 = d_akhir.pintu_air_3;
                pintu_air_irigasi = d_akhir.pintu_air_irigasi;
            }
            else if (result.length<=total)
            {
                var d_akhir=result.pop();

                d_waktu_kontrol=d_akhir.waktu;

                pintu_air_1 = d_akhir.pintu_air_1;
                pintu_air_2 = d_akhir.pintu_air_2;
                pintu_air_3 = d_akhir.pintu_air_3;
                pintu_air_irigasi = d_akhir.pintu_air_irigasi;
            }
            setTimeout(pintu_air_kontrol, 2000); 
        }
    });
  }

  function tampil(){
    $.ajax({
      success:function(result){
        if (pintu_air_1 == "Close" && pintu_air_2 == "Close" && pintu_air_3 == "Close")
        {
          $('.keterangan').text("Terotomatisasi");
          $('#waktu_1').val(d_waktu_otomatis);
          $('#waktu_2').val(d_waktu_otomatis);
          $('#waktu_3').val(d_waktu_otomatis);

          $('#pintu_air_1').text(status_pintu_air_1);
          $('#pintu_air_2').text(status_pintu_air_2);
          $('#pintu_air_3').text(status_pintu_air_3);
        }
        else
        {
          $('.keterangan').text("Terkontrol");
          {
            $('#waktu_1').val(d_waktu_kontrol);
            $('#waktu_2').val(d_waktu_kontrol);
            $('#waktu_3').val(d_waktu_kontrol);

            $('#pintu_air_1').text(pintu_air_1);
            $('#pintu_air_2').text(pintu_air_2);
            $('#pintu_air_3').text(pintu_air_3);
          }        
        }
        if (pintu_air_irigasi == "Open")
        {
          $('.keterangan2').text("Sedang Membuka");
          $('#waktu_irigasi').val(d_waktu_kontrol);

          $('#pintu_air_irigasi').text(pintu_air_irigasi);
        }
        else
        {
          $('.keterangan2').text("Sedang Menutup");
          $('#waktu_irigasi').val(d_waktu_kontrol);

          $('#pintu_air_irigasi').text(pintu_air_irigasi);
        }
        
        
        setTimeout(tampil, 2000); 
      }
    });
  }
  
  
  document.addEventListener('DOMContentLoaded',function(){
    pintu_air_utama();
    pintu_air_kontrol();
    tampil();
  });    
</script>