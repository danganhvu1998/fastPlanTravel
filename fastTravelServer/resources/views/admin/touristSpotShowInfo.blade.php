@extends('layouts.admin')

@section('content')
    <div>
        <h3>Current Info</h3>
        ID: <b>{{$spot->id}} </b><br>
        Name: <b>{{$spot->name}} </b><br>
        About: <b>{{$spot->about}} </b><br>
        Hashtag: <b>{{$spot->hashtag}} </b><br>
        Typical Spending (USD): <b>{{$spot->typical_spending_dollar}} </b><br>
        Level: <b>{{$spot->level}} </b><br>
        Like: <b>{{$spot->like_count}} </b><br>
        Dislike: <b>{{$spot->dislike_count}} </b><br>
        Upper Sport 1 ID: <b>{{$spot->upper_spot_id}} </b><br>
        Upper Sport 2 ID: <b>{{$spot->upper_spot1_id}} </b><br>
    </div>
    <hr>
    <div>
        <h3>Edit Info</h3>
        {!! Form::open(['action' => 'adminTouristSpotController@editTouristSpot', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="spot_id" value="{{$spot->id}}">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">NAME</span>
                </div>
                <input type="text" name="name" value="{{$spot->name}}" class="form-control">
                {{Form::select('level', [1 => "Biger Than A Country", 2 => 'Country', 3 => 'Area' , 4 => 'Province', 5 => "Tourist Spot (MAIN)", 6 => "Inside A Spot"], $spot->level)}}
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">ABOUT</span>
                </div>
                <textarea name="about" id="" class="form-control" rows="5">{{$spot->about}}</textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">TRAVEL TYPE</span>
                </div>
                <input type="text" placeholder="Exproration, Adventure, Getaway" value="{{$spot->type}}" name="type" class="form-control">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">HASH TAG</span>
                </div>
                <input type="text" placeholder="#tokyo #love #hate #the_hell" name="hashtag" value="{{$spot->hashtag}}" class="form-control">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Typical Spending (US Dollar)</span>
                </div>
                <input type="number" placeholder="1000 2000" name="typical_spending_dollar" value="{{$spot->typical_spending_dollar}}" class="form-control">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upper Spot ID 1</span>
                </div>
                <input type="number" value="{{$spot->upper_spot_id}}" name="upper_spot_id" class="form-control">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upper Spot ID 2</span>
                </div>
                <input type="number" value="{{$spot->upper_spot1_id}}" name="upper_spot1_id" class="form-control">
            </div>
            {{Form::submit(__('EDIT'), ['class' => 'btn btn-outline-primary'])}}
        {!! Form::close() !!}
    </div> 
    <hr>
    <div>
        <h3>Images</h3>
        <div class="row">
            @foreach ($spot->images as $image)
                <div class="col-lg-3">
                    <img src="{{$image->link}}" width="100%" height="100%" alt=""><br>
                </div>
            @endforeach
        </div>
        <hr>
    </div>
    <div>
        <h3>Add Image</h3>
        {!! Form::open(['action' => 'adminTouristSpotController@uploadImageToSpot', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="spot_id" value="{{$spot->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="input-group mb-3">
                {{Form::file('image')}}
                <div class="input-group-prepend">
                    <span class="input-group-text">HASH TAG</span>
                </div>
                <input type="text" placeholder="#tokyo #love #hate #the_hell" name="hashtag" class="form-control">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">ABOUT</span>
                </div>
                <textarea name="about" id="" class="form-control" placeholder="About this image" rows="5"></textarea>
            </div>
            {{Form::submit(__('UPLOAD'), ['class' => 'btn btn-outline-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection