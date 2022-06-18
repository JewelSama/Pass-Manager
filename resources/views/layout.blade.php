<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e65de960bb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
    <title>Password Manager</title>
</head>
<body>
    <style>
        i{
            font-size: 30px;
            color: #fff;
            /* background-color: #33b5e5; */
            /* position: absolute; */
            margin-top: 10px;
            margin-left: 10px;
            /* padding: 10; */
            /* align-items: center; */
        }
        
    </style>
    <nav class="navbar navbar-expand-lg bg-info" >
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Manager</a>
        
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/pass">Home</a>
              </li>
            </ul>
            <span>
                <div class="dropdown">
                    <button class=" btn dropdown-toggle text-white" id="dropdownMenuButton1" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('storage/'.auth()->user()->logo)}}" width="40" height="40" class="rounded-circle">
                      
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      @auth
                      <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
                      <li><a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{route('logout')}}">Logout</a></li>
                      @endauth

                      @guest
                      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLoginForm" href="#">Login</a></li>
                      @endguest
                    </ul>
                  <span class="text-white"> Howdy, <b>
                    @auth
                    {{auth()->user()->username}}</b>@endauth @guest New User @endguest </span>
                </div>
            </span>
          </div>
        </div>
      </nav>


        <script>
            $(document).ready(function () {
                $('#example').DataTable();
                console.log($('#example'))
            });

        </script>


  {{-- modal create --}}
  <div class="modal fade" id="modalCreateForm" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Add to Password Manager</h5>
        </div>
        <div class="modal-body">


            <form class="needs-validation" method="POST" action="/pass">
                @csrf
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">App</label>
                    <input type="text" required class="form-control" placeholder="Enter app name" name="app">
                    @error('app')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                </div>
                    
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Username</label>
                    <input type="text" required class="form-control" placeholder="Enter username" name="username">
                    @error('username')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Password</label>
                    <input type="text" required class="form-control" placeholder="Enter your password" name="password">
                    @error('password')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                </div>   
                
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Alternate login</label>
                    <input type="text" required class="form-control" placeholder="Enter alt login" name="alternate_login">
                    @error('alternate_login')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                  </div>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
      </div>
    </div>
  </div>










  {{-- modal edit --}}
  <div class="modal fade" id="modalEditForm" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Edit password</h5>
        </div>
        <div class="modal-body">


            <form class="needs-validation" method="POST" action="/pass/{{$post->id}}">
            
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">App</label>
                    <input type="text" value="{{$post->app}}" required class="form-control" placeholder="Enter app name" name="app">
                    @error('app')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                </div>
                    
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Username</label>
                    <input type="text" value="{{$post->username}}" required class="form-control" placeholder="Enter username" name="username">
                    @error('username')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Password</label>
                    <input type="text" value="{{$post->password}}" required class="form-control" placeholder="Enter your password" name="password">
                    @error('password')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                </div>   
                
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Alternate login</label>
                    <input type="text" value="{{$post->alternate_login}}" required class="form-control" placeholder="Enter alt login" name="alternate_login">
                    @error('alternate_login')
                        <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                  </div>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
      </div>
    </div>
  </div>







  {{-- modal login --}}
  <div class="modal fade {{$errors->any() ? 'show' : ''}}" id="modalLoginForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login to your account</h5>
        </div>
        <div class="modal-body">


            <form class="needs-validation" method="POST" action="{{route('login')}}">
                @csrf
                <div class="mb-3">
                  <label for="validationCustom01" class="form-label">Email</label>
                  <input type="email" required class="form-control" placeholder="Enter your email" name="email">
                  @error('email')
                    <div class="text-danger text-sm">{{$message}}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="validationCustom01" class="form-label">Password</label>
                  <input type="password" required class="form-control" placeholder="Enter your password" name="password">
                  @error('password')
                  <div class="text-danger text-sm">{{$message}}</div>
                @enderror
                </div>              


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Login</button>
            
          <p>
              Don't have an account? <a href="{{route('register.page')}}">Register</a>
          </p>
        </div>
    </form>
      </div>
    </div>
  </div>


  {{-- modal register
  <div class="modal fade {{$errors->any() ? 'show' : ''}}" id="modalRegisterForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create an account</h5>
          </div>
          <div class="modal-body"> 
            
        </div>
      </div>
    </div> --}}
  
        <!-- Modal Logout -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to logout?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary">Cancel</button>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Logout</button>
        </form>
        </div>
      </div>
    </div>
  </div>


 
</div>

    <x-flash-message />
    @yield('content')
</body>
</html>