<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10">
        <!-- Profile Image -->
        <div class="card card-primary">
          <div class="card-header" style="text-align: center;">
            <h3 class="card-title">Data User</h3>
          </div>
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('uploads/'.$isi->foto.'"width="90" height="110"');?>" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?php echo $isi->nama;?></h3>

            <p class="text-muted text-center"><?php echo $isi->status;?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?php echo $isi->email;?></a>
              </li>
              <li class="list-group-item">
                <b>Alamat</b> <a class="float-right"><?php echo $isi->alamat;?></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>