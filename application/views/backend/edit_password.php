<?php 
if ($this->uri->segment(3) == 'edit_pass') {
  $aksi = base_url('Dashboard/aksi/edit_pass/proses?id=').$isi->id;
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
            <center><h3 class="card-title">User</h3></center>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?php echo $aksi;?>" enctype="multipart/form-data">
            <div class="card-body">
              <?php
                $status = $this->session->userdata('status');
                if ($status == "Admin")
                { ?>
                  <div class="form-group">
                    <label for="inputPassLama">Password Lama</label><label style="color: yellow; font-size: 20px;">* </label>
                    <input type="password" class="form-control" id="inputPasslama" placeholder="Input password lama" name="pass_lama" required="true">
                  </div><?php 
                } ?>
              <div class="form-group">
                <label for="inputPassBaru">Password Baru</label><label style="color: yellow; font-size: 20px;">* </label>
                <input type="password" class="form-control" id="inputPassBaru" placeholder="Input password baru" name="pass_baru" required="true">
              </div>
              <div class="form-group">
                <label for="passKonfirm">Konfirmasi Password Baru</label><label style="color: yellow; font-size: 20px;">* </label>
                <input type="password" class="form-control" id="passKonfirm" placeholder="Konfimasi password baru" name="pass_konfirm" required="true">
              </div>
           </div>
           <!-- /.card-body -->

           <div class="card-footer" style="text-align: center;">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->


      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
</div>
</section>