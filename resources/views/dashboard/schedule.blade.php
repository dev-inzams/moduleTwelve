@extends('dashboard.layouts.main')

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
                <li><a href="#" class="active">Schedule</a></li>
            </ul>
        </div>
    </div>

    {{-- add busses form --}}
    <form action="/api/schedule" method="post">
        @csrf
        <label for="bus_id">Select Bus</label>
        <select name="bus_id" id="bus_id">
            @foreach ($buses as $bus)
            <option value="{{ $bus->id }}">{{ $bus->name }}</option>
            @endforeach
        </select>
        <label for="trip_id">Select Trip</label>
        <select name="trip_id" id="trip_id">
            @foreach ($trips as $trip)
            <option value="{{ $trip->id }}">{{ $trip->name }}</option>
            @endforeach
        </select>
        <label for="departure_time">Departure Time</label>
        <input type="datetime-local" name="departure_time" id="departure_time">

        <label for="fare">Fare</label>
        <input type="number" name="fare" id="fare" placeholder="Fare">
        <input type="submit" value="Add">
    </form>

    <div class="showBus">
        <table>
            <tr>
                <th>Bus Name</th>
                <th>Trip Name</th>
                <th>Departure Time</th>
                <th>Fare</th>
                <th>Action</th>
            </tr>
            @foreach ($schedules as $schedule)
            <tr>
                <td>{{ $schedule->bus->name }}</td>
                <td>{{ $schedule->trip->name }}</td>
                <td>{{ $schedule->departure_time }}</td>
                <td>{{ $schedule->fare }}</td>
                <td><a href="/api/deleteSchedule/{{ $schedule->id }}">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</main>
@endsection
