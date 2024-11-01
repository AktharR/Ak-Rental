<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ak-rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="{{ asset('Assest/css/style.css') }}">
 </head>

<body>

<header class="bg-dark text-white p-2 sticky-top">
    <div class="row">
        <div class="col-6 px-4 mt-2">
        <a href="{{ route('home') }}" class="text-white text-decoration-none "><h3>AK-RENTAL <i class="fa-solid fa-car-side"></i></h3></a>
        </div>

        {{-- <div class="col">
        <div class="form-group">
            <input type="search" class="form-control" id="search" placeholder="Search">
        </div>
        </div> --}}

        <div class="col pt-2 d-flex justify-content-end ">
        <ul class="list-inline list-inline-item pe-5">
            <li class="list-inline-item"><a class="text-white text-decoration-none" href="{{ route('home') }}" >Home</a></li>
            <li class="list-inline-item"><a class="text-white text-decoration-none" href="#"> Contact</a></li>

            @guest
            <li class="list-inline-item"><a class="text-white text-decoration-none" href="{{ route('user.login') }}">Login</a></li>  
            @endguest

            @auth
            <li class="list-inline-item">
                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="text-white text-decoration-none" href="{{ route('user.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
        @endauth

        @auth
            <li class="list-inline-item"><a class="text-white text-decoration-none" href="{{ route('user.dashboaard') }}">Dashboard</a></li>
         @endauth
         
         @guest
         <li class="list-inline-item"><a class="text-white text-decoration-none" href="{{ route('user.login') }}">Dashboard</a></li>
         @endguest
        </ul>
        </div>
    </div>
</header>


@yield('main')


<footer class="p-2 bg-dark text-white mt-3">
    <div class="row">
        <div class="col">
            <p>Copyright 2024 - Designed by ROSHAN.F  </p>
        </div>

        <div class="col" style="margin-right: 580px">
          <a class="text-decoration-none text-white"  href="#"><i class="fa-brands fa-square-facebook"></i></a> 
          <a class="text-decoration-none text-white" href=""><i class="fa-brands fa-instagram"></i></a> 
          <a class="text-decoration-none text-white" href=""> <i class="fa-brands fa-x-twitter"></i></a> 
          <a class="text-decoration-none text-white" href=""> <i class="fa-brands fa-linkedin"></i></a> 
        </div>

        <div class="col d-flex justify-content-end">
            <ul class="list-inline">
                <li class="list-inline-item"> <a href="#" class="text-white text-decoration-none">Rental Policy</a> </li>
                <li class="list-inline-item"> <a href="#" class="text-white text-decoration-none"> Insurance Policy </a></li>
                <li class="list-inline-item"> <a href="#" class="text-white text-decoration-none"> FAQ </a></li>
             </ul>
  
        </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  </html> 