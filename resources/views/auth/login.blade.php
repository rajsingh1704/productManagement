<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="login-container">
          <h3 class="text-center mb-4">Login</h3>
          @if(session()->has('message'))
            <div class="alert text-white text-center" style="background-color: rgb(226, 76, 76); font-size:15px;">
                {{ session()->get('message') }}
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email" />
             
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required placeholder="Password" />
            </div>
       
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
          <div class="text-center mt-3">
            <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
