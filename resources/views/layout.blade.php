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
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
            </ul>
            <span>
                <div class="dropdown">
                    <button class=" btn dropdown-toggle text-white" id="dropdownMenuButton1" 
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('images/anime6.jpg')}}" width="40" height="40" class="rounded-circle">
                      
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      @auth
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li><a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Logout</a></li>
                      @endauth

                      @guest
                      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLoginForm" href="#">Login</a></li>
                      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalRegisterForm" href="#">Register</a></li>
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
    @yield('content')
</body>
</html>