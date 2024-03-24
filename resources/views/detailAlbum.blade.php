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
        padding-top: 150px;
      }
      .ellipsis {
    cursor: pointer;
    font-size: 20px;
    padding-right: 8px;
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

    .ellipsis {
        cursor:pointer;
        font-size: 23px;
        font-weight: bold;
        color: rgb(206, 204, 204);
    }

    .container.card:hover {
        background-color: white;
    }

    .card:hover .ellipsis {
        color: black;
    }

      
    </style>
<body>
  {{-- navbar --}}
  {{-- @dd($profile) --}}
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="{{ asset('mylogo.jpeg') }}" width="50px" style="border-radius: 50%"></a>
      <div class="me-auto d-flex "> 
      <a class="nav-item ms-3" href="/home" style="color: aliceblue; font-size:25px; text-decoration:none";>Beranda</a>
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
      <div class="nav-item ms-3 col d-flex justify-content-center align-items-center" style="color: aliceblue; font-size:25px; text-decoration:none";>
        <h2>{{ $namaAlbum }}</h2>
    </div>
      <div class="d-flex">
        <a class="btn btn-primary" type="submit" style="margin-right: 20px;" href="search">Search</a>
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
             <div class="d-flex">
              @if(isset($profile[0]))
                  <div class="center-container">
                      <i class="fa-solid fa-user fa-5x fa-auto"></i><br>
                  </div>
                  <center><h4 style="margin-top:-30px; margin-bottom:30pxpx">{{ $profile[0]->username }}</h2><br></center>
                  <p style="margin-bottom:-5px ">Email:  {{ $profile[0]->email }}</p><br>
                  <p style="margin-bottom:-5px ">Nama:  {{ $profile[0]->nama_lengkap }}</p><br>
                  <p style="margin-bottom:-5px ">Alamat:  {{ $profile[0]->alamat }}</p><br>
              @else
                  <p>Profil tidak ditemukan.</p>
              @endif
          </div>
             



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
            
  <div class="gmbr">
 <div class="container">
  <div class="row">
      @foreach ($detailFoto as $a)
      <div class="col-md-4 grid-item">
        <div class="card">
          <div class="dropdown position-absolute top-0 end-0">
            <span class="ellipsis dropdown-toggle" id="folderOptions" data-bs-toggle="dropdown" aria-expanded="false">&#8286;</span>
            <ul class="dropdown-menu" aria-labelledby="folderOptions">
                {{-- <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateModal" type="button">Edit</a></li> --}}
                <form action="/hapusfoto/{{ $a['id'] }}" method="POST">
                  @csrf
                  @method('DELETE')
                <li><input value="hapus" class="dropdown-item" type="submit"></li>
                </form>
            </ul>
        </div>
          <label>
            <a class="text-decoration-none" href="detail/{{$a['id']}}">
              <div class="overflow-y-hidden">
          <img src="@php
          echo asset($a['lokasi_file']);
        @endphp" class="card-img-top" alt="...">
          <div class="card-body">
             <h5 class="card-title">{{$a['deskripsi_foto']}}</h5>
             <!-- Tombol, Tautan, atau elemen lainnya -->
          </div>
        </a>
          </div>
        </label>
       </div>
    </div>
      @endforeach
  </div>
</div>
  </div>

  {{-- modal 3 warning untuk hapus --}}
  {{-- <div class="modal fade" id="deletePhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{route('deleteAlbum')}}" method="post">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" name="idAlbum" id="albumIdd">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah anda yakin ingin menghapus foto?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Oke</button>
        </form>
        </div>
      </div>
    </div>
  </div> --}}

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
          <div class="mb-3">
            <label for="formDeskripsi" class="form-label">Deskripsi Foto</label>
            <textarea class="form-control" id="formDeskripsi" name="deskripsi" rows="3" required></textarea>  
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

    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
</body>
</html>