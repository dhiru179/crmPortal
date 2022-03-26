@extends('admin.dashboard.template')
@section('title', 'Lead Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

    <div class="container utils_center mt-3">
        <form class="row" action="" onsubmit="return submitForm(event)">
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">First Name</label>
                <input type="text" name="firstName" class="form-control" required>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Last Name</label>
                <input type="text" name="lastName" class="form-control">
            </div>

            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Mobile</label>
                <input type="tel" name="mobile" class="form-control" required>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Address</label>
                <textarea type="text" name="address" rows="1" class="form-control"></textarea>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">City</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Description</label>
                <textarea type="text" name="description" rows="1" class="form-control"></textarea>
            </div>

            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Status</label>
                <select class="form-select" required>
                    <option value="">Select Status</option>
                    <option value="NEW">NEW</option>
                    <option value="CLOSED">CLOSED</option>
                    <option value="HOT">HOT</option>
                    <option value="WARM">WARM</option>
                    <option value="COLD">COLD</option>
                    <option value="FROZEN">FROZEN</option>
                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Creation Date</label>
                <input id="party" class="form-control" type="date" name="creationDate" min="2017-06-01T08:30"
                    max="2017-06-30T16:30">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Budget(In Lakhs)</label>
                <input type="number" name="budget" min="0.00" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">BHK</label>
                <input type="number" name="bhk" max="8" min="1" class="form-control">
            </div>

            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Toilets</label>
                <input type="number" name="toilets" min="1" max="8" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Preferred Floor</label>
                <input type="number" name="PreferredFloor" min="0" max="100" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Super Buid Area(Sq.ft)</label>
                <input type="number" name="sbuArea" min="1" max="50000" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Parking</label>
                <select name="parking" class="form-select">
                    <option value="">Parking</option>
                    @for ($i = 0; $i < 8; $i++)
                        <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                    @endfor
                </select>
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
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Preferred Location</label>
                <select name="PreferredLocation" class="form-select">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Interested In</label>
                <select name="InterestedIn" class="form-select">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Campaign</label>
                <select name="Campaign" class="form-select">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Lead Source</label>
                <select name="LeadSource" class="form-select">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Referred By</label>
                <select name="ReferredBy" class="form-select">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">AssignedTo</label>
                <select name="AssignedTo" class="form-select">
                    <option value=""></option>
                </select>
            </div>

            <div class="utils_center my-3 ">
                <button type="button" onclick="history.back()" class="btn btn-danger mx-2">Cancel</button>
                <button type="button" class="btn btn-primary mx-2" onclick="submitForm(event)">Save</button>
            </div>

        </form>

    </div>
    <script>
        function submitForm(e) {
            alert('ok');
        }
    </script>
@endsection
