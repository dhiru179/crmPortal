@extends('admin.dashboard.template')
@section('title', 'Lead Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div>
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Lead Registration</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;"></div>
    </nav>
    <div class="container utils_center mt-3">
        <form class="row" id="formData"  onsubmit="return postItem(event)">
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
                    <option value=""></option>
                </select>
                <span class="text-danger" id="PreferredLocation"></span>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Interested In</label>
                <select name="InterestedIn" class="form-select">
                    <option value=""></option>
                </select>
                <span class="text-danger" id="InterestedIn"></span>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Campaign</label>
                <select name="Campaign" class="form-select">
                    <option value=""></option>
                </select>
                <span class="text-danger" id="Campaign"></span>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Lead Source</label>
                <select name="LeadSource" class="form-select">
                    <option value=""></option>
                </select>
                <span class="text-danger" id="LeadSource"></span>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Referred By</label>
                <select name="ReferredBy" class="form-select">
                    <option value=""></option>
                </select>
                <span class="text-danger" id="ReferredBy"></span>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">AssignedTo</label>
                <select name="AssignedTo" class="form-select">
                    <option value=""></option>
                </select>
                <span class="text-danger" id="AssignedTo"></span>
            </div>

            <div class="utils_center my-3 ">
                <button type="button" onclick="history.back()" class="btn btn-danger mx-2">Cancel</button>
                <button type="submit" class="btn btn-primary mx-2" onclick="postItem(event)">Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    function postItem(event) {
        event.preventDefault();

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