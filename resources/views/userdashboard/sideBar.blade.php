  <!-- Sidebar -->
  <div class="sidebar">
    <a href="{{ route('home') }}" class="logo">
        <i class='bx bx-code-alt'></i>
        <div class="logo-name"><span>Devs</span>Inzams</div>
    </a>
    <ul class="side-menu">
        <li class="active"><a href="{{ route('dashboard') }}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
        <li><a href="{{ route('buses') }}"><i class='bx bx-store-alt'></i>All Buses</a></li>
        <li><a href="{{ route('trips') }}"><i class='bx bx-analyse'></i>All Trip</a></li>
        <li><a href="{{ route('schedules') }}"><i class='bx bx-message-square-dots'></i>All Schedule</a></li>
        <li><a href="{{ route('usersbookings') }}"><i class='bx bx-group'></i>Booking</a></li>
        <li><a href="#"><i class='bx bx-group'></i>Users</a></li>
        <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
    </ul>
    <ul class="side-menu">
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a :href="route('logout')" class="logout"
                    onclick="event.preventDefault();
                        this.closest('form').submit();">
                    <i class='bx bx-log-out-circle'></i>

                    {{ __('Log Out') }}
                </a>
            </form>
        </li>
    </ul>
</div>
<!-- End of Sidebar -->
