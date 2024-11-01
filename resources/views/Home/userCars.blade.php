@extends('layouts.user_dashboard')

@section('user_main')

<div class="col" style="margin-left: 150px">

    <div class="row">




        <div class="col-md-12 p-3 text-center mb-5" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
            <figure class="text-center">
                <blockquote class="blockquote">
                  <p>Your Vehicle Reservations</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                  Ride with your <cite title="Source Title">family in happly  </cite>
                </figcaption>
              </figure>
        </div>  


        {{-- <div class="col-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('Assest/car/rang_rover.jpg') }}" class="img-fluid rounded-start" alt="..." style="object-fit: cover; height: 100%;" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p>car Number plate </p>
                            <p>car Discription sadfafhsjf ssdjfsdfdjsadj asufhfgyweo wewf ldjfs sfhsfs sdfasehkdsfhb asdfhskdjf sefhJSA ASDFSLADFHS </p>
                            <p>car Discription</p>
                        </div>
                    </div>
                </div>
            </div>     
        </div> --}}
        
           @foreach ($bookings as $booking)
    <div class="col-4 mb-5">
        <div class="card h-100" style="width: 18rem;">
            @php
                // Decode images from the car related to the booking
                $images = json_decode($booking->car->images, true);
                $firstImage = $images[0] ?? 'default.png'; // Use a default image if no image is found
            @endphp
            <!-- Display the first image -->
            <img src="{{ asset('images/' . $firstImage) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-secondary">{{ $booking->car->car_name }}</h5>
                <h6 class="card-text text-secondary">{{ $booking->car->car_number_plate }}</h6>
                <h6 class="card-text text-secondary">{{ $booking->car->fuel_type }}</h6>
                <p class="card-text text-secondary">{{ $booking->car->car_description }}</p>
                <p class="card-text text-secondary">Booking Date: {{ $booking->booking_date }}</p>
            </div>
            <div class="d-flex justify-content-around mb-5">
                <h3>
                    <i class="fa-solid fa-rupee-sign"></i> {{ $booking->car->rent_price }}
                </h3>
            </div>
        </div>
    </div>
@endforeach



            {{-- <div class="col-4 mb-5">
                <div class="card h-100" style="width: 18rem;">
                    <img src="{{ asset('Assest/car/rang_rover.jpg') }}" class="card-img-top" alt="..." >
                    <div class="card-body">
                        <h5 class="card-title text-secondary">car->car_name</h5>
                        <h6 class="card-text text-secondary">car->car_number_plate</h6>
                        <h6 class="card-text text-secondary">car->fuel_type</h6>
                        <p class="card-text text-secondary">car->car_description</p>
                    </div>
                    <div class="d-flex justify-content-around mb-5">
                        <h3>
                            <td><i class="fa-solid fa-rupee-sign"></i> car->rent_price</td>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-4 mb-5 ">
                <div class="card h-100" style="width: 18rem;">
                    <img src="{{ asset('Assest/car/rang_rover.jpg') }}" class="card-img-top" alt="..." >
                    <div class="card-body">
                        <h5 class="card-title text-secondary">car_name</h5>
                        <h6 class="card-text text-secondary">car_number_plate</h6>
                        <h6 class="card-text text-secondary">fuel_type</h6>
                        <p class="card-text text-secondary">car_description</p>
                    </div>
                    <div class="d-flex justify-content-around mb-5">
                        <h3>
                            <td><i class="fa-solid fa-rupee-sign"></i> rent_price</td>
                        </h3>
                    </div>
                </div>
            </div> --}}


        



        






        
         

 

</div>
</div>
@endsection