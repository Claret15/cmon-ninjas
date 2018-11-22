{{-- This shows system generated errors --}}
@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>   
    @foreach($errors->all() as $error)
        
            {{$error}}
            <br />
       
    @endforeach
  
    </div>
@endif
         
{{-- This provides custom success meessages --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- This provides custom error messages --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
