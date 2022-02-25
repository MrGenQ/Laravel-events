@extends('main')
@section('content')
    <div class="container" style="width: 60%">
        <div><h2>Update -- {{$event->title}} -- Event</h2></div>
        <div>
            @include('_partials/errors')

            <form action="/update/{{$event->id}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="title" placeholder="{{$event->title}}" value="{{$event->title}}">
                </div>
                <div class="form-group">
                    <label>Date and Time</label>
                    <input type="datetime-local" class="form-control form-control-lg" name="date" value="{{substr($event->date, 0, 10).'T'.substr($event->date, 11, 8)}}">
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-lg" name="description" placeholder="{{$event->description}}">{{$event->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" name="logo" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary" >Save</button>
            </form>
        </div>
    </div>

@endsection
