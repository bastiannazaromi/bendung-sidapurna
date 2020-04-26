<div class="content-wrapper">
    <div class="container">
        <div class="row">
        <!-- left column -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <center><h3 class="card-title">Data Rekap Bendung Sidapurna</h3></center>
                        <br>
                    </div>
             
                    <!-- /.card-header -->
                    <div class="panel-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr class="bg-info">
                                            <th><center>No</center></th>
                                            <th><center>Tanggal</center></th>
                                            <th><center>Ketinggian Air</center></th>
                                            <th><center>Limpasan Air</center></th>
                                            <th><center>Level</center></th>
                                            <th><center>Pintu Air 1</center></th>
                                            <th><center>Pintu Air 2</center></th>
                                            <th><center>Pintu Air 3</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                        <?php
                                            if ($this->uri->segment(2) == 'data_rekap') { 
                                                $no=1; foreach ($isi as $data) { ?>
                                                <tr>
                                                    <td><center><?php echo $no++; ?></center></td>
                                                    <td><center><?php echo $data->waktu;?></center></td>
                                                    <td><center><?php echo $data->tinggi_air;?></center></td>
                                                    <td><center><?php echo $data->limpasan_air;?></center></td>
                                                    <td><center><?php echo $data->level;?></center></td>
                                                    <td><center><?php echo $data->status_pintu_air_1;?></center></td>
                                                    <td><center><?php echo $data->status_pintu_air_2;?></center></td>
                                                    <td><center><?php echo $data->status_pintu_air_3;?></center></td>
                                                </tr>
                                            <?php  } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    
                        <?php } ?>
                        <!-- /.card-body -->
                        <?php echo form_open('Monitoring/cetak_pdf') ?>
                          <ul class="text-left">
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
                            <button type="submit" class="text-right btn btn-primary btn-sm"><a class="text-right btn btn-primary btn-sm">  <i class="fa fa-print"></i> Cetak</a></button>
                          </ul>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>