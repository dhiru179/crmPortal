@extends('admin.dashboard.template')
@section('title', 'Intraction')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div>
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Intraction Registration</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;">gfffffffff</div>
    </nav>
    <div class="container utils_center mt-3">
        <form class="row" action="" onsubmit="return submitForm(event)">
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Interaction type</label>
                <select class="form-select" required>
                    <option value="">Select Iteraction</option>
                    <option value="Voice Call">Voice Call</option>
                    <option value="Video Call">Video Call</option>
                    <option value="Meeting">Meeting</option>
                    <option value="Site Visit">Site Visit</option>
                    <option value="Video Site Visit">Video Site Visit</option>
                    <option value="SMS">SMS</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Email">Email</option>
                    <option value="Courier">Courier</option>
                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Interactor</label>
                <input type="text" name="Interactor" class="form-control">
            </div>

            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Lead</label>
                <input type="text" name="Lead" class="form-control" required>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Project</label>
                <select name="Project" class="form-control">
                    <option value="">Multiple Choice</option>
                </select>
            </div>


            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Subject</label>
                <input type="text" name="Subject" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Description</label>
                <textarea type="text" name="Description" rows="1" class="form-control"></textarea>
            </div>


            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Mark as Reminder</label>
                <input type="check" name="reminder" class="form-control">
            </div>

            <div class="utils_center my-3 ">
                <button type="button" onclick="history.back()" class="btn btn-danger mx-2">Cancel</button>
                <button type="button" class="btn btn-primary mx-2" onclick="submitForm(event)">Save</button>
            </div>

        </form>

    </div>
</div>
<script>
    function submitForm(e) {
        alert('ok');
    }
</script>
@endsection