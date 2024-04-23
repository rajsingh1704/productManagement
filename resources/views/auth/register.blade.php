<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      /* max-width: 1100px; */
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
          <h3 class="text-center mb-4">Create Account</h3>
         
            <form method="POST" data="{{ route('register') }}" id="insertFormData" autocomplete="off" enctype="multipart/form-data">
 
                @csrf

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Enter Name</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Your Name" value="ADi" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="phoneno" name="phoneno" required placeholder="Enter Mobile Number" value="8709769741" />
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email" value="rajdeveloper0101@gmail.com" />
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="form-label">Select Gender</label>
                            <select class="form-control" name="gender" id="gender" required >
                                <option selected="selected" hidden="true" value="" >Select Gender</option>
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="form-label">Select Role</label>
                            <select class="form-control" name="role" id="role" required >
                                <option selected="selected" hidden="true" value="" >Select Role</option>
                                <option selected value="Admin">Admin</option>
                                <option value="Developer">Developer</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password" value="1234" />
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Password" value="1234" />
                    </div>

                </div>



       
            <button type="submit" id="submit" class="btn btn-primary w-100 mt-3">Register</button>
          </form>
          <div class="text-center mt-3">
            <p>I have already account? <a class="text-primary" href="{{ route('login') }}">Sign In</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="{{ url('assest/formController.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
