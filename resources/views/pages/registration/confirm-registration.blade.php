@extends('main')
@section('content')
<div class="container" style="width: 60%;display: flex; align-items: center; flex-direction: column">
    <h2 style="font-size: 60px;">Unconfirmed Registrations</h2>
    @foreach($events as $event)
    @if($event->user->name === Auth::user()->name)
    <h3 style="font-size: 35px;">Registratons for "{{$event->title}}"</h3>
        <table class="table table-bordered table-responsive">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Confirmation</th>
                <th>Registration Status</th>
            </tr>
            @foreach($registrations as $registration)
                @if($registration->event_id === $event->id)
                <tr>
                    <th>{{$registration->fname}}</th>
                    <th>{{$registration->email}}</th>
                    <th>{{$registration->phone}}</th>
                    <th>
                        @if($registration->status === 0)
                            Unconfirmed
                        @else Confirmed
                        @endif
                    </th>
                    <th style="display: flex; justify-content: center">
                        @if($registration->status === 0)
                        <a class="btn btn-success" href="/update/reservation/{{$registration->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                            </svg></a>
                        @else
                            <a class="btn btn-warning" href="/cancel/reservation/{{$registration->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                </svg></a>
                        @endif
                        <a class="btn btn-danger" href="/delete/reservation/{{$registration->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg></a>
                    </th>
                </tr>
                @endif
            @endforeach
        </table>
    @endif
    @endforeach
</div>
@endsection
