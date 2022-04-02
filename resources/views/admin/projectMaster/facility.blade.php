
@extends('admin.dashboard.template')
@section('title', 'Facility Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Facility Registration</li>
        </ol>
    </nav>
    <div class="container mt-3">
        <div class="d-flex align-item-center justify-content-between mb-3 ">
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="editItem(event,'')">Add Facility</button>
            </div>
            <div class="col-6">
                <input type="search" class="form-control " value="" id="inputSearchByname" placeholder="Search">
            </div>
        </div>
        <div class="table-responsive" id="appendtable">
            <table class="table table-hover table-bordered mb-5">
                <thead class="thead_sticky">
                    <th width="50">S.No</th>
                    <th width="100" class="text-center">Facility</th>
                    <th width="100" class="text-center" style="min-width:80px">Action</th>
                </thead>
                <tbody id="tbody">
                    @for ($i = 0; $i < 25; $i++) <tr>
                        <td>{{$i+1}}</td>
                        <td>#abc</td>
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
                            <div class="form-group mb-3">
            <label for="">Facility Name</label>
            <input type="text" name="facilityName"  class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Facility Type</label>
            <select name="facilitytype" class="form-select">
                <option value="">select</option>
                <option value="Indoor Amenties">Indoor Amenties</option>
                <option value="Outdoor Amenties">Outdoor Amenties</option>
                <option value="Security">Security</option>
            </select>
        </div>
       
        <div class="form-group  mb-3">
            <label for="">Icon</label>
            <input type="file" name="facilityIcon"  class="form-control-file w-100" >
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