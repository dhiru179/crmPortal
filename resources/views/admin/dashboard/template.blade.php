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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom " style="z-index: 55;top:0px;position:sticky">
        <div class="container-fluid">
            <a href="{{route('dashboard')}}" class="me-3" style="text-decoration: none;">
                <div class="shadow-lg p-1 bg-light rounded utils_center" style="width: 167px;">
                    <span class="text-center text-danger" style="font-size:21px;font-weight:900;font-style:oblique">Logo</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a href="{{route('dashboard')}}" class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('leadDashboard')}}" class="nav-link active ">Lead Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Registration
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('leadregistration')}}">Lead Registration</a></li>
                            <li><a class="dropdown-item" href="{{route('projectregistration')}}">Project Registration</a></li>
                            <li><a class="dropdown-item" href="{{route('dealRegistration')}}">Deal Registration</a></li>

                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Masters
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('registration')}}">User Master</a></li>
                            <li><a class="dropdown-item" href="{{route('campaign')}}">Campaign Master</a></li>
                            <li><a class="dropdown-item" href="{{route('leadsource')}}">Lead Source List</a></li>
                            <li><a class="dropdown-item" href="{{route('developer')}}">Developer</a></li>
                            <li><a class="dropdown-item" href="{{route('facility')}}">Facility</a></li>
                            <li><a class="dropdown-item" href="{{route('loanFacility')}}">Loan Facility</a></li>
                            <li><a class="dropdown-item" href="{{route('desigination')}}">Desigination</a></li>
                            <li><a class="dropdown-item" href="{{route('get_location')}}">Location</a></li>
                            <li><a class="dropdown-item" href="{{route('empStatus')}}">Employee Status</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Performance Report
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('lead_wise')}}">Lead-Wise Report</a></li>
                            <li><a class="dropdown-item" href="{{route('advisor_wise')}}">Advisor-wise Report</a></li>
                            <li><a class="dropdown-item" href="{{route('team_lead_wise')}}">Team Leader-Wise Report</a></li>
                            <li><a class="dropdown-item" href="{{route('overall_lead_wise')}}">Overall lead Report</a></li>
                            <li><a class="dropdown-item" href="{{route('project_wise')}}">Project-Wise Report</a></li>
                            <li><a class="dropdown-item" href="{{route('campaign_wise')}}">Campaign-Wise Report</a></li>
                            <li><a class="dropdown-item" href="{{route('source_wise')}}">Source-Wise Report</a></li>
                            <li><a class="dropdown-item" href="{{route('date_wise')}}">Report Date Type</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">

                    <a href="{{route('logout')}}" class="btn btn-outline-light" type="button">Logout</a>
                </form>
            </div>
        </div>
    </nav>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('custom_assets/js/fetchData.js') }}"></script>
    <script src="{{ asset('bootstrap/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script language=javascript src='http://maps.google.com/maps/api/js?sensor=false'></script>



    <div class="">

        @section('dashboard_section')

        @show

    </div>

    <!-- Optional JavaScript; choose one of the two! -->



</body>

</html>