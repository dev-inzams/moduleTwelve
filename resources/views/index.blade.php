<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css', 'resources/js/app.js')
    <title>Bus Ticket</title>
</head>
<body class="bg-gray-200">

    <!-- Navigation Bar -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="text-white font-bold text-lg">Developer <span class="text-red-300">Inzam'S</span></div>

            <!-- Menu for larger screens -->
            <div class="hidden md:flex space-x-4">
                <a href="{{route('home')}}" class="text-white py-2">Home</a>
                <a href="#" class="text-white py-2">About</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('booking') }}" class="text-white py-2 block">Booking</a>
                        <a href="{{ url('/dashboard') }}" class="text-black bg-blue-100 px-3 py-2 rounded">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-black bg-blue-100 px-3 py-2 rounded">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-black bg-blue-100 px-3 py-2 rounded">Register</a>
                    @endif
                    @endauth
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden bg-blue-500 p-4 hidden">
        <a href="#" class="text-white py-2 block">Home</a>
        <a href="#" class="text-white py-2 block">About</a>
        @if (Route::has('login'))
            @auth
                <a href="{{ route('booking') }}" class="text-white py-2 block">Booking</a>
                <a href="{{ url('/dashboard') }}" class="block text-black bg-blue-100 px-3 py-2 rounded">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block text-black bg-blue-100 px-3 py-2 rounded">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="block text-black bg-blue-100 px-3 py-2 rounded">Register</a>
            @endif
            @endauth
        @endif
    </div>

<section id="hero" style="background-image: url({{asset('home/bus.png')}});">
    <div class="container mx-auto">
        {{-- two flexbox --}}
        <div class="flex justify-between items-center h-screen">
            <div class="w-1/2">

            </div>

            <div class="w-1/2">
                <h1 class="text-5xl font-bold text-blue-800">Welcome to Bus Ticket</h1>
                <p class="text-lg mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod
                    bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra.</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Get Started</button>
                {{-- buying bus ticket form --}}
                <form action="/api/storeBooking" method="post" class="mt-4">
                    @csrf
                    @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth

                    <select name="schedule_id" id="">
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}">Bus Name:{{ $schedule->bus->name }} Trip Name:{{ $schedule->trip->name }}</option>
                        @endforeach
                    </select>
                    <select name="seat_number" id="">
                        @foreach ($seats as $seat)
                            @if ($seat->booking_status == 1)
                                <option value="{{ $seat->total_seats }}" disabled>{{ $seat->total_seats }} <span>Unvailable</span></option>
                            @else
                            <option value="{{ $seat->total_seats }}">{{ $seat->total_seats }} <span>Available</span> </option>
                            @endif
                        @endforeach
                    </select>
                    <select name="amount_paid" id="">
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->fare }}">{{ $schedule->fare }}</option>
                        @endforeach
                    </select>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4" type="submit">Booking</button>
                </form>
            </div>
    </div>
</section>









    <script>
        // JavaScript to toggle the mobile menu visibility
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>
</html>
