@extends('admin.dashboard.template')
@section('title', 'Intraction Field')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')

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
<script>
    function submitForm(e) {
        alert('ok');
    }
</script>
@endsection