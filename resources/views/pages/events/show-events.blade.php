<?php
use App\Models\Events;
?>
@extends('main')
@section('content')
    <div class="container">
        <h2 style="font-size: 60px;">All Events</h2>
        <div class="event-cards" style="padding: 2%; display: flex; gap: 2%; flex-wrap: wrap; flex-direction: row; margin: auto">
            @foreach($events as $event)
                <div class="card" style="min-width: 45%; padding: 2%;">
                    <div class="card-body">
                            @if($event->logo != "")
                            <img style="width: 24rem; height: 18rem;" src="{{ asset('/storage/'.$event->logo) }}" alt="">
                                @else
                                <img style="width: 24rem; height: 18rem;" src="https://i.guim.co.uk/img/media/b73cc57cb1d46ae742efd06b6c58805e8600d482/16_0_2443_1466/master/2443.jpg?width=700&quality=85&auto=format&fit=max&s=fb1dca6cdd4589cd9ef2fc941935de71" alt="">
                            @endif
                            <h5 class="card-title" style="text-transform: uppercase">{{$event->title}}</h5>
                            <p>Event Date and Time: {{$event->date}}</p>
                            <p class="card-text">Description: {{$event->description}}</p>
                            <p class="card-text">Organizer: {{$event->user->name}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
