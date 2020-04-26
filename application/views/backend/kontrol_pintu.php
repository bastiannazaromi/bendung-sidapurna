<?php 
  $this->load->model('M_bendung','kontrol_pintu');
  
    if ($this->uri->segment(3) == 'kontrol') {
        if ($this->kontrol_pintu->get_kontrol_pintu_desc() == NULL)
        {
            $pintu_1 = "";
            $pintu_2 = "";
            $pintu_3 = "";
            $pintu_irigasi = "";
            $aksi = base_url('Dashboard/aksi3/kontrol/proses');
        }
        else
        {
            $pintu_1 = $isi->pintu_air_1;
            $pintu_2 = $isi->pintu_air_2;
            $pintu_3 = $isi->pintu_air_3;
            $pintu_irigasi = $isi->pintu_air_irigasi;
            $aksi = base_url('Dashboard/aksi3/kontrol/proses');
        }
    } 
?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <center><h3 class="card-title">Kontrolling Pintu Air</h3></center>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?php echo $aksi;?>" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label>Pintu Air 1</label><label style="color: yellow; font-size: 20px;">* </label>
                <select class="form-control" name="pintu_air_1" required="true">
                  <option value="">Pilih</option>
                  <option value="Open" <?php if ($pintu_1 == "Open") { echo "selected=\"selected\"";} ?>>Open</option>
                  <option value="Close" <?php if ($pintu_1 == "Close") { echo "selected=\"selected\"";} ?>>Close</option>
                </select>
              </div>
              <div class="form-group">
                <label>Pintu Air 2</label><label style="color: yellow; font-size: 20px;">* </label>
                <select class="form-control" name="pintu_air_2" required="true">
                  <option value="">Pilih</option>
                  <option value="Open" <?php if ($pintu_2 == "Open") { echo "selected=\"selected\"";} ?>>Open</option>
                  <option value="Close" <?php if ($pintu_2 == "Close") { echo "selected=\"selected\"";} ?>>Close</option>
                </select>
              </div>
              <div class="form-group">
                <label>Pintu Air 3</label><label style="color: yellow; font-size: 20px;">* </label>
                <select class="form-control" name="pintu_air_3" required="true">
                  <option value="">Pilih</option>
                  <option value="Open" <?php if ($pintu_3 == "Open") { echo "selected=\"selected\"";} ?>>Open</option>
                  <option value="Close" <?php if ($pintu_3 == "Close") { echo "selected=\"selected\"";} ?>>Close</option>
                </select>
              </div>
              <div class="form-group">
                <label>Pintu Air Irigasi</label><label style="color: yellow; font-size: 20px;">* </label>
                <select class="form-control" name="pintu_air_irigasi" required="true">
                    <option value="">Pilih</option>
                    <option value="Open" <?php if ($pintu_irigasi == "Open") { echo "selected=\"selected\"";} ?>>Open</option>
                    <option value="Close" <?php if ($pintu_irigasi == "Close") { echo "selected=\"selected\"";} ?>>Close</option>
                </select>
              </div>
           </div>
           <!-- /.card-body -->

           <div class="card-footer" style="text-align: center;">
            <button type="submit" value="upload" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
      <!-- /.card -->


      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
</div>
</section>