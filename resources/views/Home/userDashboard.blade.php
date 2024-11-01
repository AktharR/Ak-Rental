@extends('layouts.user_dashboard')

@section('user_main')

<div class="col" style="margin-left: 350px">

    <div class="row">
        <div class="col-md-2">
            <p class="h1" > welcome </p>
        </div>

        <div class="col-md-3">
           <p class="h1 text-danger" style="margin-left:30px ">{{ $user }}</p> 
        </div>
    </div>
  

</div>
@endsection