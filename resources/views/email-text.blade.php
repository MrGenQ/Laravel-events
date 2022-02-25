@extends('main')
@section('content')
    <div class="container">
        <div style="font-size: 30px; color: #1a8c14">{{Auth::user()->name . ' email sent to ' . Auth::user()->email . ' email address'}}</div>
        <a href="javascript:history.back()" class="btn btn-success">Go Back</a>
    </div>
@endsection
