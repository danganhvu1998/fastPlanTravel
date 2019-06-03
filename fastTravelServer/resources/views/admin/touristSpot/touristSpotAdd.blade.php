@extends('layouts.admin')

@section('content')
    {!! Form::open(['action' => 'adminTouristSpotController@addTouristSpot', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">NAME</span>
            </div>
            <input type="text" name="name" class="form-control">
            {{Form::select('level', [1 => "Biger Than A Country", 2 => 'Country', 3 => 'Area' , 4 => 'Province', 5 => "Tourist Spot (MAIN)", 6 => "Inside A Spot"], 5)}}
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">ABOUT</span>
            </div>
            <textarea name="about" id="" class="form-control" rows="5"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">TRAVEL TYPE</span>
            </div>
            <input type="text" placeholder="Exproration, Adventure, Getaway" name="type" class="form-control">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">HASH TAG</span>
            </div>
            <input type="text" placeholder="#tokyo #love #hate #the_hell" name="hashtag" class="form-control">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Typical Spending (US Dollar)</span>
            </div>
            <input type="number" placeholder="1000 2000" name="typical_spending_dollar" class="form-control">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Upper Spot ID 1</span>
            </div>
            <input type="number" value="0" name="upper_spot_id" class="form-control">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Upper Spot ID 2</span>
            </div>
            <input type="number" value="0" name="upper_spot1_id" class="form-control">
        </div>
    {{Form::submit(__('ADD'), ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}
@endsection