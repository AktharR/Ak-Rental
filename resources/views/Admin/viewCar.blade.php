@extends('layouts.admin')

@section('admin_main')

<div class="col-md-9 mt-4 mx-5">

    
    @if (Session::has('success'))
    <div class="col-md-10 mt-4">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif


    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">IMAGE</th>
                <th scope="col">CAR NAME</th>
                <th scope="col">NUMBER PLATE</th>
                <th scope="col">RENT PRICE</th>
                <th scope="col">FUEL TYPE</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col"> <h3><i class="fa-solid fa-pen-to-square"></i></h3></th>
                <th scope="col"><h3><i class="fa-solid fa-trash"></i></h3></th>
            </tr>
        </thead>
        <tbody>

            @foreach($cars as $car)
            <tr>
             
                @php
                $images = json_decode($car->images, true);
                $firstImage = $images[0] ?? 'default.png'; // Use a default image if no image is found
            @endphp
           
                    <th scope="row">{{ $car->id }}</th>
                   <td><img src="{{ asset('images/' . $firstImage) }}" class="card-img-top" alt="..." style="width: 120px;"></td>
                    </td>
                    <td>{{ $car->car_name }}</td>
                    <td>{{ $car->car_number_plate }}</td>
                    <td>{{ $car->rent_price }}</td>
                    <td>{{ $car->fuel_type }}</td>
                    <td>{{ $car->car_description }}</td>
                    

                    @if(Auth::user()->id == $car->user->id)
                    <td><a href="{{ route('admin.editCar',$car->id) }}"><button class="btn btn-outline-secondary"><i class="fa-solid fa-pencil"></i></button></a>  </td>
                       
                    <td><a href=" {{route('admin.delete', $car->id)  }}">
                        <button type="submit" class="btn  btn-outline-danger"
                        onclick="return confirm('Are you sure you want to delete this product?');"><i 
                        class="fa-regular fa-trash-can"></i></button></a></td> 

                        @else
                        <td><button type="submit" class="btn  btn-outline-danger">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            </button></td>

                            <td><button type="submit" class="btn  btn-outline-danger">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                </button></td>
                       
                     
                       
                        @endif

                    
                            
                        
                            
                      
                    
            </tr>
            @endforeach
        

        </tbody>
    </table>


</div>

@endsection



