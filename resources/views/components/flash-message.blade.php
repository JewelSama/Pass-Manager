@if(session()->has('message'))
    <div class="fixed-top w-25 mx-auto text-center bg-primary text-white px-30 py-1">
        <p>
            {{session('message')}}
        </p>
    </div>

@endif