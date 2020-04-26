<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title" style="text-align: center;">Data Rekap Bendung Sidapurna</h3>
            <?php echo $this->session->flashdata('notif'); ?>
          </div>
         
         <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
            <?php echo form_open('Dashboard/multiple_delete'); ?>
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr class="table table-primary">
                    <th><center>No</center></th>
                    <th><center>Tanggal</center></th>
                    <th><center>Ketinggian Air</center></th>
                    <th><center>Limpasan Air</center></th>
                    <th><center>Level</center></th>
                    <th><center>Pintu Air 1</center></th>
                    <th><center>Pintu Air 2</center></th>
                    <th><center>Pintu Air 3</center></th>
                    <?php
                      $status = $this->session->userdata('status');
                      if ($status == "Super Admin")
                      { ?>
                        <th><center><input type="checkbox" id="check-all"></center></th>
                      <?php }
                    ?>
                  </tr>
                </thead>
                <tbody>

                <?php
                  if ($this->uri->segment(2) == 'data_rekap') { 
                  $no=1; foreach ($isi as $data) { ?>
                    <tr>
                      <td><center><?php echo $no++; ?></center></td>
                      <td><?php echo $data->waktu;?></td>
                      <td><center><?php echo $data->tinggi_air;?></center></td>
                      <td><center><?php echo $data->limpasan_air;?></center></td>
                      <td><center><?php echo $data->level;?></center></td>
                      <td><center><?php echo $data->status_pintu_air_1;?></center></td>
                      <td><center><?php echo $data->status_pintu_air_2;?></center></td>
                      <td><center><?php echo $data->status_pintu_air_3;?></center></td>
                      <?php
                        $status = $this->session->userdata('status');
                        if ($status == "Super Admin")
                        { ?>
                          <td>
                          	<center>
                          		<input type="checkbox" class="check-item" name="id[]" value="<?php echo $data->id ?>">
                          	</center>
                          </td>
                        <?php }
                      ?>
                    </tr>
                  <?php  } ?>
                </tbody>
                <?php
                    $status = $this->session->userdata('status');
                    if ($status == "Super Admin")
                    { ?>
                        <tfoot>
                            <tr class="table table-warning">
                                <th><center>No</center></th>
                                <th><center>Tanggal</center></th>
                                <th><center>Ketinggian Air</center></th>
                                <th><center>Limpasan Air</center></th>
                                <th><center>Level</center></th>
                                <th><center>Pintu Air 1</center></th>
                                <th><center>Pintu Air 2</center></th>
                                <th><center>Pintu Air 3</center></th>
                                <th>
                                	<center>
                                		<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data-data ini ?')"><i class="fa fa-trash " ></i> Delete</button>
        	                        	
        	                        </center>
                                </th>
                            </tr>
                        </tfoot>
                    <?php }
                ?>
              </table>
              <?php echo form_close()?>
            </div>  
                <?php } ?>
            <!-- /.card-body -->
          </div>
          <?php echo form_open('Dashboard/cetak_pdf') ?>
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
</section>

<script>
	$(document).ready(function(){
		$("#check-all").click(function(){
			if($(this).is(":checked"))
				$(".check-item").prop("checked", true);
			else 
				$(".check-item").prop("checked", false);
		});
	});
</script>