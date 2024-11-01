
@extends('layouts.home')
@section('main')
    

<div class="container">
    <div class="row">
        <div class="col-md-6 px-5" style="margin-top: 120px;">

            <blockquote class="blockquote">
                <p>All discount  just for you.</p>
            </blockquote>
            <p class="h2 text-danger">Need A Ride ?</p>
            <h1 class="text-dark"> CHOOSE YOUR  <BR>COMFORTABLE VEHICLE</h1>

            <blockquote class="blockquote">
                <p>Best Worldwide Car hire deals!!!!!</p>
            </blockquote>

            <button class="btn btn-danger"> RENT ME !</button>
        </div>

        <div class="col-md-6" style="margin-top: 80px;">
            <img src="{{ asset('Assest/car/CarHome.png') }}" alt="HomeCar" style="width: 750px;">
        </div>
    </div>


<div class="row my-3">

    @foreach ($cars as $car)
    <div class="col-3 mb-5">
        <div class="card h-100" style="width: 18rem;">
            @php
                $images = json_decode($car->images, true);
                $firstImage = $images[0] ?? 'default.png'; // Use a default image if no image is found
            @endphp
            <img src="{{ asset('images/' . $firstImage) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-secondary">{{ $car->car_name }}</h5>
                <h6 class="card-text text-secondary">{{ $car->car_number_plate }}</h6>
                <h6 class="card-text text-secondary">{{ $car->fuel_type }}</h6>
                <p class="card-text text-secondary">{{ $car->car_description }}</p>
            </div>
            <div class="d-flex justify-content-around mb-5">
                <h3>
                    <td><i class="fa-solid fa-rupee-sign"></i> {{ $car->rent_price }}</td>
                </h3>
                @auth
                <a href="{{ route('user.view_booking', $car->id) }}"><button class="btn btn-danger">Rent your car</button></a>
                @endauth
  
                @guest
                <a href="{{ route('user.login') }}"><button class="btn btn-danger">Rent your car</button></a>
                @endguest
            </div>
        </div>
    </div>
  @endforeach
  
  </div>
  



</div>
</div>

@endsection