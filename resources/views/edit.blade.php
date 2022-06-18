


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
