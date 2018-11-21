{{-- // errors showing in separate divs        --}}
{{-- @if(count($errors) > 0)

    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>            
        </div>   
    @endforeach

@endif --}}

{{-- // errors showing in one div --}}
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>   
    @foreach($errors->all() as $error)
        
            {{$error}}
            <br />
       
    @endforeach
  
    </div>
@endif
         

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
