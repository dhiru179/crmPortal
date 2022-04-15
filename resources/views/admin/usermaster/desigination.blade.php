@extends('admin.dashboard.template')
@section('title', 'Desigination')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<div class="">
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Desigination</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;"></div>
    </nav>
    <div class="px-3 mt-3">
        <div class="d-flex align-item-center justify-content-between mb-3 ">
            <div class="col-6">
                <button type="button" class="btn btn-primary" onclick="addFormData(event)">Add Desigination</button>
            </div>
            <div class=" col-6">
                <input type="search" class="form-control " value="" id="inputSearchByname" placeholder="Search">
            </div>
        </div>
        <div class="table-responsive" id="appendtable" >
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
                    @foreach($desigination as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->desigination_code}}</td>
                        <td>{{$item->desigination}}</td>
                        <td>{{$item->department}}</td>
                        <td>{{$item->description}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button onclick="editFormData(event,'{{json_encode($item)}}')" title="MODIFY" class="btn btn-warning btn-sm m-1 "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                <button onclick="editFormData(event,'{{json_encode($item)}}')" title="DELETE" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
                                <div class="modal-dialog  modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Create Item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                            <form class="" id="formData" onsubmit="return postItem(event)">
                          
                                  <input type="hidden" name="desigination_id" value="${obj.id}" >

                                <div class="form-group mb-3 ">
                                    <label for="">Desigination Code</label>
                                    <input type="text" class="form-control" name="desigination_code" value="${obj.desigination_code}" required>
                                    <span class="text-danger" id="desigination_code"></span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Disigination</label>
                                    <input type="text" class="form-control" name="desigination" value="${obj.desigination}" required>
                                    <span class="text-danger" id="desigination"></span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Department</label>
                                    <input type="text" class="form-control" name="department" value="${obj.department}" required>
                                    <span class="text-danger" id="department"></span>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Write Something..." >${(obj.description==null)?(""):(obj.description)}</textarea>
                                    <span class="text-danger" id="description"></span>
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
            url: "{{route('storeDesigination')}}",
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