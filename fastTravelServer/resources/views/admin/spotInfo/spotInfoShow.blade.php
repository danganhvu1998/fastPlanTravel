@extends('layouts.admin')

@section('content')
    <h3>TOURIST SPOT INFORMAION</h3>
    <b>Name:</b> {{$spotInfo->name}} <br>
    <b>Language:</b> {{$spotInfo->language}} <br>
    <b>About:</b> {{$spotInfo->about}} <br>
    <b>What To Expect:</b> {{$spotInfo->what_to_expect}} <br>
    <b>Activity Infomation:</b> {{$spotInfo->activity_infomation}} <br>
    <b>Insider Tip:</b> {{$spotInfo->insider_tip}} <br>
    <b>How To Use:</b> {{$spotInfo->how_to_use}} <br>
    <b>How To Get There:</b> {{$spotInfo->how_to_get_there}} <br>
    <b>Cancellation:</b> {{$spotInfo->cancellation}} <br>

    <hr>
    <h3>EDIT INFORMATION</h3>
    {!! Form::open(['action' => 'adminTouristSpotInfoController@spotInfoEdit', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <input type="hidden" name="spot_info_id" value="{{$spotInfo->id}}">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">NAME</span>
            </div>
            <input type="text" name="name" value="{{$spotInfo->name}}" class="form-control">
            <div class="input-group-prepend">
                <span class="input-group-text">Language</span>
            </div>
            <input type="text" name="language" class="form-control" value="{{$spotInfo->language}}">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">ABOUT</span>
            </div>
            <textarea name="about" id="" class="form-control" rows="5">{{$spotInfo->about}}</textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">What<br>To<br>Expect</span>
            </div>
            <textarea name="what_to_expect" id="" class="form-control" rows="5">{{$spotInfo->what_to_expect}}</textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Activities</span>
            </div>
            <textarea name="activity_infomation" id="" class="form-control" rows="5">{{$spotInfo->activity_infomation}}</textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Insider<br>Tip</span>
            </div>
            <textarea name="insider_tip" id="" class="form-control" rows="5">{{$spotInfo->insider_tip}}</textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">How<br>To<br>Use</span>
            </div>
            <textarea name="how_to_use" id="" class="form-control" rows="5">{{$spotInfo->how_to_use}}</textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">How<br>To<br>Get<br>There</span>
            </div>
            <textarea name="how_to_get_there" id="" class="form-control" rows="5">{{$spotInfo->how_to_get_there}}</textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Cancellation</span>
            </div>
            <textarea name="cancellation" id="" class="form-control" rows="5">{{$spotInfo->cancellation}}</textarea>
        </div>
    {{Form::submit(__('EDIT'), ['class' => 'btn btn-outline-primary'])}}
    {!! Form::close() !!}
@endsection