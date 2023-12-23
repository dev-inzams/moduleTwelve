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
                    <li><a href="#" class="active">Buses</a></li>
                </ul>
            </div>
        </div>

        <table>
            <tr>
                <th>Bus Name</th>
                <th>Action</th>
            </tr>
            @foreach ($buses as $buse)
            <tr>
                <td>{{ $buse->name }}</td>
                <td><a href="{{route('booking')}}">Booking</a></td>
            </tr>
            @endforeach
        </table>


    </main>

    @endsection
