@extends('admin.dashboard.template')
@section('title', 'User Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<div class="">
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">User Registration</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;"></div>
    </nav>
    <div class="px-3 mt-3">
        <div class="d-flex align-item-center justify-content-between mb-3 ">
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="addFormData(event)">Add User</button>
            </div>
            <div class=" col-6">
                <input type="search" class="form-control "  value="" id="inputSearchByname" placeholder="Search">
            </div>
        </div>
        <div class="table-responsive" id="appendtable">
            <table class="table table-hover table-bordered mb-5">
                <thead class="thead_sticky">
                    <th width="50">S.No</th>
                    <th width="100" class="text-center">Name</th>
                    <th width="200" class="text-center">Email</th>
                    <th width="100" class="text-center">User Type</th>
                    <th width="100" class="text-center">Phone</th>
                    <th width="100" class="text-center">Status</th>
                    <th width="100" class="text-center" style="min-width:80px">Action</th>
                </thead>
                <tbody id="tbody">
                    @foreach($users as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td class="text-center" >{{$item->first_name.' '.$item->last_name}}</td>
                        <td class="text-center">{{$item->email}}</td>
                        <td class="text-center">{{$item->user_type}}</td>
                        <td class="text-center">{{$item->phone}}</td>
                        <td class="text-center">{{$item->emp_status}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                   <button onclick="editFormData(event,'{{json_encode($item)}}')" title="VIEW" class="btn btn-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                     <button onclick="editFormData(event,'{{json_encode($item)}}')" title="MODIFY" class="btn btn-warning btn-sm m-1 "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="activeModal"></div>
<script>
    const tbody = document.getElementById('tbody');
    const trList = tbody.children;
    $('#inputSearchByname').on('input', (e) => {
        let input = (e.target.value).toUpperCase();
        if (input) {
            for (let index = 0; index < trList.length; index++) {
                let a = (trList[index].children)[1];
                let b = (trList[index].children)[2];
                let c = (trList[index].children)[3];
                let d = (trList[index].children)[4];
                let e = (trList[index].children)[5];
                let tdData = (a.innerText).toUpperCase() + (b.innerText).toUpperCase() + (c.innerText)
                    .toUpperCase() + (d.innerText).toUpperCase() + (e.innerText).toUpperCase();
                if (tdData.indexOf(input) > -1) {
                    trList[index].style.display = "";
                } else {
                    trList[index].style.display = "none";
                }
            }
        } else {
            for (let index = 0; index < trList.length; index++) {
                trList[index].style.display = "";
            }
        }
        return true;
    })

    function addFormData(event) {
        event.preventDefault();
        const data = {
            id: 0,
            first_name: "",
            last_name: "",
            emp_id: "",
            user_type_id: "",
            desigination_id: "",
            email: "",
            phone: "",
            team_leaders: "Team Leaders",
            emp_status: "Employee Status",
            user_type:"Select User",
            desigination:"Desigination",
        }
        callToActiveModal(JSON.stringify(data));
        return true;
    }

    function editFormData(event, data) {
        event.preventDefault();
        callToActiveModal(data);
        return true;
    }

    function callToActiveModal(getData) {
        const obj = JSON.parse(getData)

        let html = `<div class="modal fade" id="updateItems" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Create Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="" id="formData" onsubmit="return postItem(event)">
                                    <input type="hidden"  name="user_id" value="${obj.id}" required>
                                        <div class="form-group mb-3 ">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" autocomplete="off" name="firstName" placeholder="First Name" value="${obj.first_name}" required>
                                            <span class="text-danger" id="firstName"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                              <label>Last Name</label>
                                            <input type="text" class="form-control" autocomplete="off" name="lastName" value="${obj.last_name}" placeholder="Last Name">
                                            <span class="text-danger" id="lastName"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Employee Id</label>
                                            <input type="text" class="form-control" autocomplete="off" name="empid" value="${obj.emp_id}" placeholder="Employee Id" required>
                                            <span class="text-danger" id="empid"></span>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>User Type</label>
                                            <select class="form-select" name="userType">
                                                @foreach ($users_type as $user)
                                                <option value="{{ $user->id }}">{{ $user->user_type }}</option>
                                                @endforeach
                                                <option selected value="${obj.user_type_id}">${obj.user_type}</option>
                                            </select>
                                            <span class="text-danger" id="userType"></span>
                                        </div>


                                        <div class="form-group mb-3">
                                           <label>Desigination</label>
                                            <select class="form-select" name="desigination" id="">
                                            <option selected value="${obj.desigination_id}">${obj.desigination}</option>
                                                @foreach ($desigination as $item)
                                                <option value="{{ $item->id }}">{{ $item->desigination }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger" id="desigination"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                               <label>Email</label>
                                            <input type="email" class="form-control" autocomplete="off" name="email" placeholder="email" value="${obj.email}" required>
                                            <span class="text-danger" id="email"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Phone</label>
                                            <input type="tel" class="form-control" name="phone" autocomplete="off" pattern="[7896][0-9]{9}" placeholder="Phone" value="${obj.phone}" required>
                                            <span class="text-danger" id="phone"></span>
                                        </div>
                                        <div class="form-group mb-3">
                                              <label>Team Leaders</label>
                                            <select class="form-select" name="team_leaders" id="">
                                                <option value="">Team Leaders</option>
                                                <option value="Hr">Hr</option>
                                                
                                            </select>
                                            <span class="text-danger" id="team_leaders"></span>
                                        </div>

                                        <div class="form-group mb-3">
                                         <label>Employee Status</label>
                                            <select class="form-select" name="emp_status" id="">
                                                <option value="${(obj.emp_status=="Employee Status")?(""):(obj.emp_status)}" selected>${obj.emp_status}</option>
                                                <option value="Active">Active</option>
                                                <option value="Absent">Absent</option>
                                                <option value="Terminated">Terminated</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                            <span class="text-danger" id="emp_status"></span>
                                        </div>

                                        <div class="d-flex justify-content-end border-top py-3">
                                            <button type="button" class="btn btn-danger mx-2" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-info mx-2" onclick="postItem(event)">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>`;
        $('#activeModal').html(html);
        $('#updateItems').modal('show');

    }

    function postItem(event) {
        // event.preventDefault();

        var data = new FormData();
        $('#formData').serializeArray().forEach((elem) => {

            data.append(elem['name'], elem['value']);

        });
      

        $.ajax({

            type: "POST",
            url: "{{route('storeUserRegistration')}}",
            headers: {

                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            processData: false,
            contentType: false,
            data: data, // serializes the form's elements.

            success: function(response) {
                console.log(response);

                operateData(response);
            },
            error: function(data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    }

    function operateData(data) {
        if (data.status == "error") {

            for (const [key, value] of Object.entries(data.msg)) {
                $("#" + key).html("");
                $("#" + key).html(value);
            }
        } else if (data.status == true) {
            $('#updateItems').modal('hide');
            $("#flashMsg").css({
                "width": "60%",
                "padding": "1rem",
                "display": "block",
                "border": "1px solid transparent;"
            });
            $("#flashMsg").html(`<strong>${data.msg}</strong>`);
            setInterval((e) => {
                $("#flashMsg").css({
                    "width": "0",
                    "padding": "0",
                });
            }, 3000);
            setInterval((e) => {
                location.reload();
            }, 4000);

        }
    }
</script>
@endsection