<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="es" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
<body class="hold-transition login-page">
<script>
  start_loader()
</script>
<style>
  body {
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #ffffff;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
  }

  #page-title {
    text-shadow: 2px 2px 12px #000;
    font-size: 3.2em;
    color: #ffcc00;
    background: rgba(0, 0, 0, 0.4);
    padding: 20px;
    border-radius: 20px;
    margin-top: 40px;
    margin-bottom: 30px;
    backdrop-filter: blur(3px);
  }

  .login-box {
    width: 420px;
    max-width: 95%;
  }

  .card-dark {
    background: #111827;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.7);
    border: 2px solid #1f2937;
  }

  .card-body {
    padding: 40px 30px;
  }

  .login-box-msg {
    color: #facc15;
    font-size: 1.4em;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
  }

  .form-control {
    background-color: #1f2937;
    color: #f9fafb;
    border: none;
    border-radius: 15px;
    padding: 14px 16px;
    box-shadow: inset 4px 4px 8px #0f172a, inset -4px -4px 8px #1e293b;
    transition: all 0.3s ease-in-out;
  }

  .form-control:focus {
    background-color: #111827;
    color: #fff;
    box-shadow: 0 0 0 3px #facc15;
  }

  .input-group-text {
    background-color: #facc15;
    border-radius: 0 15px 15px 0;
    color: #111827;
  }

  .btn-dark {
    background-color: #facc15;
    color: #111827;
    font-weight: bold;
    border: none;
    border-radius: 15px;
    padding: 12px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .btn-dark:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(255, 204, 0, 0.4);
  }

  a {
    color: #facc15;
    font-weight: bold;
    transition: color 0.2s;
  }

  a:hover {
    color: #fcd34d;
  }
</style>

<h1 class="text-center text-white px-4 py-5" id="page-title">
  <b><?php echo $_settings->info('name') ?></b>
</h1>

<div class="login-box">
  <div class="card card-dark my-2">
    <div class="card-body">
      <p class="login-box-msg">Ingrese sus credenciales</p>
      <form id="login-frm" action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" autofocus placeholder="Nombre de usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="<?php echo base_url ?>">Volver al sitio web</a>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block">Ingresar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url ?>dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>
