@extends('admin.dashboard.template')
@section('title', 'Deal Registration')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div>

    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Deal Registration</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;">gfffffffff</div>
    </nav>

    <div class="container mt-3">
        <form class="row utils_center" action="" onsubmit="return submitForm(event)">

            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Deal Date</label>
                <input type="date" name="dealDate" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Lead Name</label>
                <input type="text" name="leadName" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Project Name</label>
                <input type="text" name="ProjectName" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Deal Type</label>
                <select class="form-select" required>
                    <option value="">Select</option>
                    <option value="NEW">NEW</option>
                    <option value="Re-Sale">Re-Sale</option>
                    <option value="Rentel">Rentel</option>
                </select>
            </div>

            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Loan Application</label>
                <input type="checkbox" name="developerName" class="form-control-inline">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Loan Facilitator</label>
                <select class="form-select" name="loanFacilitator" required>
                    <option value="">Select</option>

                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Configuration</label>
                <select class="form-select" name="configuration" required>
                    <option value="">Select Config</option>

                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Unit Area Sq.ft</label>
                <select class="form-select" name="unitArea" required>
                    <option value="">Select Config</option>

                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Tower name</label>
                <input type="text" name="towername" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Floor</label>
                <input type="text" name="floor" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Booking Amount</label>
                <input type="number" name="bookingAmount" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Unit Price</label>
                <input type="number" name="unitPrice" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Deal Files</label>
                <input type="file" name="unitPrice" class="form-control-file w-100" multiple>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Closer Type</label>
                <select class="form-select" name="closerType" required>
                    <option value="">Select</option>

                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Assign to</label>
                <select class="form-select" name="assignTo" required>
                    <option value="">Selec Muliple choice</option>

                </select>
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Varifiaction</label>
                <select class="form-select" name="varification" required>
                    <option value="">Select</option>

                </select>
            </div>

            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Revenue</label>
                <input type="number" name="revenue" min="1" class="form-control">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Billing Status</label>
                <input type="checkbox" name="billingStatus" class="form-control-inline">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Credit Status</label>
                <input type="checkbox" name="creditstatus" class="form-control-inline">
            </div>
            <div class="form-group mb-3 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3">
                <label for="">Remarks</label>
                <textarea name="remarks" rows="1" class="form-control"></textarea>
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