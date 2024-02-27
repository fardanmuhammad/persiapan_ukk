<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type="tetx/css" rel="stylesheet">
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
      margin-bottom: 15px;
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
    }  */
  </style>
</head>
<body>
  
  <div class="login-container">
    <h2>Login Form</h2>
    <form class="login-form" action="" method="post">
      @csrf
      <div class="form-group">
        <label for="username" style="color:black">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
      </div>
      <div class="form-group">
        <label for="password" style="color: black">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan Password">
      </div>
      <center>
      <p> Belum Punya Akun? <br>
      <a href="register">Yah Tinggal Regist</a></p>
      </center>
      <div class="form-group">
          <input type="submit" value="Login">
        </div>
      </div>
    </form>
  </div>
</body>
</html>
