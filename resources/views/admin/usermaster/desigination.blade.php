@extends('admin.dashboard.template')
@section('title', 'Desigination')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<div class="container utils_center">
    <div class="card mt-3" style="width:33rem;">
        <div class="card-body py-0">
            <h5 class="card-title text-center py-3">Desigination</h5>

            <form id="registrationFormdata" onsubmit="return registration()">
                @csrf
                <div class="form-group mb-3 ">
                    <label for="">Desigination Code</label>
                    <input type="text" class="form-control" name="desigination_code" placeholder="" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="desigination_code"></span>
                </div>


                <div class="form-group mb-3">
                    <label for="">Disigination</label>
                    <input type="text" class="form-control" name="desigination" placeholder="" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="desigination"></span>
                </div>


                <div class="form-group mb-3">
                    <label for="">Department</label>
                    <input type="text" class="form-control" name="department" placeholder="" aria-label="" aria-describedby="basic-addon2" required>
                    <span class="text-danger" id="department"></span>
                </div>
                

                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" placeholder="Write Something..." ></textarea>
                    <span class="text-danger" id="description"></span>
                </div>        

                <div class="utils_center py-3">
                    <button type="button" onclick="history.back()" class="btn btn-danger mx-2">Cancel</button>
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
            url: "{{ route('saveRegistration') }}",
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