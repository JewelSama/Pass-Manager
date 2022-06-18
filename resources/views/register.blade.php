<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Register account</title>
</head>
<body>
  <!-- <div class="w-75"> -->
    <form class="mt-5 flex mx-auto w-25" method="POST" action="{{route('register')}}" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="validationCustom01" class="form-label">Username</label>
        <input type="text" required class="form-control" name="username" placeholder="Enter username" name="username" value="{{old('username')}}">
        @error('username')
            <div class="text-danger text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="validationCustom01" class="form-label">Email</label>
      <input type="email" required class="form-control" placeholder="Enter your email" name="email" value="{{old('email')}}">
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
    <div class="mb-3">
      <label for="validationCustom01" class="form-label">Confirm password</label>
      <input type="password" required class="form-control" placeholder="Confirm your password" name="password_confirmation">
      
    </div>   
    
    <div class="mb-3">
      <label for="" class="form-label">Profile Pic</label>
      <input type="file" required class="form-control" name="logo">
      
    </div>              
    
    
    </div>
    <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Register</button>
    </div>
    </form>
<!-- </div> -->
</body>
</html>