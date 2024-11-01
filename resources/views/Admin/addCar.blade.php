@extends('layouts.admin')

@section('admin_main')


<div class="col-md-5" style="margin-left:200px">

    <div style="margin-left:170px">
        <p class="h4 text-danger"> ADD YOUR <i class="fa-solid fa-car"></i> </p>
    </div>
    

    @if (Session::has('success'))
    <div class="col-md-10 mt-4">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif


    <form action="{{ route('admin.storeCar') }}" method="POST" enctype="multipart/form-data" class="mt-3 ">
        @csrf
        <div class="form-group p-1">
            <b><label for="car_image" class="control-label"> Car image </label></b>
            <input type="file" name="car_image[]" class="form-control" multiple required>
        </div>

        <div class="form-group p-1">
            <b><label for="car_name" class="control-label"> Car Name </label></b>
            <input type="text" name="car_name" class="form-control" required>
        </div>

        <div class="form-group p-1">
            <b><label for="car_number_plate" class="control-label"> Car Number plate </label></b>
            <input type="text" name="car_number_plate" class="form-control " required>
        </div>

        <div class="form-group p-1">
            <b><label for="rent_price" class="control-label"> Rent price </label></b>
            <input type="text" name="rent_price" class="form-control" required>
        </div>

        <div class="form-group p-1">
            <b><label for="fuel_type" class="control-label"> fuel type </label></b>
            <select class="form-select" aria-label="Default select example" name="fuel_type" required>
                <option selected value="petrol">Petrol</option>
                <option value="diesel">Diesel</option>
                <option value="Hybrit">Hybrit</option>
            </select>
        </div>

        <div class="form-group p-1">
            <b><label for="description" name="description">Car Descripton </label></b>

            <div class="form-floating">
                <textarea class="form-control" placeholder="enter   comment here" id="floatingTextarea2" style="height: 100px"
                    name="description"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
        </div>

        <div class="form-group p-1">
            <button class="btn btn-success mt-3 p-1"style="margin-left:170px">SUBMIT FOR RENT</button>
        </div>
     </form>





</div>
@endsection