
@extends('admin.dashboard.template')
@section('title', 'Lead Source')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

<div class="container utils_center mt-3">
    <form class="row" action="" onsubmit="return submitForm(event)">
    

        <div class="form-group mb-3 col-sm-12  col-md-12  col-lg-12 col-xl-12 col-xxl-12">
            <label for="">Source Code</label>
            <input type="text" name="sourceCode"  class="form-control" required>
        </div>
       
        <div class="form-group mb-3 col-sm-12  col-md-12  col-lg-12 col-xl-12 col-xxl-12">
            <label for="">Source Name</label>
            <input type="text" name="srcName" rows="1" class="form-control">
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