@extends('layouts.home')
@section('main')

<div class="container mt-5">

    <div class="row">


        <div class="col-5  bg-white rounded">

            @if (Session::has('success'))
    <div class="col-md-10 mt-4">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif

            <p class="h3 text-secondary-emphasis "> Book Your <i class="fa-solid fa-car"></i> </p>

          
            <form id="carBookingForm">
                @csrf
                <div class="form-group">
                    <label for="car_name">Car name:</label>
                    <input type="text" name="car_name" class="form-control" value="{{ $cars->car_name }}">
                </div>
                <div class="form-group">
                    <label for="number_plate">Number Plate:</label>
                    <input type="text" name="number_plate" class="form-control" value="{{ $cars->car_number_plate }}">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" class="form-control" value="{{ $cars->rent_price }}">
                </div>
                <div class="form-group">
                    <label for="cus_name">Customer Name:</label>
                    <input type="text" name="cus_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="mail">E-Mail:</label>
                    <input type="email" name="mail" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="number" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nic">NIC:</label>
                    <input type="number" name="nic" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date">Booking Date:</label>
                    <input type="date" name="date" class="form-control" required>
                </div>
                
                @auth
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-success mt-2">Book Your car</button>
                </div>
                @endauth
            
                @guest
                <a href="{{ route('/Auth/login') }}"><button class="btn btn-success mt-2">Book Your car</button></a> 
                @endguest
            </form>

            
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#carBookingForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: "{{ route('user.store', $cars->id) }}", // Your route
                type: 'POST',
                data: $(this).serialize(), // Serialize form data
                success: function(response) {
                    // Handle success
                    alert(response.message); // Show success message
                    $('#carBookingForm')[0].reset(); // Reset the form
                },
                error: function(xhr) {
                    // Handle error
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        // Display validation errors
                        $.each(errors, function(key, value) {
                            alert(value[0]); // Show first error message
                        });
                    } else {
                        alert('Something went wrong. Please try again.');
                    }
                }
            });
        });
    });
</script>


            
        </div>
        
    
        <div class="col-md-6 mx-5 my-5">
            <style>
                /* Custom styles for the carousel control icons */
                .carousel-control-prev-icon,
                .carousel-control-next-icon {
                    background-color: black;
                }
            </style>
        
            @php
                // Decode the images from the car object
                $images = json_decode($cars->images, true);
            @endphp
        
            @if($images && is_array($images))
                <div id="carImageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('images/' . $image) }}" class="d-block w-75 rounded mx-auto" alt="Car Image">
                            </div>
                        @endforeach
                    </div>
        
                    <!-- Carousel controls with custom black arrow color -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carImageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carImageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <p>No images available for this car.</p>
            @endif
        </div>
        
            

        

    </div>


</div>


@endsection