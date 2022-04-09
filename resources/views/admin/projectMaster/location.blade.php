@extends('admin.dashboard.template')
@section('title', 'Location')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div>
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Location</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;">gfffffffff</div>

    </nav>
    <div class="container mt-3">
        <div class="d-flex align-item-center justify-content-between mb-3 ">
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="addFormData(event)">Add</button>
            </div>
            <div class=" col-6">
                <input type="search" class="form-control" value="" id="inputSearchByname" placeholder="Search">
            </div>
        </div>
        <div class="table-responsive" id="appendtable">
            <table class="table table-hover table-bordered mb-5">
                <thead class="thead_sticky">
                    <th width="50">S.No</th>
                    <th width="100" class="text-center">Location</th>
                    <th width="200" class="text-center">City</th>
                    <th width="100" class="text-center" style="min-width:80px">Action</th>
                </thead>
                <tbody id="tbody">
                    @foreach($location as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->location}}</td>
                        <td>{{$item->city}}</td>
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
                let tdData = (a.innerText).toUpperCase() + (b.innerText).toUpperCase();
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
            location: "",
            city: "",
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
                                <div class="modal-dialog  modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Create Item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="" id="formData" onsubmit="return postItem(event)">
                                            <input type="hidden" name="location_id" value="${obj.id}">
                                                <div class="form-group mb-3 col-sm-12  col-md-12  col-lg-12 col-xl-12 col-xxl-12">
                                                    <label for="">Source Code</label>
                                                    <input type="text" name="location" value="${obj.location}" class="form-control" required>
                                                    <span class="text-danger" id="location"></span>
                                                </div>
                                                
                                                <div class="form-group mb-3 col-sm-12  col-md-12  col-lg-12 col-xl-12 col-xxl-12">
                                                    <label for="">Source Name</label>
                                                    <input type="text" name="city" value="${obj.city}" class="form-control">
                                                    <span class="text-danger" id="city"></span>
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

    
    function postItem(event, get_id) {
        event.preventDefault();

        data = $('#formData').serialize();
        
        $.ajax({
            type: "POST",
            url: "{{route('store_locatopn')}}",
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