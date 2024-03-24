<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beranda</title> 
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    </head>
    <body>
      <style>
        .ellipsis {
    cursor: pointer;
    font-size: 23px;
    padding-right: 8px;
    font-weight: bold;
    color: rgb(206, 204, 204);
}
.ellipsis::after {
    display: none;
}
.dropdown-menu {
    min-width: 0;
    padding: 0;
    border: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.container.card {
        position: relative;
        padding-top: 20px; /* Atur padding di bagian atas */
        transition: background-color 0.3s; /* Animasi perubahan warna */
    }

    .container.card:hover {
        background-color: white;
    }

    .container.card:hover .ellipsis {
        color: black;
    }
        </style>

<nav class="navbar navbar-dark bg-dark fixed-top" style="padding-top: 1px">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="{{ asset('mylogo.jpeg') }}" width="50px" style="border-radius: 50%"></a>
    <div class="me-auto d-flex "> 
    <a class="nav-item ms-3" href="/home" style="color: aliceblue; font-size:25px; text-decoration:none";>Beranda</a>
    <div class="nav-item ms-3 dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: aliceblue; font-size:25px; text-decoration:none;">
          Buat
      </a>
      <ul class="dropdown-menu dropdown-menu-dark">
          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addAlbum" type="button">Buat Album</a></li>
          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addPhoto" type="button">Upload Foto</a></li>
          <!-- Add more dropdown items as needed -->
      </ul>
  </div>
    </div>
    <div class="d-flex">
      <a class="btn btn-primary" type="submit" style="margin-right: 20px;" href="search">Search</a>
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
            <center>
          <i class="fa-solid fa-user fa-5x fa-auto"></i>
            </center>
          <br><br>
          <!-- resources/views/profile/index.blade.php -->
          </div>
          <h4 align="center" style= "margin-top:-30px; margin-bottom:30pxpx">{{ $profile[0]->username }}</h2><br>
              <p style="margin-bottom:-5px ">Email:  {{ $profile[0]->email }}</p><br>
              <p style="margin-bottom:-5px ">Nama:  {{ $profile[0]->nama_lengkap }}</p><br>
          


           {{-- <li class="nav-item">
            <a class="nav-link" href="/profile">Profile</a>
          </li> --}}
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
      


        <div style="width:80%; padding-top:70px" >
            <div class="row m-2 mt-3 ms-3">
              <div class="row">
                <div class="row column-gap-3">
                  @foreach ($album as $data)
              <div class="container card col-2 m-1 text-center m-2">
                <div class="dropdown position-absolute top-0 end-0">
                  <span class="ellipsis dropdown-toggle" id="folderOptions" data-bs-toggle="dropdown" aria-expanded="false">&#8286;</span>
                  <ul class="dropdown-menu" aria-labelledby="folderOptions">
                      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateModal" type="button" onclick="updateAlbum( '{{$data['id']}}', '{{$data['nama_album']}}', '{{ $data['deskripsi'] }}', '{{ $data['visibilitas'] }}' )">Edit</a></li>
                      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deletePhoto" type="button" onclick="deleteAlbum('{{$data['id']}}')">Hapus</a></li>
                  </ul>
              </div>
                <a class="text-decoration-none " href="album/{{ $data->id }}" style="color: black">
                  <div class="card-img-top mt-4"><i class="fas fa-folder" style="font-size:60px; color:rgb(251, 255, 0)"></i></div>
                 @php
                  echo explode("@", $data->nama_album)[0];
                @endphp </div>
                </a>
              </div>
              @endforeach
                </div>
              </div>
            </div>
          </div>
          </div>  
          

          {{-- modal 3 warning untuk hapus --}}
      <div class="modal fade" id="deletePhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="{{route('deleteAlbum')}}" method="post">
          @csrf
          @method('DELETE')
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah anda yakin ingin menghapus album?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="idAlbum" id="albumIdd">
              Menghapus album akan otomatis menghapus semua foto di dalam nya, Apakah anda tetap ingin menghapus nya?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger">Oke</button>
            </form>
            </div>
          </div>
        </div>
      </div>

       {{-- modal 4 untuk update album --}}
       {{-- modal 4 untuk update album --}}
       <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="{{route('editAlbum')}}" method="POST">
            @csrf
            @method('PUT')
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Album</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="idAlbumm" id="idAlbumm"> 
              <div class="row">
                <p>pilih visibilitas </p>
                <div class="col">
                  <label for="visible">Public</label>
                  <input type="radio" id="public" name="visibilitas" value="public" required>
                </div>
                <div class="col">
                  <label for="visible">Private</label>
                  <input type="radio" id="private" name="visibilitas" value="private" required>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      {{-- end modal 4 --}}

<script>
       function deleteAlbum(id){
        document.getElementById("albumIdd").value = id;
      }

      function updateAlbum(id, namaAlbum, deskripsi, visible){
        document.getElementById("idAlbumm").value = id;
        document.getElementById("deskripsi").value = deskripsi;
        document.getElementById("visible").value = visible;        
      }
    </script>



          <script src= "../bootstrap/js/bootstrap.bundle.min.js"> </script>  
    </body>
</html>