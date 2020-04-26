<?php
    $status = $this->session->userdata('status');
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <?php echo $this->session->flashdata('notif'); ?>
            <h3 class="card-title" style="text-align: center;">Data User</h3>
            <?php
              $status = $this->session->userdata('status');
              if ($status == "Super Admin")
              { ?>
                <ul class="text-right">
                  <a class="text-right btn btn-info btn-sm" href="<?php echo base_url('Dashboard/aksi/tambah');?>">  <i class="fa fa-plus"></i> Tambah
                  </a>
                </ul>
              <?php }
            ?>
          </div>
             
             <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
                <?php
                    if ($status == "Super Admin")
                    { ?>
                        <table id="example1" class="table table-bordered table-striped table-hover">
              <?php }
                    else
                    { ?>
                        <table class="table table-bordered table-striped table-hover">
              <?php }
                ?>
                <thead>
                  <tr class="table table-info">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if ($this->uri->segment(2) == 'user') {
                    if ($status == "Super Admin")
                    {
                      $no=1; foreach ($isi as $data) {
                      ?>
                        <tr>
                          <td><?php echo $no++ ;?></td>
                          <td><?php echo $data->nama;?></td>
                          <td><?php echo $data->email;?></td>
                          <td>
                            <a class="btn  btn-primary btn-sm" href="<?php echo base_url('Dashboard/aksi/edit_pass?id=').$data->id;?>">
                              <i class="fa fa-edit"></i> Edit
                            </a>
                          </td>
                          <td><?php echo $data->alamat;?></td>
                          <td>
                            <a class="btn  btn-primary btn-sm" href="<?php echo base_url('Dashboard/aksi/edit?id=').$data->id;?>">
                              <i class="fa fa-edit"></i> Edit
                            </a> &nbsp;
                            <a class="btn  btn-warning btn-sm" href="<?php echo base_url('Dashboard/aksi/view?id=').$data->id;?>">
                              <i class="fa fa-eye"></i> Lihat
                            </a>  &nbsp;
                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('Dashboard/aksi/delete?id=').$data->id;?>" onclick="return confirm('Are you sure you want to delete ?')">
                              <i class="fa fa-trash "></i> Delete
                            </a>
                          </td>
                        </tr>
                      <?php  }
                    }
                    else
                    { $no=1; ?>
                      <tr>
                        <td><?php echo $no++ ;?></td>
                        <td><?php echo $isi->nama;?></td>
                        <td><?php echo $isi->email;?></td>
                        <td>  <a class="btn  btn-primary btn-sm" href="<?php echo base_url('Dashboard/aksi/edit_pass?id=').$isi->id;?>">
                          <i class="fa fa-edit"></i> Edit
                          </a>
                        </td>
                        <td><?php echo $isi->alamat;?></td>
                        <td>
                          <a class="btn  btn-primary btn-sm" href="<?php echo base_url('Dashboard/aksi/edit?id=').$isi->id;?>">
                              <i class="fa fa-edit"></i> Edit
                          </a> &nbsp;
                          <a class="btn  btn-warning btn-sm" href="<?php echo base_url('Dashboard/aksi/view?id=').$isi->id;?>">
                            <i class="fa fa-eye"></i> Lihat
                          </a>
                        </td>
                      </tr>
                    <?php  } ?>
                </tbody>
              </table>
            </div>
          </div>  
          <?php } ?>
          <!-- /.card-body -->
        </div>
      </div>
    </div> 
  </div>
</section>