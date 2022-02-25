@extends('main')
@section('content')
    <div class="container" style="width:100%; background-color: #85a4ea; min-height: 60rem;">
        <h2 style="font-size: 60px; color: #ffffff">Contact Event Organizers</h2>
        @foreach($events as $event)
            <div class="card w-75">
                <div class="card-body" style="background-color: #95b9fc">
                    <h5 class="card-title" style="text-transform: capitalize">{{$event->user->name}}</h5>
                    <p class="card-text" style="text-transform: capitalize">{{$event->user->email}}</p>
                    <p class="card-text">Event organized: {{$event->title}}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
