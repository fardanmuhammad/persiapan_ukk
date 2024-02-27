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
  <div class="container">
    <div class="fixed-bottom mb-4 me-5 text-end">
      <button class="rounded-pill text-light border-0 text-center p-2 pe-1 fs-5" data-bs-toggle="modal" data-bs-target="#addPhoto" style="background-color: black;">
        <i class="fa fa-image text-light"></i> Foto + 
      </button>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Logo</a>
      <div class="me-auto d-flex "> 
      <a class="nav-item ms-3" href="#" style="color: aliceblue; font-size:25px; text-decoration:none";>Beranda</a>
      <div class="nav-item ms-3 dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: aliceblue; font-size:25px; text-decoration:none;">
            Buat
        </a>
        <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Buat Album</a></li>
            <li><a class="dropdown-item" href="#">Upload Foto</a></li>
            <!-- Add more dropdown items as needed -->
        </ul>
    </div>
      </div>
      <div class="d-flex">
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
            {{-- <div class="center-container">
            <i class="fa-solid fa-user fa-5x fa-auto"></i><br>
            <!-- resources/views/profile/index.blade.php -->
            </div>
            <center><h4 style= "margin-top:-30px; margin-bottom:30pxpx">{{ $profile[0]->username }}</h2><br></center>
                <p style="margin-bottom:-5px ">Email:  {{ $profile[0]->email }}</p><br>
                <p style="margin-bottom:-5px ">Nama:  {{ $profile[0]->nama_lengkap }}</p><br>
                <p style="margin-bottom:-5px ">Alamat:  {{ $profile[0]->alamat }}</p><br>
             --}}



            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-bottom:5px">
                My Postingan
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="/profile">Public</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Follower</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Private</a></li>
              </ul>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
        </div>
      </div>
    </div>
  </nav>
      {{-- end navbar --}}
      <div style="width:80%">
        <div class="row m-2 mt-3 ms-3">
          <div class="row">
            <div class="border-bottom border-3 border-dark mb-3 pb-2 pt-2">
              <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $namaAlbum }}</h2>
                {{-- <a href="/create-album" class="text-decoration-none"><h5 class="rounded-pill p-2 text-light text-center" style="background-color: black">Tambah +</h5></a> --}}
                <button type="button" class="rounded-pill text-light border-0 text-center p-1 fs-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: black">
                  Tambah +
                </button>
              </div>
            </div>
            <div class="row column-gap-3">
          <div class="container">
            <div class="row">
                @foreach ($detailFoto as $a)
                <div class="col-md-4 grid-item">
                  <div class="card">
                    <img src="@php
                    echo asset($a['lokasi_file']);
                  @endphp" class="card-img-top" alt="...">
                    <div class="card-body">
                       <h5 class="card-title">Ini judul ceritanya</h5>
                       <p class="card-text text-truncate">{{$a['deskripsi']}}</p>
                       <!-- Tombol, Tautan, atau elemen lainnya -->
                    </div>
                 </div>
              </div>
                @endforeach
            </div>
        </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Buat Folder --}}
     {{-- Modal --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/create-album" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Buat Album</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container">
        <label for="AlbumName">Nama Album</label>
        <input class="form-control" type="text" name="album_name" id="AlbumName" placeholder="Nama Album">
        <label for="AlbumName">Visibilitas</label>
        <select name="visible" class="form-select">
          <option value="Public">Public</option>
          <option value="Follower">Follower</option>
          <option value="Private">Private</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          @csrf
        <input type="submit" class="btn text-light" style="background-color: black" value="Buat">
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Modal 2 --}}
<div class="modal fade" id="addPhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/addPhoto" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambahkan Foto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container">
        <div class="mb-3">
          <label for="formFile" class="form-label">Default file input example</label>
          <input class="form-control" type="file" id="formFile" name="foto">
        </div>              
        <label for="AlbumName">Visibilitas</label>
        <select name="albumName" class="form-select">
          {{-- @foreach ($album as $a)
            <option value="{{ $a['nama_album'] }}!!!{{ $a['id'] }}">@php
              echo explode("@", $a['nama_album'])[0];
            @endphp 
            ({{ $a['visibilitas'] }})</option>
          @endforeach --}}
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn text-light" style="background-color: black" value="Buat">
      </form>
      </div>
    </div>
  </div>
</div>


 {{-- end modal 2 --}}


    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
</body>
</html>