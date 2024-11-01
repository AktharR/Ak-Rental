

@extends('layouts.home')
@section('main')

<div class="container">

    <div class="row d-flex justify-content-center">


        <div class="col-6 p-5 bg-light rounded mb-5" style="margin-top: 50px" >

            <p class="h3 text-secondary-emphasis "> Register First <i class="fa-brands fa-wpforms"></i> </p>


            <form action="{{ route('user.Registerstore') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="user_name "> Name </label>
                    <input type="text" name="user_name" class="form-control" required>

                </div>

                <div class="form-group">
                    <label for="e-mail"> E-mail </label>
                    <input type="mail" name="user_mail" class="form-control" required>

                </div>

                <div  class="form-group">

                <label for="e-mail"> Role </label>
                <select name="role" class="form-select" aria-label="Default select example" >
                    <option value="Admin">Admin</option>
                    <option selected value="Customer">Customer</option>
                   
                  </select>
                </div>

                <div class="form-group">
                    <label for="password"> Password </label>
                    <input type="password" name="password" class="form-control" required>


                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password </label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>


                <div class="form-group my-3">
                    <button class="btn btn-success mt-2"> Register </button>
                </div>

            </form>
        </div>
    </div>


</div>


</div>
@endsection

