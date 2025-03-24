<ul class="list-group list-group-flush">
    <li class="list-group-item {{ Route::is('attendee_dashboard') ? 'active-item' : '' }}"><a href="{{ route('attendee_dashboard') }}">Dashboard</a></li>
    <li class="list-group-item"><a href="user-tickets.html">My Tickets</a></li>
    <li class="list-group-item"><a href="user-messages.html">Messages</a></li>
    <li class="list-group-item {{ Route::is('attendee_profile') ? 'active-item' : '' }}"><a href="{{ route('attendee_profile') }}">Profile</a></li>
    <li class="list-group-item"><a href="{{ route('logout') }}">Logout</a></li>
</ul>