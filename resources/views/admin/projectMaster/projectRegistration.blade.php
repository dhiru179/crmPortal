@extends('admin.dashboard.template')
@section('title', 'Project Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<div class="container mt-3">
    <form class="row utils_center" action="" onsubmit="return submitForm(event)">

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
            <label for="">Project Name</label>
            <input type="text" name="ProjectName" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Developer Name</label>
            <input type="text" name="developerName" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Developer Email</label>
            <input type="email" name="developerEmail" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Project Type</label>
            <select class="form-select" required>
                <option value="">Select</option>

            </select>
        </div>

        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Possession Date</label>
            <input type="date" name="possessionDate" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Display Onwards Price</label>
            <input type="text" name="displayOnwardsPrice" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Project Area (Acres)</label>
            <input type="number" name="projectAreaAcres" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Address</label>
            <textarea name="address" rows="1" class="form-control"></textarea>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Location</label>
            <select class="form-select" name="location" required>
                <option value="">Select Iteraction</option>
            </select>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Neighbours</label>
            <select class="form-select" name="neighbours" required>
                <option value="">multiple</option>
            </select>
        </div>
        <div class="form-group col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3"></div>
        <div class="form-group mb-3 col-12">
            <label for="">Description</label>
            <textarea class="form-control" id="editor" name="description" rows="3"></textarea>

        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Loan Pre-Approved By</label>
            <select class="form-select" name="loanPreApproved" required>
                <option value="">multiple choice</option>
            </select>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Brochure</label>
            <input type="file" name="file[]" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Videos</label>
            <input type="text" name="file[]" class="form-control" placeholder="insert multiple video link">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Map Latitude</label>
            <input type="text" id="map" name="mapLatitude" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Map Longitute</label>
            <input type="text" name="mapLongitude" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Units Available</label>
            <input type="number" name="unitsAvilable" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Configuration</label>
            <input type="text" name="configuration" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Units Area (Sq. ft</label>
            <input type="number" min="1" name="unitArea" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Towers</label>
            <input type="number" min="1" name="towers" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Floors</label>
            <input type="number" min="1" name="floors" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Facings</label>
            <select class="form-select" name="facings" >
            <option value="">Select</option>
                <option value="North">North</option>
                <option value="East">East</option>
                <option value="South">South</option>
                <option value="West">West</option>
            </select>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Furnished Satus</label>
            <select class="form-select" name="furnishedStatus" required>
                <option value="">Select Furnished</option>
            </select>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Outdoor Amenties</label>
            <select class="selectpicker w-100" name="outdoorAmenties" required multiple data-max-options="2">
                <option value="">multiple choice</option>
                <option value="">multiple choice</option>
                <option value="">multiple choice</option>
                <option value="">multiple choice</option>
            </select>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Security</label>
            <select class="form-select" name="security" required>
                <option value="">multiple choice</option>
            </select>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">View</label>
            <select class="form-select" name="view" required>
                <option value="">multiple choice input box</option>
            </select>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Booking Amount</label>
            <input type="number" min="1" name="bookingAmount" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Base price</label>
            <input type="number" min="1" name="basePrice" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Floor Rise price</label>
            <input type="number" min="1" name="floorRisePrice" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Parking Available</label>
            <input type="checkbox" min="1" name="parkingAvailable" class="form-check-input">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Parking Price Range</label>
            <input type="number" min="1" name="parkingPriceRange" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Appox Annual Maintance Charge (Per Sq. Ft.)</label>
            <input type="number" min="1" name="approxMaintanceCharge" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Registration Charge</label>
            <input type="number" min="1" name="registrationCharge" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Cover Photos</label>
            <input type="file" name="coverPic" class="form-control">
        </div>

        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Photos</label>
            <input type="file" name="pic" class="form-control">
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

    $('.selectpicker').selectpicker({
    
      style: 'form-select',
      size: 4
  });


    function initialize(){
     var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
     var myOptions = {
         zoom: 4,
         center: myLatlng,
         mapTypeId: google.maps.MapTypeId.ROADMAP
         }
      map = new google.maps.Map(document.getElementById("map"), myOptions);
      var marker = new google.maps.Marker({
          position: myLatlng, 
          map: map,
      title:"Fast marker"
     });
} 

google.maps.event.addDomListener(window,'load', initialize);

            ClassicEditor.create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            })
</script>
@endsection