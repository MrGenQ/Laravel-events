@extends('main')
@section('content')
    <div class="container" style="width: 60%">
        <div><h2>Register for this event by filling out this form:</h2></div>
        <div>
            @include('_partials/errors')

            <form action="/event/{{$event->id}}/registration" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="fname" placeholder="Name" >
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="phone" placeholder="Phone number: +37000000000" >
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
