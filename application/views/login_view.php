


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>IEANJESUS v2.0</title>
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/modules/bootstrap-social/bootstrap-social.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/css/demo.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/dist/css/style.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
             <img src="<?php echo base_url();?>vendor/dist/img/logo-ieanjesus.jpg" alt="Smiley face" height="115" width="270">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="<?php base_url();?>autentication/iniciar_sesion_post" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Usuario</label>
                    <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Por favor, ingrese su usuario.
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Password
                      <div class="float-right">

                      </div>
                    </label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Por favor, ingrese su contraseña.
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Recuérdame</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; IEANJESUS 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="<?php echo base_url(); ?>vendor/dist/modules/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/modules/tooltip.js"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/js/sa-functions.min.js"></script>
  
  <script src="<?php echo base_url(); ?>vendor/dist/js/scripts.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/dist/js/custom.js"></script>
</body>
</html>
