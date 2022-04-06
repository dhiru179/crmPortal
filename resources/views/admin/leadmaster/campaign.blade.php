@extends('admin.dashboard.template')
@section('title', 'Campaign Master')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
    <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
        <li class="breadcrumb-item">User Registration</li>
    </ol>
</nav>
<div class="px-3 mt-3">
    <div class="d-flex align-item-center justify-content-between mb-3 ">
        <div class="col-6">
            <button type="button" class="btn btn-primary" onclick="editItem(event,'add_')">Add Campaign</button>
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
                <th width="200" class="text-center">Budget</th>
                <th width="100" class="text-center">Status</th>
                <th width="100" class="text-center">Assign To</th>
                <th width="200" class="text-center">Description</th>
                <th width="100" class="text-center">End Date</th>
                <th width="100" class="text-center">Start Date</th>
                <th width="100" class="text-center" style="min-width:80px">Action</th>
            </thead>
            <tbody id="tbody">
                @foreach($campaign as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td class="text-center">{{$item->campaign_name}}</td>
                    <td class="text-center">{{$item->budget}}</td>
                    <td class="text-center">{{$item->campagin_status}}</td>
                    <td class="text-center">{{$item->assign_to}}</td>
                    <td class="text-center">{{$item->description}}</td>
                    <td class="text-center">{{$item->end_date}}</td>
                    <td class="text-center">{{$item->start_date}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button onclick="editItem(event,'edit_')" type="button" title="VIEW" class="btn btn-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <button onclick="editItem(event,'modify_')" type="button" title="MODIFY" class="btn btn-warning btn-sm m-1 "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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

    function editItem(event, param) {
        let action = param.split('_');

        if (action[0] == 'add') {

            campaignData = {
                description: null,
                assign_to: null,
                budget: null,
                campaginStatus: null,
                campaignName: null,
                endDate: null,
                startDate: null,
            }

        } else if (action[0] == 'edit') {
            campaignData = JSON.parse(action[1]);

        } else if (action[0] == 'view') {

            campaignData = JSON.parse(action[1]);
        } else if (action[0] == 'delete') {

        } else {
            alert('error');
        }

        let html = ` <div class="modal fade" id="updateItems" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Create Item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                            <form class="" id="campaignForm" onsubmit="return postItem(event,'')">
                            <div class="form-group mb-3 ">
            <label for="">Campaign Name</label>
            <input type="text" name="campaignName" class="form-control" required>
        </div>
        <div class="form-group mb-3 ">
            <label for="">Campaign Status</label>
            <select class="form-select" name="campaginStatus" required>
                <option value="">Select Campaign Status</option>
                <option value="Active">Active</option>
                <option value="Ended">Ended</option>
                <option value="Terminated">Terminated</option>
                <option value="Pause">Pause</option>
            </select>
        </div>
        <div class="form-group mb-3 ">
            <label for="">Start Date</label>
            <input type="date" name="startDate" class="form-control">
        </div>
        <div class="form-group mb-3 ">
            <label for="">End Date</label>
            <input type="date" name="endDate" class="form-control">
        </div>

        <div class="form-group mb-3 ">
            <label for="">Budget</label>
            <input type="number" name="budget" min="1" class="form-control" required>
        </div>
       
        <div class="form-group mb-3 ">
            <label for="">Description</label>
            <textarea type="text" name="description" rows="1" class="form-control"></textarea>
        </div>

        
        <div class="form-group mb-3 ">
            <label for="">Assigned to</label>
            <select class="form-select"name="assign_to" required>
                <option value="">Select Users</option>
                <option value="Admin">Admin</option>
                <option value="Sub-Admin">Sub-Admin</option>
            </select>
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
        var data;
        if (getBankId == '') {

            // here we add and edit bank account
            data = $('#campaignForm').serialize();
            console.log(data);

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
            url: "{{route('storeCampaignData')}}",
            headers: {

                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            data: data, // serializes the form's elements.
            success: function(data) {
                console.log(data)
                operateData(data);
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
                        let flashMsg = `<span class="text-danger">${value}</span>`;
                        $(`input[name=${key}]`).after(flashMsg)
                        // console.log(`${key}: ${value}`);
                    }
            
           
        }
    }
   
</script>
@endsection