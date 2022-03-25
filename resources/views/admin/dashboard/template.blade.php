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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
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
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#create_users">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Modal Create User -->
    <div class="modal fade" id="create_users" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="flashMsg">

                    </div>
                    <form id="registrationFormdata" onsubmit="return registration()">
                        <div class="shadow-lg mb-3 bg-body rounded bg-dark p-3">
                            <div>
                                <!-- <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="user" placeholder="User Name" aria-label="" aria-describedby="basic-addon2" required>
                                </div>
                                <span class="text-danger" id="user"></span>
                            </div>

                            <div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <input type="tel" class="form-control" name="phone" pattern="[789][0-9]{9}" placeholder="Phone" aria-label="Phone" aria-describedby="basic-addon1" required>

                                </div>
                                <span class="text-danger" id="phone"></span>
                            </div>
                            <div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" style="border-right: 0px" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
                                    <span class="input-group-text fa fa-eye " onclick="viewPassword(event)" style="background-color: white;"></span>
                                </div>
                                <span class="text-danger" id="password"></span>
                            </div>
                            <div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" style="border-right: 0px" name="password_confirmation" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon2" required>
                                    <span class="input-group-text fa fa-eye " onclick="viewPassword(event)" style="background-color: white;"></span>
                                </div>
                                <span class="text-danger" id="password_confirmation"></span> -->
                                <x-input type="text" label="sda"/>
                                <x-input type="text" label="sda"/>
                                <x-input type="email" label="sda"/>
                                <x-input type="" label="sda"/>
                                <x-input type="" label="sda"/>
                                
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info" onclick="registration(event)">Create User</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end Modal --}}


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('custom_assets/js/script.js') }}"></script>
    <script src="{{ asset('custom_assets/js/fetchData.js') }}"></script>
    <script src="{{ asset('bootstrap/jquery.min.js') }}"></script>

    <script>
        function registration(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('registration') }}",
                headers: {

                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                data: $('#registrationFormdata').serialize(), // serializes the form's elements.
                success: function(data) {
                    console.log(data)
                    if (data.status == 'error') {
                        for (const [key, value] of Object.entries(data.msg)) {
                            $('#' + key).html('');
                            $('#' + key).html(value);
                        }
                    }
                    if (data.status == true) {
                        let html = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${data.msg}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                        $('#flashMsg').html(html);
                    }

                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        }


        function viewPassword(e) {
            console.log(e.target.previousElementSibling.getAttribute('type'))
            var input = e.target.previousElementSibling;
            var currentInputAttribute = input.getAttribute('type');
            if (currentInputAttribute == 'password') {

                e.target.classList.remove('fa-eye');
                e.target.classList.add('fa-eye-slash');
                input.setAttribute("type", "text");
            } else {
                e.target.classList.remove('fa-eye-slash');
                e.target.classList.add('fa-eye');
                input.setAttribute("type", "password");
            }
        }
    </script>






    <div class="">

        @section('dashboard_section')

        @show

    </div>

    <!-- Optional JavaScript; choose one of the two! -->



</body>

</html>