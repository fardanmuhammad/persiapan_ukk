<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beranda</title> 
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    </head>
    <body>
        <div style="width:80%; padding-top:70px" >
            <div class="row m-2 mt-3 ms-3">
              <div class="row">
                <div class="row column-gap-3">
                  @foreach ($album as $data)
              <div class="container card col-2 m-1 text-center m-2">
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
    </body>
</html>