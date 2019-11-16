<!doctype html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this page -->
    <link href="<?= base_url();?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>vendor/bootstrap/css/bootstrap.min.css">

    <title><?= $title?></title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4" style="margin-top: 120px;">
          <h1 class="text-center mb-3">Nilai App</h1>
        <?= $this->session->flashdata('flash')?>  
          <div class="card">
            <h5 class="card-header text-center"><span class="fa fa-sign-in-alt"></span> Login Form</h5>
            <div class="card-body">
              <?= form_open()?>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                  <small><?= form_error('username')?></small>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  <small><?= form_error('password')?></small>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              <?= form_close()?>
            </div>
          </div>
          <div class="text-center mt-5"><small>Copyright&copy;2019 Budianto</small></div>
        </div>
      </div>
    </div>

  <script src="<?= base_url();?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url();?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>
  </body>
</html>