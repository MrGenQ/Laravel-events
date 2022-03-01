<?php
use Illuminate\Support\Facades\Auth;
?>
<h1>Hi, {{ $name }}</h1>
<p>Registration to your selected event was denied</p>
<p>Our apologies</p>
<p>by organizer {{Auth::user()->name}}</p>
<p>if you have any questions please contact us: {{Auth::user()->email}}</p>
