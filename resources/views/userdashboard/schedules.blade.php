@extends('userdashboard.master')
    @section('content')
    <main>
        <div class="header">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Analytics
                        </a></li>
                    /
                    <li><a href="#" class="active">Schedules</a></li>
                </ul>
            </div>
        </div>

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


    </main>

    @endsection
