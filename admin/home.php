<style>
  /* Estilos radicales pero minimalistas */
  h1 {
    color: #ff4757 !important;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    font-weight: 900 !important;
    letter-spacing: -1px;
  }
  
  hr {
    border-top: 3px solid #ff4757 !important;
    opacity: 1 !important;
  }
  
  .info-box {
    background: #1e272e !important;
    border-radius: 15px !important;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3) !important;
    transition: all 0.3s ease !important;
    border-left: 5px solid #ff4757 !important;
  }
  
  .info-box:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4) !important;
  }
  
  .info-box-icon {
    border-radius: 15px 0 0 15px !important;
    font-size: 1.8rem !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
  }
  
  .info-box-text {
    color: #f1f2f6 !important;
    font-weight: 600 !important;
    font-size: 1.1rem !important;
    text-transform: uppercase;
  }
  
  .info-box-number {
    color: #ff4757 !important;
    font-weight: 900 !important;
    font-size: 1.8rem !important;
  }
  
  /* Colores personalizados para cada caja */
  .bg-gradient-dark {
    background: linear-gradient(135deg, #2f3542, #57606f) !important;
  }
  
  .bg-gradient-secondary {
    background: linear-gradient(135deg, #e84118, #c23616) !important;
  }
  
  .bg-gradient-warning {
    background: linear-gradient(135deg, #f39c12, #e67e22) !important;
  }
  
  .bg-gradient-teal {
    background: linear-gradient(135deg, #1dd1a1, #10ac84) !important;
  }
  
  /* Estilos para el carrusel */
  .carousel {
    border-radius: 15px !important;
    overflow: hidden !important;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2) !important;
    border: 3px solid #ff4757 !important;
  }
  
  .carousel-control-prev-icon, 
  .carousel-control-next-icon {
    background-color: #ff4757 !important;
    border-radius: 50% !important;
    padding: 15px !important;
  }
</style>

<h1>¡Bienvenido, <?php echo $_settings->userdata('firstname')." ".$_settings->userdata('lastname') ?>!</h1>
<hr>
<div class="row">
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-tags"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Categorías</span>
        <span class="info-box-number text-right h5">
          <?php 
            $category = $conn->query("SELECT * FROM category_list where delete_flag = 0")->num_rows;
            echo format_num($category);
          ?>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-box-open"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Productos</span>
        <span class="info-box-number text-right h5">
          <?php 
            $products = $conn->query("SELECT id FROM product_list where `status` = 0")->num_rows;
            echo format_num($products);
          ?>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-hourglass-half"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pedidos Pendientes</span>
        <span class="info-box-number text-right h5">
          <?php 
            $order = $conn->query("SELECT id FROM order_list where `status` = 0")->num_rows;
            echo format_num($order);
          ?>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-box"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pedidos Empaquetados</span>
        <span class="info-box-number text-right h5">
          <?php 
            $order = $conn->query("SELECT id FROM order_list where `status` = 1")->num_rows;
            echo format_num($order);
          ?>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-truck"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">En Reparto</span>
        <span class="info-box-number text-right h5">
          <?php 
            $order = $conn->query("SELECT id FROM order_list where `status` = 2")->num_rows;
            echo format_num($order);
          ?>
        </span>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-check-circle"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pedidos Completados</span>
        <span class="info-box-number text-right h5">
          <?php 
            $order = $conn->query("SELECT id FROM order_list where `status` = 3")->num_rows;
            echo format_num($order);
          ?>
        </span>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <?php 
    $files = array();
    $fopen = scandir(base_app.'uploads/banner');
    foreach($fopen as $fname){
      if(in_array($fname,array('.','..')))
        continue;
      $files[]= validate_image('uploads/banner/'.$fname);
    }
  ?>
  <div id="tourCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner h-100">
      <?php foreach($files as $k => $img): ?>
        <div class="carousel-item h-100 <?php echo $k == 0? 'active': '' ?>">
          <img class="d-block w-100 h-100" style="object-fit:contain" src="<?php echo $img ?>" alt="Banner promocional">
        </div>
      <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div>
</div>