@extends('userdashboard.master')

@section('content')
<main>
    <div class="header">
        <div class="left">
            <h1>Dashboard</h1>
            <h1>
            </h1>
            <ul class="breadcrumb">
                <li><a href="#">
                        dashboard
                    </a></li>
                /
                <li><a href="#" class="active">Booking</a></li>
            </ul>
        </div>
    </div>

    {{-- add busses form --}}
    <form action="/api/storeBooking" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
        <input type="submit" value="Add">
    </form>

    <div class="showBus">
        <table>
            <tr>
                <th>Trip Name</th>
                <th>Bus Name</th>
                <th>Buying Time</th>
                <th>Date & Time</th>
                <th>Action</th>
            </tr>

            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->schedule->trip->name }}</td>
                    <td>{{ $booking->schedule->bus->name }}</td>
                    <td>{{ $booking->created_at }}</td>
                    <td>{{ $booking->schedule->departure_time }}</td>
                    <td><a href="/api/deleteBus/">Delete</a></td>
                </tr>
            @endforeach


        </table>
    </div>
</main>
@endsection
