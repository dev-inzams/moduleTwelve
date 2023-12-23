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
                <li><a href="#" class="active">addbus</a></li>
            </ul>
        </div>
    </div>

    {{-- add busses form --}}
    <form action="/api/insertBus" method="post">
        @csrf
        <input type="text" name="name" placeholder="Bus Name">
        <input type="text" name="registration_number" placeholder="Registration Number">
        <input type="submit" value="Add">
    </form>

    <div class="showBus">
        <table>
            <tr>
                <th>Bus Name</th>
                <th>Registration Number</th>
                <th>Action</th>
            </tr>
            @foreach ($buses as $bus)
            <tr>
                <td>{{ $bus->name }}</td>
                <td>{{ $bus->registration_number }}</td>
                <td><a href="/api/deleteBus/{{ $bus->id }}">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</main>
@endsection
