@extends('admin.dashboard.template')
@section('title', 'User Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<div class="">
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">User Registration</li>
        </ol>
    </nav>
    <div class="px-3 mt-3">
        <div class="d-flex align-item-center justify-content-between mb-3 ">
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="editItem(event,'')">Add User</button>
            </div>
            <div class=" col-6">
                <input type="search" class="form-control " value="" id="inputSearchByname" placeholder="Search">
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
                    <th width="100" class="text-center" style="min-width:80px">Action</th>
                </thead>
                <tbody id="tbody">
                    @for ($i = 0; $i < 25; $i++) <tr>
                        <td>{{$i+1}}</td>
                        <td>#abc</td>
                        <td>hr</td>
                        <td>cs</td>
                        <td>Budget</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="" title="VIEW" class="btn btn-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="" title="MODIFY" class="btn btn-warning btn-sm m-1 "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            </div>
                        </td>
                        </tr>
                        @endfor
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
                let f = (trList[index].children)[6];
                let tdData = (a.innerText).toUpperCase() + (b.innerText).toUpperCase() + (c.innerText)
                    .toUpperCase() + (d.innerText).toUpperCase() + (e.innerText).toUpperCase() + (f.innerText)
                    .toUpperCase();
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

    function editItem(event, bankDetails) {
        let action;
        if (bankDetails != '') {
            bankDetails = JSON.parse(bankDetails);
            action = 'edit';

        } else {
            action = 'add';
            bankDetails = {
                id: "",
                property_id: "",
                property_name: "Select Project",
                account_name: "",
                account_number: "",
                bank_name: "",
                branch: "",
                ifsc: "",
                opening_balance: "",
                opening_balance_date: "",
                swift_code: "",
            }
        }
        // console.log(bankDetails.ifsc)
        let html = ` <div class="modal fade" id="updateItems" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Create Item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                            <form class="" id="bankFormData" onsubmit="return postItem(event,'')">
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
                   
                    <div class="form-group mb-3">
                        <select class="form-select" name="desigination" id="">
                            <option value="">Employee Staus</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        <span class="text-danger" id="desigination"></span>
                    </div>

                <div class="d-flex justify-content-end border-top py-3">
                <button type="button" class="btn btn-danger mx-2" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info mx-2" onclick="postItem(event,'')">Save</button>
                </div>  
                 </form>
                     </div>
                </div>
            </div>
        </div>`;

        $('#activeModal').html(html);
        $('#updateItems').modal('show');

    }

    function postItem(event, getBankId) {
        event.preventDefault();
        let data;
        if (getBankId == '') {

            // here we add and edit bank account
            data = $('#bankFormData').serialize();

        } else if (getBankId.split('=')[0] == 'delete') {

            data = {
                action: getBankId.split('=')[0],
                bankId: getBankId.split('=')[1],
            }

        } else {

            alert('error');
        }

        $.ajax({
            type: "POST",
            url: "",
            headers: {

                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            data: data, // serializes the form's elements.
            success: function(data) {
                console.log(data)
                if (data.status) {

                    location.reload();
                }
            },
            error: function(data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    }
</script>
@endsection