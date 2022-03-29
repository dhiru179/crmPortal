<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">

    <title>login</title>
    <style>

    </style>
</head>

<body>

    <div class="container-fluid mt-5 d-flex justify-content-center justify-items-center">
        <div class="col-3 card p-3 bg-dark" id="login" style="min-width: 23rem">
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <h3 class="text-center text-danger "><strong>CRM</strong></h3>
            </div>

            @if (session()->has('msg'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div id='flashMsg'></div>
           
            <form onsubmit="return login(event)" id="loginFormdata" class="rounded p-3">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"
                            aria-hidden="true"></i></span>
                    <input type="tel" class="form-control" name="phone" pattern="[789][0-9]{9}" placeholder="Phone"
                        aria-label="Phone" aria-describedby="basic-addon1" required>

                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock"
                            aria-hidden="true"></i></span>
                    <input type="password" class="form-control" style="border-right: 0px" name="password"
                        placeholder="Password" aria-label="Password" aria-describedby="basic-addon2" required>
                    <span class="input-group-text fa fa-eye " onclick="viewPassword(event)"
                        style="background-color: #e7f7fa;"></span>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success" onclick="login(event)" value="">
                        <span class="mx-2">Login</span></span>
                    </button>
            </form>
        </div>
        <div class="shadow p-3 rounded bg-light mb-3" id="forgot">
            <i class="fa fa-arrow-left text-danger mx-1" aria-hidden="true"></i>
            <span class="text-center text-danger">I forgot my password</span>
        </div>
    </div>

    </div>

    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/jquery.min.js') }}"></script>
    <script>
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

        function login(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('loginAuth') }}",
                headers: {

                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                data: $('#loginFormdata').serialize(), // serializes the form's elements.
                success: function(data) {
            // console.log(data);
                    if (data.status) {
                        let html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${data.msg}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                        $('#flashMsg').html(html);

                    }
                    if(data.auth)
                    {
                      window.location.href = "{{route('dashboard')}}";
                    }
                    return true;
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        }
    </script>
</body>

</html>
