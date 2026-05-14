<style>
  /* Estilos radicales pero minimalistas */
  .main-header {
    background: linear-gradient(135deg, #1a1a2e, #16213e) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
    border-bottom: 3px solid #e94560 !important;
  }
  
  .navbar-nav .nav-link {
    color: #f1f2f6 !important;
    font-weight: 600 !important;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  
  .navbar-nav .nav-link:hover {
    color: #e94560 !important;
    transform: scale(1.05);
  }
  
  .fa-bars {
    color: #e94560 !important;
    font-size: 1.5rem;
  }
  
  .user-img {
    position: absolute;
    height: 32px !important;
    width: 32px !important;
    object-fit: cover;
    left: -7%;
    top: -12%;
    border: 2px solid #e94560 !important;
    box-shadow: 0 0 10px rgba(233, 69, 96, 0.5);
  }
  
  .btn-rounded {
    border-radius: 50px !important;
    background: rgba(255, 255, 255, 0.1) !important;
    backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    transition: all 0.3s ease;
  }
  
  .btn-rounded:hover {
    background: rgba(233, 69, 96, 0.2) !important;
    transform: translateY(-2px);
  }
  
  .dropdown-menu {
    background: #1a1a2e !important;
    border: 1px solid #e94560 !important;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  }
  
  .dropdown-item {
    color: #f1f2f6 !important;
  }
  
  .dropdown-item:hover {
    background: #e94560 !important;
    color: white !important;
  }
  
  .dropdown-divider {
    border-color: #e94560 !important;
  }
</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light shadow text-sm">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?php echo base_url ?>" class="nav-link"><?php echo (!isMobileDevice()) ? $_settings->info('name'):$_settings->info('short_name'); ?> - Admin</a>
    </li>
  </ul>
  
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <div class="btn-group nav-link">
        <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
          <span><img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2 user-img" alt="Imagen de Usuario"></span>
          <span class="ml-3"><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></span>
          <span class="sr-only">Menú Desplegable</span>
        </button>
        <div class="dropdown-menu" role="menu">
          <a class="dropdown-item" href="<?php echo base_url.'admin/?page=user' ?>"><span class="fa fa-user"></span> Mi Cuenta</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url.'/classes/Login.php?f=logout' ?>"><span class="fas fa-sign-out-alt"></span> Cerrar Sesión</a>
        </div>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->