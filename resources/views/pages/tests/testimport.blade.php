@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
        <h1>Test - View Import</h1>

       <pre>
{{print_r($data)}}
</pre>         
<br><br>
<br>
{{$member}}
<br>
{{$member->name}}
<br>
{{-- {{$league}} --}}
<br>
End of array check
{{-- {{$data[1]['member_id']}} --}}
<br><br>
    <table class="table">
        @foreach ($data as $row)
            <tr>
            @foreach ($row as $key => $value)
                <td>{{ $value }}</td>
            @endforeach
            </tr>
        @endforeach
        {{-- <tr>
            @foreach ($data[0] as $key => $value)
                <td>
                    <select name="fields[{{ $key }}]">
                        @foreach (config('app.db_fields') as $db_field)
                            <option value="{{ $loop->index }}">{{ $db_field }}</option>
                        @endforeach
                    </select>
                </td>
            @endforeach
        </tr> --}}
    </table>
        
        
    </div>
</div>     
@endsection