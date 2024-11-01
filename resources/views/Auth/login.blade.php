
@extends('layouts.home')
@section('main')


<div class="container mt-5" style="margin: auto;">

    <div class="row d-flex justify-content-center">


        <div class="col-6 p-5 bg-light rounded mb-5" style="margin-top: 30px">

            <p class="h3 text-secondary-emphasis mx-4"> Login <i class="fa-solid fa-right-to-bracket"></i> </p>


            <form action="#" method="POST" class="p-3">

                @csrf
                <div class="form-group p-2">
                    <label for="email">E-mail :</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>

            

                <div class="form-group p-2">
                    <label for="user_password"> Password :</label>
                    <input type="password" name="password" class="form-control" required>

                </div>

                @error('password')
                <div class="text-danger mx-2">{{ $message }}</div>
                @enderror
               
             
                <div class="mx-2">Not registered?<a href="{{ route('user.register') }}" class="text-decoration-none mx-2">Create an account</a> </div>
                <div class="form-group my-3 p-2">
                    <button class="btn btn-success mt-2"> Login </button>
                </div>

            </form>
        </div>
    </div>


</div>

@endsection
