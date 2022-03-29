@extends('admin.dashboard.template')
@section('title', 'signup')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
    <div class="d-flex justify-content-end p-2">
        <a href="{{ route('desigination') }}" class="btn btn-success mx-2">Desigination</a>
        <a href="{{ route('empStatus') }}" class="btn btn-info mx-2">Employe Status</a>

    </div>
    <div class="container utils_center">
        <div class="card mt-3" style="width:33rem;">
            <div class="card-body py-0">
                <h5 class="card-title text-center py-3">User Registration</h5>

                <form id="registrationFormdata" onsubmit="return registration()">
                    @csrf
                    <div class="form-group mb-3 ">
                        <input type="text" class="form-control" name="firstName" placeholder="First Name" aria-label=""
                            aria-describedby="basic-addon2" required>
                        <span class="text-danger" id="user"></span>
                    </div>


                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name" aria-label=""
                            aria-describedby="basic-addon2" required>
                        <span class="text-danger" id="lastName"></span>
                    </div>


                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="empid" placeholder="Employe Id" aria-label=""
                            aria-describedby="basic-addon2" required>
                        <span class="text-danger" id="empid"></span>
                    </div>

                    <div class="form-group mb-3">
                        <select class="form-select" name="userType" id="">
                            <option value="">Select UserType</option>
                            @foreach ($users_type as $user)
                                <option value="{{ $user->id }}">{{ $user->user_type }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="userType"></span>
                    </div>


                    <div class="form-group mb-3">
                        <select class="form-select" name="desigination" id="">
                            <option value="">Select Desigination</option>
                            @foreach ($desigination as $item)
                                <option value="{{ $item->id }}">{{ $item->desigination }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="desigination"></span>
                    </div>


                    <div class="form-group mb-3">

                        <input type="email" class="form-control" name="email" placeholder="email" required>

                        <span class="text-danger" id="email"></span>
                    </div>


                    <div class="form-group mb-3">

                        <input type="tel" class="form-control" name="phone" pattern="[789][0-9]{9}" placeholder="Phone"
                            aria-label="Phone" aria-describedby="basic-addon1" required>

                        <span class="text-danger" id="phone"></span>
                    </div>

                    <div class="form-group mb-3">
                        <select class="form-select" name="team_leaders" id="">
                            <option value="">Select TeamLeaders</option>
                           <option value=""></option>
                        </select>
                        <span class="text-danger" id="team_leaders"></span>
                    </div>
                    {{-- <div class="form-group mb-3">
                        <select class="selectpicker w-100 border rounded" name="userType" multiple data-actions-box="true"
                            data-selected-text-format="count">
                            <option value="">Team Leader</option>
                            <option value="414">441</option>
                            <option value="44">41</option>
                            <option value="444">1</option>
                        </select>
                        <span class="text-danger" id="userType"></span>
                    </div> --}}
                    {{-- <div class="dropdown form-group mb-3">
                        <ul class="p-0" style="list-style: none">
                        <li class="nav-item dropdown">
                            <input type="text" class="dropdown-toggle form-control form-select" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                             
                            <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                          </li>
                          <ul>
                    </div> --}}
                   {{-- <div class="form-group mb-3">
                   
                    <input list="ice-cream-flavors" class="form-control" id="ice-cream-choice" name="ice-cream-choice" />
                    
                    <datalist id="ice-cream-flavors" class="w-100">
                        <option value="Chocolate">
                        <option value="Coconut">
                        <option value="Mint">
                        <option value="Strawberry">
                        <option value="Vanilla">
                    </datalist>
                   </div> --}}
                    <div class="form-group mb-3">
                        <select class="form-select" name="desigination" id="">
                            <option value="">Employee Staus</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        <span class="text-danger" id="desigination"></span>
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

        const x = document.getElementById('ice-cream-flavors');
        console.log(x.children.innerText);
        (Array)(x.children[0]).forEach(element => {
            console.log(element.value)
        });
    </script>
@endsection
