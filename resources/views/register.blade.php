<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <style>
            body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: grid;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

      .login-container {
      background-color: rgb(155, 154, 154);
      padding: 100px;
      border-radius: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 250px;
    }
      .login-container h2 {
      text-align: center;
      color: black;
    } 

     .login-form {
      margin-top: 20px;
    } 

     .form-group {
      margin-bottom: 1px;
    } 

     .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    } 

     .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 8px;

    } 

     .form-group input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
    }

     .form-group input[type="submit"]:hover {
      background-color: #45a049;
    }
    .success-message {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    text-align: center;
  }

  .error-message {
    background-color: #f44336;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    text-align: center;
  }
  </style>
</head>
<body>
  
  <div class="login-container">
    <h2>Register Form</h2>
    
    @if(session('status') == 'success')
    <div class="success-message">
      {{ session('message') }}
    </div>
  @endif

  <!-- Bagian untuk menampilkan pesan kesalahan -->
  @if(session('status') == 'error')
    <div class="error-message">
      {{ session('message') }}
    </div>
  @endif
    <form class="login-form" action="" method="post">
      @csrf
      <div class="form-group">
        <label for="username" style="color:black"><br></label>
        <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
      </div>
      <div class="form-group">
        <label for="email" style="color:black"><br></label>
        <input type="email" onclick="changePlaceHolder()" id="email" name="email" placeholder="Masukkam Email" required>
      </div>
      <div class="form-group">
        <label for="password"><br ></label>
        <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
      </div>
      <center>
        <p> Punya Akun? <br>
        <a href="/login">Ywdah Login</a></p>
        </center>
      <div class="form-group">
        <input type="submit" value="Registrasi">
      </div>
    </form>
  </div>
  <script>
    function changePlaceHolder(){
      var inputElement = document.getElementById('email');
      inputElement.placeholder = "example@gmail.com";
    }
  </script>
</body>
</html>



