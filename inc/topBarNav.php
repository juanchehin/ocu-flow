<style>
  .user-img {
      position: absolute;
      height: 27px;
      width: 27px;
      object-fit: cover;
      left: -7%;
      top: -12%;
      border: 2px solid #fff;
      border-radius: 50%;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
  }
  .user-img:hover {
      transform: scale(1.1);
  }
  .user-dd:hover {
    color: #fff !important;
    background: rgba(255,255,255,0.1);
  }
  .navbar {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      padding: 0.5rem 1rem;
  }
  .nav-link {
      font-weight: 500;
      padding: 0.5rem 1rem !important;
      margin: 0 0.2rem;
      border-radius: 4px;
      transition: all 0.3s ease;
  }
  .nav-link:hover {
      background: rgba(255,255,255,0.1);
      transform: translateY(-2px);
  }
  .dropdown-menu {
      border: none;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      border-radius: 8px;
      padding: 0.5rem 0;
  }
  .dropdown-item {
      padding: 0.5rem 1.5rem;
      transition: all 0.2s ease;
  }
  .dropdown-item:hover {
      background: #f8f9fa;
      color: #1e3c72 !important;
      transform: translateX(5px);
  }
  .badge-primary {
      background-color: #ff6b6b;
      color: white;
      font-weight: bold;
  }
  .nav-link-custom-dd {
      display: none;
      background: white;
      width: 600px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      padding: 1rem;
      z-index: 1000;
  }
  .nav-link-custom-dd-anchor:hover + .nav-link-custom-dd,
  .nav-link-custom-dd:hover {
      display: block;
  }
  .nav-link-custom-dd-item a {
      color: #333;
      padding: 0.5rem 1rem;
      display: block;
      border-radius: 4px;
      transition: all 0.2s ease;
  }
  .nav-link-custom-dd-item a:hover {
      background: #f0f0f0;
      color: #1e3c72;
      text-decoration: none;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-dark">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="./">
            <img src="<?php echo validate_image($_settings->info('logo')) ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            <?php echo $_settings->info('short_name') ?>
        </a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link text-white" aria-current="page" href="./">Inicio</a></li>
                <li class="nav-item position-relative">
                    <a class="nav-link text-white nav-link-custom-dd-anchor" href="javascript:void(0)">Categorías</a>
                    <div class="nav-link-custom-dd position-absolute" tabindex="-1">
                        <div class="container-fluid">
                            <div class="d-flex flex-wrap w-100">
                                <?php 
                                $category_qry = $conn->query("SELECT * FROM `category_list` where `status` = 1 and `delete_flag` = 0 order by `name` asc");
                                while($row = $category_qry->fetch_assoc()):
                                ?>
                                <div class="nav-link-custom-dd-item"><a href="<?= base_url."?p=products&cid={$row['id']}" ?>"><?= $row['name'] ?></a></div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="./?p=products">Gafas</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="./?p=about">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="./?p=contact">Contacto</a></li>
                <?php 
                if($_settings->userdata('id') != '' && $_settings->userdata('id') != 2):
                    $cart = $conn->query("SELECT SUM(quantity) FROM `cart_list` where customer_id = '{$_settings->userdata('id')}' ")->fetch_array()[0];
                endif;
                $cart = isset($cart) && $cart > 0 ? $cart : '';
                ?>
                <?php if($_settings->userdata('id') != '' && $_settings->userdata('login_type') == 2): ?>
                    <li class="nav-item"><a class="nav-link text-white" href="./?p=cart_list">Carrito <span class="ml-2 badge badge-primary"><?= $cart > 0 ? format_num($cart) : '' ?></span></a></li>
                <?php endif;?>
            </ul>
            <div class="d-flex align-items-center">
                <?php if($_settings->userdata('id') != '' && $_settings->userdata('login_type') == 2): ?>
                    <div class="btn-group nav-link">
                        <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span><img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2 user-img" alt="Imagen de usuario"></span>
                            <span class="ml-3"><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></span>
                            <span class="sr-only">Menú desplegable</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="<?php echo base_url.'?p=user' ?>"><span class="fa fa-user"></span> Mi cuenta</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url.'?p=orders' ?>"><span class="fa fa-table"></span> Mis pedidos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url.'/classes/Login.php?f=logout_customer' ?>"><span class="fas fa-sign-out-alt"></span> Cerrar sesión</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a class="font-weight-bolder text-light mx-2 text-decoration-none" href="./login.php">Iniciar sesión</a>
                    <a class="font-weight-bolder text-light mx-2 text-decoration-none" href="./register.php">Registrarse</a>
                    <a class="font-weight-bolder text-light mx-2 text-decoration-none" href="./admin">Panel de administración</a>
                <?php endif;?>
            </div>
        </div>
    </div>
</nav>
<script>
  $(function(){
    $('#search_report').click(function(){
      uni_modal("Buscar Reporte de Solicitud","report/search.php")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })

  $('#search-form').submit(function(e){
    e.preventDefault()
     var sTxt = $('[name="search"]').val()
     if(sTxt != '')
      location.href = './?p=products&search='+sTxt;
  })
</script>