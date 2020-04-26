<?php 

if ($this->uri->segment(3) == 'tambah') {
  $email = '';
  $nama = '';
  $password = '';
  $file_foto = '';
  $alamat = '';
  $status = '';
  $aksi = base_url('Dashboard/aksi/tambah/proses');
} else {
  $email = $isi->email;
  $nama = $isi->nama;
  $password = $isi->password;
  $alamat = $isi->alamat;
  $status = $isi->status;
  $file_foto = $isi->foto;
  $aksi = base_url('Dashboard/aksi/edit/proses?id=').$isi->id;
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
              <div class="form-group">
                <label for="inputEmail">Email address</label><label style="color: yellow; font-size: 20px;">* </label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email" value="<?php echo $email;?>" required="true">
              </div>
              <div class="form-group">
                <label for="inputNama">Nama</label><label style="color: yellow; font-size: 20px;">* </label>
                <input type="text" class="form-control" id="inputNama" placeholder="nama user" name="nama" value="<?php echo $nama;?>" required="true">
              </div>
              <?php
                if ($aksi == base_url('Dashboard/aksi/tambah/proses'))
                { ?>
                  <div class="form-group">
                    <label for="inputPass">Password</label><label style="color: yellow; font-size: 20px;">* </label>
                    <input type="password" class="form-control" id="inputPass" placeholder="password" name="password" value="<?php echo $password;?>" required="true">
                  </div>
                  <div class="form-group">
                    <label for="inputKonfirm">Konfirmasi Password</label><label style="color: yellow; font-size: 20px;">* </label>
                    <input type="password" class="form-control" id="inputKonfirm" placeholder="konfirmasi password" name="passwordKonfirm" required="true">
                  </div>
        <?php   }
              ?>
              <div class="form-group">
                <label>Foto :</label>
                <input type="file" name="file_foto" value="<?php echo $file_foto;?>" id="id_foto">
              </div>
              <div class="form-group">
                <label for="inputAlamat">Alamat</label><label style="color: yellow; font-size: 20px;">* </label>
                <input type="text" class="form-control" id="inputAlamat" placeholder="alamat" name="alamat" value="<?php echo $alamat;?>" required="true">
              </div>
              <?php
                $status_login = $this->session->userdata('status');
                if ($status_login == "Super Admin")
                { ?>
                  <div class="form-group">
                    <label>Status</label><label style="color: yellow; font-size: 20px;">* </label>
                    <select class="form-control" name="status" required="true">
                      <option value="">Status</option>
                       <option value="Admin" <?php if ($status == "Admin") { echo "selected=\"selected\"";} ?>>Admin</option>
                       <option value="Super Admin" <?php if ($status == "Super Admin") { echo "selected=\"selected\"";} ?>>Super Admin</option>
                    </select>
                  </div>
                <?php } ?>
           </div>
           <!-- /.card-body -->

           <div class="card-footer" style="text-align: center;">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.card -->


      <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
  </div>
</section>