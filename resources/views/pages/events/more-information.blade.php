<?php
use App\Models\Events;
?>
@extends('main')
@section('content')
    <div class="container" style="display: flex; justify-content: center">
        <div class="event-cards" style="padding: 2%; display: flex; gap: 2%; flex-wrap: wrap; flex-direction: row; margin: auto">
                <div class="card" style="width: 100vh; padding: 2%; display: flex; align-items: center">
                    <div class="card-body">
                        @if($event->logo != "")
                            <img style="width: 90vh; height: 60vh;" src="{{ asset('/storage/'.$event->logo) }}" alt="">
                        @else
                            <img style="width: 90vh; height: 60vh;" src="https://i.guim.co.uk/img/media/b73cc57cb1d46ae742efd06b6c58805e8600d482/16_0_2443_1466/master/2443.jpg?width=700&quality=85&auto=format&fit=max&s=fb1dca6cdd4589cd9ef2fc941935de71" alt="">
                        @endif
                        <h3 class="card-title" style="text-transform: uppercase">{{$event->title}}</h3>
                        <p class="card-text">Event Date and Time: {{$event->date}}</p>
                        <p class="card-text">Description: {{$event->description}}</p>
                        <p class="card-text">Organizer: {{$event->user->name}}</p>
                        <a href="/registration/{{$event->id}}" class="btn btn-primary">Registration</a>
                    </div>
                </div>
        </div>
    </div>

@endsection
