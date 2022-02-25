@extends('main')
@section('content')
    <div class="container" style="width: 60%">
        <div><h2 style="font-size: 60px;">Add Event</h2></div>
        <div>
        @include('_partials/errors')

            <form action="/store-event" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="title" placeholder="Title" >
                </div>
                <div class="form-group">
                    <label>Date and Time</label>
                    <input type="datetime-local" class="form-control form-control-lg" name="date">
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-lg" name="description" placeholder="Description"></textarea>
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
