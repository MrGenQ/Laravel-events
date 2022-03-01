<?php
use Illuminate\Support\Facades\Auth;
?>
<h1>Hi, {{ $name }}</h1>
<p>Registration to your selected event was confirmed</p>
<p>by organizer {{Auth::user()->name}}</p>
