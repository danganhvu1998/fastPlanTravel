@extends('layouts.admin')

@section('content')
    @foreach ($spots as $spot)
        <div class="row">
            <div class="col-lg-6">
                @foreach ($spot->images as $image)
                    <img src="{{$image->link}}" width="100%" alt=""><br>
                @endforeach
            </div>
            <div class="col-lg-5">
                ID: <b>{{$spot->id}} </b><br>
                Name: <b>{{$spot->name}} </b><br>
                Hashtag: <b>{{$spot->hashtag}} </b><br>
                Typical Spending (USD): <b>{{$spot->typical_spending_dollar}} </b><br>
                Level: <b>{{$spot->level}} </b><br>
                Like: <b>{{$spot->like_count}} </b><br>
                Dislike: <b>{{$spot->dislike_count}} </b><br>
                Upper Sport 1 ID: <b>{{$spot->upper_spot_id}} </b><br>
                Upper Sport 2 ID: <b>{{$spot->upper_spot1_id}} </b><br>
            </div>
            <div class="col-lg-1 text-center">
                <a href="/admin/tourist_spot/show/{{$spot->id}}" class="btn btn-success">INFO</a><br>
                <a href="/admin/tourist_spot/edit/{{$spot->id}}" class="btn btn-primary">EDIT</a><br>
            </div>
        </div>  
        <hr>  
    @endforeach
@endsection