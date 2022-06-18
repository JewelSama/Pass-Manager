@extends('layout')

@section('content')
@include('partials._create')


    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <div class="d-flex justify-content-center" style="width: 90%; margin-left:95px;">
    <table id="example" class="table table-striped table-bordered" style="width: 1200px;" >
        <thead>
            <tr>
                <th>S/N</th>
                <th>App</th>
                <th>username</th>
                <th>Password</th>
                <th>Alternate Login</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @unless($posts->isEmpty())
            @foreach($posts as $i => $post)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$post->app}}</td>
                <td>{{$post->username}}</td>
                <td>
                <div style="display: flex; justify-content:space-between">
                <input type="password" id="pass{{$i}}" value="{{$post->password}}" style="border: none; background-color:inherit">
                <button class="toggle" data-element="pass{{$i}}" style="background-color: rgb(199, 191, 191); height: 30px;border:none;  width: 30px; border-radius:3px;">
                    <i class="fa-solid fa-eye" style="color: #000; font-size: 18px; margin-left: -1px; margin-top:5px;"></i>
                </button>
                </td>
                
                <td>{{$post->alternate_login}}</td>
                <td>
                <div style="display: flex;">
                <div style="background-color: #33b5e5; height: 30px; width: 30px; border-radius:3px; margin-left: 5px;"><a data-bs-toggle="modal" data-bs-target="#modalEditForm" href="{{ route('edit.post',$post->id) }}"><i class='bx bxs-pencil' style="color: #fff; font-size: 18px; margin-left: 6px; margin-top:6px;"></i></a></div>
                <div style="background-color: red; height: 30px; width: 30px; border-radius:3px; margin-left: 6px;"><a href="#"><i class='bx bx-trash' style="color: #fff; font-size: 18px; margin-left: 6px; margin-top:6px;"></i></a></div>
            </div>
                </td>
            </tr>
            @endforeach

            @else
            <tr>
                <td>
                    <p>No Password yet😉</p>
                </td>
            </tr>
            @endunless


        <tfoot>
            <tr>
                <th>S/N</th>
                <th>App</th>
                <th>Username</th>
                <th>Password</th>
                <th>Alternate Login</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    const Toggles = document.querySelectorAll('.toggle');
    Toggles.forEach((x) => {
        x.addEventListener('click', ()=>{
            
            let element = document.getElementById(x.dataset.element);
            let icon = x.children[0];
            
            if(element.type == 'text'){
            element.setAttribute('type', 'password')
            icon.className = "fa-solid fa-eye"
            } else {
            element.setAttribute('type', 'text')
            icon.className = "fa-solid fa-eye-slash"
            }
        })
    })
    

</script>
    @endsection
