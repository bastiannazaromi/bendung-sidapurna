<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                       <?php echo $this->session->flashdata('notif'); ?>
                       <h3 class="card-title" style="text-align: center;">Data Rekap Pintu Air Utama</h3>
                       <br>
                    </div>
                 
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                  <tr class="table table-info">
                                    <th><center>Pintu Air 1</center></th>
                                    <th><center>Pintu Air 2</center></th>
                                    <th><center>Pintu Air 3</center></th>
                                    <th><center>Keterangan</center></th>
                                  </tr>
                                </thead>
                                <tbody>
                                	<tr>
                    	              <td style="text-align: center;" id="pintu_1"></td>
                    	              <td style="text-align: center;" id="pintu_2"></td>
                    	              <td style="text-align: center;" id="pintu_3"></td>
                                      <td><center>Dihitung dari semua data</center></td>
                                  	</tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php echo form_open('Dashboard/rekap_pintu_cari') ?>
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
</section>

<script>
    var total=0;
    var status_pintu1 = [], status_pintu2 = [], status_pintu3 = [], status_pintu4 = [];
    
    function tampil(){
        $.ajax({
            url:'<?php echo base_url('Dashboard/get_realtime')?>',
            dataType:'json',
            success:function(result){
                if (result.length>total){
                    total=result.length;
                    var i;
                    var pintu1=0, pintu2=0, pintu3=0;
                    var sp1="c", sp2="c", sp3="c", sp4="c";
                    for(i=0; i<result.length; i++){
                        status_pintu1[i] = result[i].status_pintu_air_1;
                        status_pintu2[i] = result[i].status_pintu_air_2;
                        status_pintu3[i] = result[i].status_pintu_air_3;

                        if (status_pintu1[i] == "Open") {
                            if (sp1 == "c") {
                                pintu1 += 1;
                                sp1 = "o";
                            }
                        }
                        else if (status_pintu1[i] == "Close") {
                            sp1 = "c";
                        }
                        if (status_pintu2[i] == "Open") {
                             if (sp2 == "c") {
                                pintu2 += 1;
                                sp2 = "o";
                            }
                        }
                        else if (status_pintu2[i] == "Close") {
                            sp2 = "c";
                        }
                        if (status_pintu3[i] == "Open") {
                             if (sp3 == "c") {
                                pintu3 += 1;
                                sp3 = "o";
                            }
                        }
                        else if (status_pintu3[i] == "Close") {
                            sp3 = "c";
                        }
                        
                        $('#pintu_1').text(pintu1);
                        $('#pintu_2').text(pintu2);
                        $('#pintu_3').text(pintu3);
                    }
                }
                else if (result.length<=total)
                {
                    var i;
                    var pintu1=0, pintu2=0, pintu3=0;
                    var sp1="c", sp2="c", sp3="c", sp4="c";
                    for(i=0; i<result.length; i++){
                        status_pintu1[i] = result[i].status_pintu_air_1;
                        status_pintu2[i] = result[i].status_pintu_air_2;
                        status_pintu3[i] = result[i].status_pintu_air_3;

                        if (status_pintu1[i] == "Open") {
                            if (sp1 == "c") {
                                pintu1 += 1;
                                sp1 = "o";
                            }
                        }
                        else if (status_pintu1[i] == "Close") {
                            sp1 = "c";
                        }
                        if (status_pintu2[i] == "Open") {
                             if (sp2 == "c") {
                                pintu2 += 1;
                                sp2 = "o";
                            }
                        }
                        else if (status_pintu2[i] == "Close") {
                            sp2 = "c";
                        }
                        if (status_pintu3[i] == "Open") {
                             if (sp3 == "c") {
                                pintu3 += 1;
                                sp3 = "o";
                            }
                        }
                        else if (status_pintu3[i] == "Close") {
                            sp3 = "c";
                        }
                        
                        $('#pintu_1').text(pintu1);
                        $('#pintu_2').text(pintu2);
                        $('#pintu_3').text(pintu3);
                    }
                }
                setTimeout(tampil, 2000); 
            }
        });
    }
    
    document.addEventListener('DOMContentLoaded',function(){
        tampil();
  	});
</script>