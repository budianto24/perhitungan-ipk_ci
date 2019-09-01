<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url();?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this page -->
    <link href="<?= base_url();?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style.css">

    <title><?= $title?></title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url();?>">Nilai App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Data
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url();?>mahasiswa">Data Mahasiswa</a>
              <a class="dropdown-item" href="<?= base_url();?>matakuliah">Data Matakuliah</a>
              <a class="dropdown-item" href="<?= base_url();?>fakultas">Data Fakultas</a>
              <a class="dropdown-item" href="<?= base_url();?>prodi">Data Prodi</a>
            </div>
            
          </li>
          <form class="form-inline ml-3" action="<?= base_url();?>dashboard/search" method="get">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
          </form>
        </ul>
        <a href="<?= base_url();?>auth/logout" class="btn btn-danger btn-sm"><span class="fas fa-sign-out-alt"></span> Logout</a>
      </div>
    </div>
  </nav>