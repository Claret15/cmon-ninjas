@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="jumbotron">
            <h1>Welcome To Infernal Pathfinders Guild</h1>
            <p>After a weary battle against the Legendary Bosses, wondering around Korelis, you find sanctuary at Infernal Pathfinders.</p>
            <p>Make yourself at home and learn more about the guild.</p>
        </div>

    <?php
        use App\Models\Player;
        // use Player::class;
        Player::all();


    ?>


    </div>

@endsection