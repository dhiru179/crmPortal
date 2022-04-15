@extends('admin.dashboard.template')
@section('title', 'Facility Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
    <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
        <li class="breadcrumb-item">Facility Registration</li>
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
<div class="container mt-3">
    <div class="d-flex align-item-center justify-content-between mb-3 ">
        <div class="col-6">
            <button type="button" class="btn btn-primary" onclick="addFormData(event)">Add Facility</button>
        </div>
        <div class="col-6">
            <input type="search" class="form-control" id="inputSearchByname" placeholder="Search">
        </div>
    </div>
    <div class="table-responsive" id="appendtable">
        <table class="table table-hover table-bordered mb-5">
            <thead class="thead_sticky">
                <th width="50">S.No</th>
                <th width="100" class="text-center">Facility</th>
                <th width="100" class="text-center">Facility Type</th>
                <th width="100" class="text-center" style="min-width:80px">Action</th>
            </thead>
            <tbody id="tbody">
                @foreach($facility_reg as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->facility_name}}</td>
                    <td>{{$item->facility_type}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button onclick="editFormData(event,'{{json_encode($item)}}')" title="MODIFY" class="btn btn-warning btn-sm m-1 "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            <a href="{{ route('facility_delete', ['id'=>$item->id]) }}" title="DELETE" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                let tdData = (a.innerText).toUpperCase();
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
            facility_name: "",
            facility_type: "Select",
            image_name: ""
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
        let fileLink = `<a class="text-danger" href="{{asset('storage/')}}/${obj.image_name}">${obj.image_name}</a>`;
        let html = ` <div class="modal fade" id="updateItems" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Create Item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="" id="formData" onsubmit="return postItem(event)">
                                        <input type="hidden" name="facility_reg_id" value="${obj.id}" required>
                                            <div class="form-group mb-3">
                                                <label for="">Facility Name</label>
                                                <input type="text" name="facility_name" value="${obj.facility_name}" class="form-control" required>
                                                <span class="text-danger" id="facility_name"></span>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Facility Type</label>
                                                <select name="facility_type" class="form-select">
                                                <option value="${(obj.facility_type=="Select")?(""):(obj.facility_type)}">${obj.facility_type}</option>
                                                <option value="Indoor Amenties">Indoor Amenties</option>
                                                <option value="Outdoor Amenties">Outdoor Amenties</option>
                                                <option value="Security">Security</option>
                                            </select>
                                            <span class="text-danger" id="facility_type"></span>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Icon</label>
                                                <input type="file" name="image_name" class="form-control-file w-100" >
                                                <span>${(obj.image_name!="")?(fileLink):("")}</span>
                                                <span class="text-danger" id="image_name"></span>
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
        let files = document.querySelectorAll("input[type='file']");
        files.forEach((file) => {
            data.append('file', file.files[0]);
        });

        $.ajax({

            type: "POST",
            url: "{{route('facility_reg')}}",
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