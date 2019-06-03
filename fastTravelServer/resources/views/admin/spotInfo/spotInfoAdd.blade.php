@extends('layouts.admin')

@section('content')
    {!! Form::open(['action' => 'adminTouristSpotInfoController@addSpotInformation', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <input type="hidden" name="spot_id" value="{{$spot->id}}">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">NAME</span>
            </div>
            <input type="text" value="{{$spot->name}}" name="name" class="form-control">
            <div class="input-group-prepend">
                <span class="input-group-text">Language</span>
            </div>
            <input type="text" name="language" class="form-control">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">ABOUT</span>
            </div>
            <textarea name="about" id="" class="form-control" rows="5"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">What<br>To<br>Expect</span>
            </div>
            <textarea name="what_to_expect" id="" class="form-control" rows="5"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Activities</span>
            </div>
            <textarea name="activity_infomation" id="" class="form-control" rows="5"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Insider<br>Tip</span>
            </div>
            <textarea name="insider_tip" id="" class="form-control" rows="5"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">How<br>To<br>Use</span>
            </div>
            <textarea name="how_to_use" id="" class="form-control" rows="5"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">How<br>To<br>Get<br>There</span>
            </div>
            <textarea name="how_to_get_there" id="" class="form-control" rows="5"></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Cancellation</span>
            </div>
            <textarea name="cancellation" id="" class="form-control" rows="5"></textarea>
        </div>
    {{Form::submit(__('ADD'), ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}
@endsection