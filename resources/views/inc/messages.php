{{-- // errors showing in separate divs        --}}
@if(count($errors) > 0)

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>   
    @endforeach

@endif

{{-- // errors showing in one div --}}
{{-- @if(count($errors) > 0)
    <div class="alert alert-danger">
    @foreach($errors->all() as $error)
        
            {{$error}}
            <br />
       
    @endforeach
    </div>
@endif --}}
         

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
