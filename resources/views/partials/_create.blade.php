{{-- hero --}}

<div class=" pb-3 mb-4  border-bottom" style="width: 90%; margin-left:95px;">

    {{-- @if(session('status'))
        {{session('status')}}
    @endif --}}
    
    
    <div style="display: flex; align-items: center;">    
    <button type="submit" data-bs-toggle="modal" data-bs-target="#modalCreateForm" style="background-color: #33b5e5; margin-top: 10px;  width: 50px; height:50px; border-radius: 50%; border:none;">
        {{-- /<div style="background-color: #33b5e5; margin-top: 10px;  width: 50px; height:50px; border-radius: 50%;  "> --}}
        <i class='bx bxs-pencil' style="margin-left: 3px;"></i>
        {{-- </div> --}}
    </button>
        <h3 style="margin-left: 30px; margin-top: 20px;">Add password(s)</h3>
    </div>
          </div>