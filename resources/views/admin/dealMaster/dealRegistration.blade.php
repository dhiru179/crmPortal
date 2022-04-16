@extends('admin.dashboard.template')
@section('title', 'Deal Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<div class="">
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Deal Registration</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;"></div>
    </nav>
    @if(session()->has('msg'))
    <script>
        $("#flashMsg").css({
            "width": "60%",
            "padding": "1rem",
            "display": "block",
            "border": "1px solid transparent;"
        });
        $("#flashMsg").html(`<strong>{{session('msg')}}</strong>`);
        setInterval((e) => {
            $("#flashMsg").css({
                "width": "0",
                "padding": "0",
            });
        }, 3000);
    </script>
    @endif
    <div class="px-3 mt-3">
        <div class="d-flex align-item-center justify-content-between mb-3 ">
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="addFormData(event)">Add Desigination</button>
            </div>
            <div class=" col-6">
                <input type="search" class="form-control " value="" id="inputSearchByname" placeholder="Search">
            </div>
        </div>
        <div class="table-responsive" id="appendtable">
            <table class="table table-hover table-bordered mb-5">
                <thead class="thead_sticky">
                    <th width="50">S.No</th>
                    <th width="100" class="text-center">Desigination Code</th>
                    <th width="200" class="text-center">Desigination</th>
                    <th width="100" class="text-center">Department</th>
                    <th width="100" class="text-center">Description</th>
                    <th width="100" class="text-center" style="min-width:80px">Action</th>
                </thead>
                <tbody id="tbody">
                    @foreach($deal_master as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->deal_date}}</td>
                        <td>{{$item->lead_master_id}}</td>
                        <td>{{$item->project_master_id}}</td>
                        <td>{{$item->deal_type}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button onclick="editFormData(event,'{{json_encode($item)}}')" title="MODIFY" class="btn btn-warning btn-sm m-1 "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                <a href="{{ route('delete_location', ['id'=>$item->id]) }}" title="DELETE" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                    .toUpperCase() + (d.innerText).toUpperCase();
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
            desigination_code: "",
            desigination: "",
            department: "",
            description: "",
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
        let html = ` <div class="modal fade" id="updateItems" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Create Item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                            <form class="row" id="formData" onsubmit="return postItem(event)">
                          
                                  <input type="hidden" name="desigination_id" value="${obj.id}" >
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Deal Date</label>
                                    <input type="date" name="dealDate" class="form-control">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Lead Name</label>
                                    <input type="text" name="leadName" class="form-control">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Project Name</label>
                                    <input type="text" name="ProjectName" class="form-control">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Deal Type</label>
                                    <select class="form-select" required>
                                        <option value="">Select</option>
                                        <option value="NEW">NEW</option>
                                        <option value="Re-Sale">Re-Sale</option>
                                        <option value="Rentel">Rentel</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Loan Application</label>
                                    <input type="checkbox" name="developerName" class="form-control-inline">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Loan Facilitator</label>
                                    <select class="form-select" name="loanFacilitator" required>
                                        <option value="">Select</option>

                                    </select>
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Configuration</label>
                                    <select class="form-select" name="configuration" required>
                                        <option value="">Select Config</option>

                                    </select>
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Unit Area Sq.ft</label>
                                    <select class="form-select" name="unitArea" required>
                                        <option value="">Select Config</option>

                                    </select>
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Tower name</label>
                                    <input type="text" name="towername" class="form-control">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Floor</label>
                                    <input type="text" name="floor" class="form-control">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Booking Amount</label>
                                    <input type="number" name="bookingAmount" class="form-control">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Unit Price</label>
                                    <input type="number" name="unitPrice" class="form-control">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Deal Files</label>
                                    <input type="file" name="unitPrice" class="form-control-file w-100" multiple>
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Closer Type</label>
                                    <select class="form-select" name="closerType" required>
                                        <option value="">Select</option>

                                    </select>
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Assign to</label>
                                    <select class="form-select" name="assignTo" required>
                                        <option value="">Selec Muliple choice</option>

                                    </select>
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Varifiaction</label>
                                    <select class="form-select" name="varification" required>
                                        <option value="">Select</option>

                                    </select>
                                </div>

                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Revenue</label>
                                    <input type="number" name="revenue" min="1" class="form-control">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Billing Status</label>
                                    <input type="checkbox" name="billingStatus" class="form-control-inline">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Credit Status</label>
                                    <input type="checkbox" name="creditstatus" class="form-control-inline">
                                </div>
                                <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                    <label for="">Remarks</label>
                                    <textarea name="remarks" rows="1" class="form-control"></textarea>
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

        $('.selectpicker').selectpicker({
            style: 'select-picker-control',
            title: 'Select',
            size: 4
        });
    }


    function postItem(event) {
        // event.preventDefault();
        var data = new FormData();
        $('#formData').serializeArray().forEach((elem) => {

            data.append(elem['name'], elem['value']);

        });

        $.ajax({

            type: "POST",
            url: "{{route('store_deal')}}",
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
            location.reload();

        }
    }
</script>
@endsection