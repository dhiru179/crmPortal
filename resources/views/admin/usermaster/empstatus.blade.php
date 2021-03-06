@extends('admin.dashboard.template')
@section('title', 'Employee Status')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div>
<nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Employee Status</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;"></div>
    </nav>
<div class="container utils_center">
    <div class="mt-3 card" style="width:33rem;">
        <div class="card-body py-0">
            <h5 class="card-title text-center py-3">Employee Status</h5>

            <form id="registrationFormdata" onsubmit="return registration()">
                @csrf
                <div class="form-group mb-3 ">
                    <label for="">Active</label>
                    <input type="text" class="form-control" name="active" placeholder="" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="active"></span>
                </div>


                <div class="form-group mb-3">
                    <label for="">Absent</label>
                    <input type="text" class="form-control" name="absent" placeholder="" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="absent"></span>
                </div>


                <div class="form-group mb-3">
                    <label for="">Terminated</label>
                    <input type="text" class="form-control" name="terminated" placeholder="" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="terminated"></span>
                </div>
                
                <div class="form-group mb-3">
                    <label for="">Inactive</label>
                    <input type="text" class="form-control" name="inactive" placeholder="" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="inactive"></span>
                </div>      

                <div class="utils_center py-3">
                    <button type="button" onclick="history.back()" class="btn btn-danger mx-2">Cancel</button>
                    <button type="button" class="btn btn-info mx-2" onclick="registration(event)">Register</button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
<script>
    function registration(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "",
            headers: {

                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            data: $('#registrationFormdata').serialize(), // serializes the form's elements.
            success: function(data) {
                console.log(data)
                // if (data.status == 'error') {
                //     for (const [key, value] of Object.entries(data.msg)) {
                //         $('#' + key).html('');
                //         $('#' + key).html(value);
                //     }
                // }
                // if (data.status == true) {
                //     let html = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                //         ${data.msg}
                //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //             </div>`;
                //     $('#flashMsg').html(html);
                // }

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