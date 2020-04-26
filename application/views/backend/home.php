<link rel="stylesheet" href="<?php echo base_url ('assets/template/admin/slider/bootstrap.min.css') ;?>" >
<script src="<?php echo base_url  ('assets/template/admin/slider/jquery.min.js') ;?>"></script>
<script src="<?php echo base_url  ('assets/template/admin/slider/popper.min.js') ;?>"></script>
<script src="<?php echo base_url  ('assets/template/admin/slider/bootstrap.min.js') ;?>"></script>
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
</style>
  
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">  
        <div id="demo" class="carousel slide" data-ride="carousel">

          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
          </ul>
          
          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo base_url ('assets/bghome/foto1.jpg') ;?>" alt="Foto 1">
            </div>
            <div class="carousel-item">
              <img src="<?php echo base_url ('assets/bghome/foto2.jpg') ;?>" alt="Foto 2">
            </div>
            <div class="carousel-item">
              <img src="<?php echo base_url ('assets/bghome/foto3.jpg') ;?>" alt="Foto 3">
            </div>
          </div>
          
          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>