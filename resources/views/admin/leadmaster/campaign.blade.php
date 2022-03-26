@extends('admin.dashboard.template')
@section('title', 'Campaign Master')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<div class="container utils_center mt-3">
    <form class="row" action="" onsubmit="return submitForm(event)">
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Campaign Name</label>
            <input type="text" name="campaignName" class="form-control" required>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Campsign Status</label>
            <select class="form-select" required>
                <option value="">Select Campsign Status</option>
                <option value="Active">Active</option>
                <option value="Ended">Ended</option>
                <option value="Terminated">Terminated</option>
                <option value="Pause">Pause</option>
            </select>
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Start Date</label>
            <input type="date" name="startDate" class="form-control">
        </div>
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">End Date</label>
            <input type="date" name="endDate" class="form-control">
        </div>

        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Budget</label>
            <input type="number" name="budget" min="1" class="form-control" required>
        </div>
       
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Description</label>
            <textarea type="text" name="Description" rows="1" class="form-control"></textarea>
        </div>

        
        <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
            <label for="">Assigned to</label>
            <select class="form-select" required>
                <option value="">Select Users</option>
                <option value="Admin">Admin</option>
                <option value="Sub-Admin">Sub-Admin</option>
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