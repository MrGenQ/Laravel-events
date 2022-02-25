<?php
use App\Models\Events;
    ?>
@extends('main')
@section('content')
    <div class="container">
        <div style="display: flex; flex-direction: row; gap: 20px; padding: 5% 0 5% 0">
            <div>
                <img src="https://wallpapercave.com/wp/wp2349395.jpg"
                     style="width: 50em;
                            height: 25em;"
                    alt="">
            </div>
            <div style="padding: 10% 0 5% 0">
                <h3>Event Project</h3>
                <p>Created this project using laravel</p>
                <a href="/show-events" class="btn btn-primary">All Events</a>
            </div>
        </div>
        <div class="register-events" style="border: solid #808080; background-color: #6b7280; color: #ffffff; height: 5em;
            display: flex; justify-content: center; align-items: center">
            <a href="events-dashboard" style="text-decoration: none; color: white">All Events and Register to an Event in one place</a>
        </div>
                    <div class="event-cards" style="padding: 2%; display: flex; gap: 2%">
                    @foreach($events as $event)
                        <div class="card" style="width: 30%;">
                            <div class="card-body">
                                <h5 class="card-title">{{$event->title}}</h5>
                                <p class="card-text">{{$event->description}}</p>
                                <a href="more-information/{{$event->id}}" class="btn btn-primary">More information and registration</a>
                            </div>
                        </div>
                    @endforeach
        </div>
        {{$events->links()}}
    </div>

@endsection
