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
                <li><a href="#" class="active">Seat Plan</a></li>
            </ul>
        </div>
    </div>

    {{-- add busses form --}}
    <form action="/api/insertSeat" method="post">
        @csrf
        <select name="bus_id">
            @foreach ($buses as $bus)
                <option value="{{ $bus->id }}">{{ $bus->name }}</option>
            @endforeach
        </select>
        <input type="number" name="total_seats" placeholder="Seat Number">
        <input type="submit" value="Add">
    </form>

    <div class="showBus">
        <table>
            <tr>
                <th>Bus Name</th>
                <th>Seat Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach ($seats as $seat)
            <tr>
                <td>{{ $seat->bus->name }}</td>
                <td>{{ $seat->total_seats }}</td>
                <td>
                    @if ($seat->booking_status == 1)
                        Unavailable
                    @else
                    Available
                    @endif
                </td>
                <td><a href="/api/deleteBus/">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</main>
@endsection
