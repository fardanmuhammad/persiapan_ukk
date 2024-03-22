<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beranda</title> 
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome/css/all.min.css">
        <link rel="stylesheet" href="{{asset('style/grid.css')}}" type="text/css">

    </head>
    <style>
      .nav-button {
  background-color: rgb(0, 89, 255);
  color: white;
  border-radius: 10%;
  padding: 8px 16px;
  cursor: pointer;
  text-decoration: none;
}

.nav-button:hover {
  background-color: rgb(0, 59, 252);
}

      .center-container{
        display: flex;
        justify-content: center;
        height: 20vh;
      }
      .gmbr{
        padding-top: 70px;
      }

      
    </style>
<body>
  {{-- navbar --}}
  {{-- @dd($profile) --}}
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src="{{ asset('mylogo.jpeg') }}" width="50px" style="border-radius: 50%"></a>
      <div class="me-auto d-flex "> 
      <a class="nav-item ms-3" href="/" style="color: aliceblue; font-size:25px; text-decoration:none";>Beranda</a>
      </div>
      <div class="d-flex">
        <form class="d-flex mt-3" role="search" method="" action="">
          <div class="input-group">
          
          <a class="btn btn-primary" type="submit" style="margin-right: 20px;" href="search">Search</a>
          </div>
        </form>
        </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          {{-- <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">MY PROFILE</h5> --}}
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">  
            <center> 
              <p> Sudah Mempunyai Akun?<br>
                silahkan Login.</p>
            <li class="nav-item">
              <button class="nav-button" onclick="window.location.href='/login'">Login</button>
            </li>
            <br><br>
            <li class="nav-item">
              <p> Belum Mempunyai Akun?<br>
                Silahkan Register Terlebih Dahulu.</p>
              <button class="nav-button" onclick="window.location.href='/register'">Register</button>
            </li>
            </center>
          </ul>
        </div>
        
      </div>
    </div>
  </nav>
  <div class="gmbr">
  <div class="ms-3 me-3 mt-3">
    <section class="flex" id="photos">
      @foreach ($foto as $a)
          <a class="text-decoration-none" href="detail/{{$a['id']}}">
            <div class="overflow-y-hidden">
              <img src="@php
            echo asset($a['lokasi_file']);
          @endphp" class="img-fluid border" alt="..." style="border-radius: 25px">
          <h6 class="text-truncate text-dark fw-bold ps-2">deskripsi</h6>
            </div>
          </a>
      @endforeach
    </section>
  </div>
</div>


  <script src= "../bootstrap/js/bootstrap.bundle.min.js"> </script>  
</body>
