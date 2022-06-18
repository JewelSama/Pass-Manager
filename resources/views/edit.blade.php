<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Edit your password</title>
</head>
<body>

<h1 style="text-align: center; margin-Top: 20px"><b>Edit your password</b></h1>
<form class="mt-5 flex mx-auto w-25 needs-validation" method="POST" action="{{url('update-data/'.$post->id)}}">
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

</body>
</html>