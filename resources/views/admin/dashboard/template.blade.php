<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
   
    <link rel="stylesheet" href="{{ asset('custom_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('custom_assets/css/utils.css') }}">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sale CRM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Registration
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('leadregistration')}}">Lead Registration</a></li>
                            <li><a class="dropdown-item" href="{{route('projectregistration')}}">Project Registration</a></li>
                            <li><a class="dropdown-item" href="{{route('dealRegistration')}}">Deal Registration</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
            
                  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Masters
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('registration')}}">User Master</a></li>
                            <li><a class="dropdown-item" href="{{route('campaign')}}">Campaign Master</a></li>
                            <li><a class="dropdown-item" href="{{route('leadsource')}}">Lead Source List</a></li>
                            <li><a class="dropdown-item" href="{{route('developer')}}">Developer</a></li>
                            <li><a class="dropdown-item" href="{{route('facility')}}">Facility</a></li>
                            <li><a class="dropdown-item" href="{{route('loanFacility')}}">Loan Facility</a></li>
                         
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">

                    <a href="{{route('registration')}}" class="btn btn-outline-success" type="button">Sign Up</a>
                </form>
            </div>
        </div>
    </nav>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('custom_assets/js/script.js') }}"></script>
    <script src="{{ asset('custom_assets/js/fetchData.js') }}"></script>
    <script src="{{ asset('bootstrap/jquery.min.js') }}"></script>
    
   

    <div class="">

        @section('dashboard_section')

        @show

    </div>

    <!-- Optional JavaScript; choose one of the two! -->



</body>

</html>