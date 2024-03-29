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
  <nav class="navbar navbar-dark bg-dark fixed-top" >
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Logo</a>
      <div class="me-auto d-flex "> 
      <a class="nav-item ms-3" href="home" style="color: aliceblue; font-size:25px; text-decoration:none";>Beranda</a>
      </div>
      <div class="d-flex">
        <form class="d-flex mt-3" role="search" action="{{route('cari')}}" method="POST">
            @csrf
          <input class="form-control me-2" id="search" name="keyword" type="search" placeholder="Search" aria-label="Search" style="padding-right: 500px">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
        </div>

      {{-- drawer --}}
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
            {{-- <h4 align="center" style= "margin-top:-30px; margin-bottom:30pxpx">{{ $profile[0]->username }}</h2><br>
                <p style="margin-bottom:-5px ">Email:  {{ $profile[0]->email }}</p><br>
                <p style="margin-bottom:-5px ">Nama:  {{ $profile[0]->nama_lengkap }}</p><br>
                <p style="margin-bottom:-5px ">Alamat:  {{ $profile[0]->alamat }}</p><br> --}}
            


             <li class="nav-item">
              <a class="nav-link" href="/profile">Profile</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:5px">
                My Postingan
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="/public">Public</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                </li>
                <li><a class="dropdown-item" href="/private">Private</a></li>
              </ul>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
        </div>
      </div>
    </div>
  </nav>

  <div class="gmbr">
    <div class="ms-3 me-3 mt-3">
      <section class="flex" id="photos">
        @if (isset($hasil))
        @foreach ($hasil as $a)
            <a class="text-decoration-none" href="detail/{{$a['id']}}">
              <div class="overflow-y-hidden">
                <img src="@php
              echo asset($a['lokasi_file']);
            @endphp" class="img-fluid border" alt="..." style="border-radius: 25px">
            <h6 class="text-truncate text-dark fw-bold ps-2">{{ $a['deskripsi_foto'] }}</h6>
              </div>
            </a>
        @endforeach
        @endif
      </section>
    </div>
  </div>
  <script src= "../bootstrap/js/bootstrap.bundle.min.js"> </script>  
</body>
</html>