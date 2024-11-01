@extends('layouts.admin')

@section('admin_main')


<div class="col-md-5" style="margin-left:200px">

    <div style="margin-left:170px">
        <p class="h4 text-danger"> EDIT YOUR <i class="fa-solid fa-car"></i> </p>
    </div>

    <form action="{{ route('admin.editCar', $cars->id) }}" method="POST" enctype="multipart/form-data" class="mt-3 ">
        @csrf
        <div class="form-group p-1">
            <b><label for="car_image" class="control-label"> Car image </label></b>
            <input type="file" name="car_image" class="form-control">
        </div>

        <div class="form-group p-1">
            <b><label for="car_name" class="control-label"> Car Name </label></b>
            <input type="text" name="car_name" class="form-control" value="{{ $cars->car_name }}" >
        </div>

        <div class="form-group p-1">
            <b><label for="car_number_plate" class="control-label"> Car Number plate </label></b>
            <input type="text" name="car_number_plate" class="form-control" value="{{ $cars->car_number_plate }}">
        </div>

        <div class="form-group p-1">
            <b><label for="rent_price" class="control-label"> Rent price </label></b>
            <input type="text" name="rent_price" class="form-control" value="{{ $cars->rent_price }}">
        </div>

        <div class="form-group p-1">
            <b><label for="fuel_type" class="control-label"> fuel type </label></b>
            <select class="form-select" aria-label="Default select example" name="fuel_type">
                <option selected value="petrol" value="{{ $cars->fuel_type }}">Petrol</option>
                <option value="diesel" value="{{ $cars->fuel_type }}">Diesel</option>
                <option value="Hybrit" value="{{ $cars->fuel_type }}">Hybrit</option>
            </select>
        </div>

        <div class="form-group p-1">
            <b><label for="description" name="description">Car Descripton </label></b>

            <div class="form-floating">
                <textarea class="form-control" placeholder="enter   comment here" id="floatingTextarea2" style="height: 100px"
                    name="description" ></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
        </div>

        <div class="form-group p-1" style="margin-left:230px">
           <button class="btn btn-success mt-3 p-1">Update</button>
        </div>
     </form>





</div>
@endsection