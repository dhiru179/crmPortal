@extends('admin.dashboard.template')
@section('title', 'Lead Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<div class="">
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Desigination</li>
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
                    @foreach($lead_master as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->first_name}}</td>
                        <td>{{$item->last_name}}</td>
                        <td>{{$item->mobile}}</td>
                        <td>{{$item->email}}</td>
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
                                        <label for="">First Name</label>
                                        <input type="text" name="firstName" class="form-control" required>
                                        <span class="text-danger" id="firstName"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Last Name</label>
                                        <input type="text" name="lastName" class="form-control">
                                        <span class="text-danger" id="lastName"></span>
                                    </div>

                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Mobile</label>
                                        <input type="tel" name="mobile" class="form-control" required>
                                        <span class="text-danger" id="mobile"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control">
                                        <span class="text-danger" id="email"></span>
                                    </div>

                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Address</label>
                                        <textarea type="text" name="address" rows="1" class="form-control"></textarea>
                                        <span class="text-danger" id="address"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">City</label>
                                        <input type="text" name="city" class="form-control">
                                        <span class="text-danger" id="city"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Description</label>
                                        <textarea type="text" name="description" rows="1" class="form-control"></textarea>
                                        <span class="text-danger" id="description"></span>
                                    </div>

                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Status</label>
                                        <select class="form-select" name="lead_status" required>
                                            <option value="">Select Status</option>
                                            <option value="NEW">NEW</option>
                                            <option value="CLOSED">CLOSED</option>
                                            <option value="HOT">HOT</option>
                                            <option value="WARM">WARM</option>
                                            <option value="COLD">COLD</option>
                                            <option value="FROZEN">FROZEN</option>
                                        </select>
                                        <span class="text-danger" id="lead_status"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Creation Date</label>
                                        <input id="party" class="form-control" type="date" name="creationDate" min="2017-06-01T08:30" max="2017-06-30T16:30">
                                        <span class="text-danger" id="creationDate"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Budget(In Lakhs)</label>
                                        <input type="number" name="budget" min="0.00" class="form-control">
                                        <span class="text-danger" id="budget"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">BHK</label>
                                        <input type="number" name="bhk" max="8" min="1" class="form-control">
                                        <span class="text-danger" id="bhk"></span>
                                    </div>

                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Toilets</label>
                                        <input type="number" name="toilets" min="1" max="8" class="form-control">
                                        <span class="text-danger" id="toilets"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Preferred Floor</label>
                                        <input type="number" name="PreferredFloor" min="0" max="100" class="form-control">
                                        <span class="text-danger" id="PreferredFloor"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Super Buid Area(Sq.ft)</label>
                                        <input type="number" name="sbuArea" min="1" max="50000" class="form-control">
                                        <span class="text-danger" id="sbuArea"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Parking</label>
                                        <select name="parking" class="form-select">
                                            <option value="">Parking</option>
                                            @for ($i = 0; $i < 8; $i++) <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                                                @endfor
                                        </select>
                                        <span class="text-danger" id="parking"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Preferred Facing</label>
                                        <select name="PreferredFacing" class="form-select">
                                            <option value="">Select Deirection</option>
                                            <option value="North">North</option>
                                            <option value="East">East</option>
                                            <option value="South">South</option>
                                            <option value="West">West</option>
                                        </select>
                                        <span class="text-danger" id="PreferredFacing"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Preferred Location</label>
                                        <select name="PreferredLocation" class="form-select">
                                            <option value="">Select Loaction</option>
                                            @foreach($location as $item)
                                            <option value="{{$item->id}}">{{$item->city.' '.$item->location}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="PreferredLocation"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Interested In</label>
                                        <select name="InterestedIn[]" class="selectpicker w-100" required multiple>
                                            <option value="">Select Project</option>
                                            @foreach($project_master as $item)
                                            <option value="{{$item->id}}">{{$item->project_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="InterestedIn"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Campaign</label>
                                        <select name="Campaign" class="form-select">
                                            <option value="">Select Campaign</option>
                                            @foreach($campaign_master as $item)
                                            <option value="{{$item->id}}">{{$item->campaign_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="Campaign"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Lead Source</label>
                                        <select name="LeadSource" class="form-select">
                                            <option value="">Select Lead Source</option>
                                            @foreach($lead_source as $item)
                                            <option value="{{$item->id}}">{{$item->source_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="LeadSource"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">Referred By</label>
                                        <select name="ReferredBy" class="form-select">
                                            
                                            @foreach($lead_master as $item)
                                            <option value="{{$item->id}}">{{$item->first_name.' '.$item->last_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="ReferredBy"></span>
                                    </div>
                                    <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                                        <label for="">AssignedTo</label>
                                        <select name="AssignedTo" class="form-select">
                                            <option value="">Select</option>
                                            <option value="Advisor">Advisor</option>
                                            <option value="Team Leader">Team Leader</option>
                                        </select>
                                        <span class="text-danger" id="AssignedTo"></span>
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
            url: "{{route('storeLead')}}",
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