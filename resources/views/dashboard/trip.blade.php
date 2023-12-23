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
                <li><a href="#" class="active">addTrips</a></li>
            </ul>
        </div>
    </div>

    {{-- add busses form --}}
    <form action="/api/insertTrip" method="post">
        @csrf
        <input type="text" name="name" placeholder="Bus Name">
        <input type="submit" value="Add">
    </form>

    <div class="showBus">
        <table>
            <tr>
                <th>Trip Name</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            @foreach ($trips as $trip)
            <tr>
                <td>{{ $trip->name }}</td>
                <td>{{ $trip->created_at }}</td>
                <td><a href="/api/deleteTrip/{{ $trip->id }}">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</main>
@endsection
