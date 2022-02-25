<?php
use App\Models\User
?>
<nav class="navbar navbar-expand-lg navbar-light bg-black border-bottom">
    <div class="container-fluid" style="background-color: #000000; height: 60px">
        <div class="container" style="color: #ffffff; display: flex; flex-direction: row; justify-content: space-between">
            <div><h2>Event portal</h2></div>
            <div style="display: flex; flex-direction: row; gap: 10px;">
                <a href="/" style="text-decoration: none; color: #ffffff"><h3>Home</h3></a>
                <a href="/about" style="text-decoration: none; color: #ffffff"><h3>About</h3></a>
                <a href="/contacts" style="text-decoration: none; color: #ffffff"><h3>Contacts</h3></a>
                @if(Auth::check())
                    <a href="/events-dashboard" style="text-decoration: none; color: #ffffff"><h3>Events</h3></a>
                @endif
                <div>
                    @if(Auth::check())
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" style="background-color: #000000; color: #ffffff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: #000000">
                                <li><a class="dropdown-item" style="color: #ffffff; background-color: #000000" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    @else
                        <a class="dropdown-item" href="/login" style="text-decoration: none; color: #ffffff; background-color: #000000">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>

