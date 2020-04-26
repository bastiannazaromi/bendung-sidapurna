<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <script type="text/javascript">
    function CheckLength() {
      var inputUser = document.getElementById("username").value;
      var inputPass = document.getElementById("password").value;

      else if (inputUser == inputPass) {
          alert("Username dan password sama : "+inputUser)
          return false;
      }
    }
  </script>

    <link href="<?php echo base_url ('assets/template/admin/dist/css/bootstrap.min.css') ;?>" rel="stylesheet">
    <link href="<?php echo base_url ('assets/template/admin/dist/css/style_login.css') ;?>" rel="stylesheet">

    <script src="<?php echo base_url ('assets/template/admin/dist/js/bootstrap.min.js') ;?>"></script>
    <script src="<?php echo base_url ('assets/template/admin/dist/js/jquery.min.css') ;?>"></script>
  </head>
  <body>
    <div class="col-md-4 col-md-offset-4 form-login">
        <div class="wrap">
        <div class="header">
            <h3 class="text-center judul-login">Login</h3>
        </div>
        <div class="badan">
            <form action="<?php echo base_url('Login/proses');?>" name="formLogin" class="inputan-login" method="post" onsubmit="return CheckLength()">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="email" class="form-control" name="username" id="username" required="true" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" required="true" placeholder="Password">
                    </div>
                     <?php echo $this->session->flashdata('notif'); ?>
                    <input type="submit" class="btn btn-block tombol-submit" value="LOGIN" />
            </form>
        </div>
        <div class="text-center footer">
            <b><p>Sign in with email</p></b>
        </div>
    </div>
</div>
  </body>
</html>