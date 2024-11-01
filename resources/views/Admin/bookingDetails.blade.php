@extends('layouts.admin')

@section('admin_main')

<div class="col-md-8 mt-4 mx-5">

    <table class="table ">
        <thead>
            <tr  class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">PHONE</th> 
                <th scope="col">NIC</th>
                <th scope="col">BOOKING DATE </th>
                <th scope="col">CAR ID</th>
                {{-- <th scope="col">ACTION</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <th scope="row">{{$booking->id }}</th>
                <td>{{$booking->name }}</td>
                <td>{{$booking->E_mail }}</td>
                <td>{{$booking->phone }}</td>
                <th>{{$booking->NIC }}</th>
                <th>{{$booking->booking_date }}</th>
                <td>{{$booking->car_id  }}</td>
                {{-- <td><button class="btn btn-success">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection