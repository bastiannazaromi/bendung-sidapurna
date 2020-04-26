<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
           <?php echo $this->session->flashdata('notif'); ?>
           <h3 class="card-title" style="text-align: center;">Data Kontrolling Pintu Air</h3>
           <ul class="text-right">
            <a class="text-right btn btn-info btn-sm" href="<?php echo base_url('Dashboard/aksi3/kontrol');?>">  <i class="fa fa-edit"></i> Kontrol
            </a>
          </ul>
         </div>
         
         <!-- /.card-header -->
         <div class="card-body">
          <div class="table-responsive">
            <?php echo form_open('Dashboard/multiple_delete_kontrol'); ?>
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="table table-info">
                        <th><center>No</center></th>
                        <th><center>Waktu</center></th>
                        <th><center>Pintu Air 1</center></th>
                        <th><center>Pintu Air 2</center></th>
                        <th><center>Pintu Air 3</center></th>
                        <th><center>Pintu Air Irigasi</center></th>
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
                    if ($this->uri->segment(2) == 'kontrol_pintu') {
                      $no=1;
                      foreach ($isi as $data) {
                      ?>
                      <tr>
                        <td><?php echo $no++ ;?></td>
                        <td><center><?php echo $data->waktu;?></center></td>
                        <td><center><?php echo $data->pintu_air_1;?></center></td>
                        <td><center><?php echo $data->pintu_air_2;?></center></td>
                        <td><center><?php echo $data->pintu_air_3;?></center></td>
                        <td><center><?php echo $data->pintu_air_irigasi;?></center></td>
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
                    <?php }
                } ?>
                </tbody>
                <?php
                    $status = $this->session->userdata('status');
                    if ($status == "Super Admin")
                    { ?>
                    <tfoot>
                        <tr class="table table-warning">
                          <th><center>No</center></th>
                          <th><center>Waktu</center></th>
                          <th><center>Pintu Air 1</center></th>
                          <th><center>Pintu Air 2</center></th>
                          <th><center>Pintu Air 3</center></th>
                          <th><center>Pintu Air Irigasi</center></th>
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
      </div>
      <?php echo form_open('Dashboard/cetak_pdf_kontrol') ?>
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
<!-- /.card-body -->
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