<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Victory Admin</title>
    <base href="{{asset('')}}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="source\victory\vendors\mdi\css\materialdesignicons.min.css">
    <link rel="stylesheet" href="source\victory\vendors\simple-line-icons\css\simple-line-icons.css">
    <link rel="stylesheet" href="source\victory\vendors\flag-icon-css\css\flag-icon.min.css">
    <link rel="stylesheet" href="source\victory\vendors\css\vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="source\victory\css\style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="source\victory\images\favicon.png">
  </head>
  
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <div class="row">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
            <div class="row w-100">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-dark text-left p-5">
                  <h2>Login</h2>
                  <h4 class="font-weight-light">Hello! let's get started</h4>
                <form action="{{route('post_login')}}" method="POST">
                  @if(session('info'))
                    <div class="alert alert-danger">
                      {{session('info')}}
                    </div>
                  
                  @endif
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      <i class="mdi mdi-account"></i>
                    </div>
                    {!!showErrors($errors,'email')!!}
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      <i class="mdi mdi-eye"></i>
                    </div>
                    {!!showErrors($errors,'password')!!}
                    <div class="mt-5">
                      <button class="btn btn-block btn-warning btn-lg font-weight-medium" >Login</button>
                    </div>
                    <div class="mt-3 text-center">
                      <a href="#" class="auth-link text-white">Forgot password?</a>
                    </div>                 
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="source\victory\vendors\js\vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="source\victory\js\off-canvas.js"></script>
    <script src="source\victory\js\hoverable-collapse.js"></script>
    <script src="source\victory\js\misc.js"></script>
    <script src="source\victory\js\settings.js"></script>
    <script src="source\victory\js\todolist.js"></script>
    <!-- endinject -->
  
  
  
  </body></html>