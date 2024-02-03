<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beranda</title> 
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome/css/all.min.css">

    </head>
    <style>
      .center-container{
        display: flex;
        justify-content: center;
        height: 20vh;
      }

      
    </style>
<body>
  {{-- navbar --}}
  {{-- @dd($profile) --}}
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Logo</a>
      <div class="me-auto">
      <a class="nav-item ms-3" href="#" style="color: aliceblue; font-size:25px; text-decoration:none";>Beranda</a>
      <a class="nav-item ms-3" href="#" style="color: aliceblue; font-size:25px; text-decoration:none";>Buat</a>
      </div>
      <div class="me-auto">
      <form class="d-flex mt-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">MY PROFILE</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


            {{-- Tampilan Profile --}}
            <div class="center-container">
            <i class="fa-solid fa-user fa-5x fa-auto"></i><br>
            <!-- resources/views/profile/index.blade.php -->
            </div>
            <center><h2>{{ $profile[0]->username }}</h2><br></center>
                <p>Email:  {{ $profile[0]->email }}</p><br>
                <p>nama_lengkap:  {{ $profile[0]->nama_lengkap }}</p><br>
                <p>alamat:  {{ $profile[0]->alamat }}</p><br>
            



            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                My Postingan
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="/profile">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>


  
  <script src= "../bootstrap/js/bootstrap.bundle.min.js"> </script>  
</body>
