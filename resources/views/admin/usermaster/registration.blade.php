@extends('admin.dashboard.template')
@section('title', 'signup')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div class="d-flex justify-content-end p-2">
    <a href="" class="btn btn-success mx-2">Desigination</a>
    <a href="" class="btn btn-info mx-2">Employe Status</a>
    
</div>
<div class="container utils_center">
    <div class="card mt-3" style="width:33rem;">
        <div class="card-body">
            <h5 class="card-title text-center pb-3">User Registration</h5>

            <form id="registrationFormdata" onsubmit="return registration()">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="firstName" placeholder="First Name" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="user"></span>
                </div>


                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="lastName"></span>
                </div>


                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="empid" placeholder="Employe Id" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="empid"></span>
                </div>

                <div class="form-group mb-3">
                    <select class="form-select" name="userType" id="">
                        <option value="">Select UserType</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <span class="text-danger" id="userType"></span>
                </div>


                <div class="form-group mb-3">
                    <select class="form-select" name="desigination" id="">
                        <option value="">Select Desigination</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <span class="text-danger" id="desigination"></span>
                </div>


                <div class="form-group mb-3">

                    <input type="email" class="form-control" name="email" placeholder="email" required>

                    <span class="text-danger" id="email"></span>
                </div>


                <div class="form-group mb-3">

                    <input type="tel" class="form-control" name="phone" pattern="[789][0-9]{9}" placeholder="Phone" aria-label="Phone" aria-describedby="basic-addon1" required>

                    <span class="text-danger" id="phone"></span>
                </div>


                <div class="form-group mb-3">
                    <select class="form-select" name="userType" id="">
                        <option value="">Team Leader</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <span class="text-danger" id="userType"></span>
                </div>


                <div class="form-group mb-3">
                    <select class="form-select" name="desigination" id="">
                        <option value="">Employee Staus</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <span class="text-danger" id="desigination"></span>
                </div>

                <div class="utils_center p-3">
                    <button type="button" class="btn btn-danger mx-2">Cancel</button>
                    <button type="button" class="btn btn-info mx-2" onclick="registration(event)">Register</button>
                </div>

            </form>
        </div>
    </div>
</div>

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
@endsection