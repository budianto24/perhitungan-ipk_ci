<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

    <title>Nilai App</title>
  </head>
  <body>

   <nav class="navbar navbar-inverse" style="border-radius: 0">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Nilai App</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= base_url()?>">Dashboard</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data<span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li><a href="<?= base_url('mahasiswa')?>">Data Mahasiswa</a></li>
            <li><a href="<?= base_url('matakuliah')?>">Data Matakuliah</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" action="<?= base_url()?>dashboard/search" method="GET">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="keyword">
        </div>
      </form>
      <ul class="nav navbar-nav">
        <li><a href="<?= base_url()?>mahasiswa/tambah"><span class="glyphicon glyphicon-plus"></span> Mahasiswa</a></li>
        <li><a href="<?= base_url()?>matakuliah/tambah"><span class="glyphicon glyphicon-plus"></span> MatKul</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= base_url()?>auth/logout">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>