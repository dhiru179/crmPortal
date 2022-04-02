@extends('admin.dashboard.template')
@section('title', 'Lead Dashboard')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<style>
    .accordion-item{
        border: 3px solid rgba(0,0,0,.125);
        border-color: #0dcaf0;
        
    }
</style>
<div class="">
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Lead Dashboard</li>
        </ol>
    </nav>
    <div class="container py-3">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item ">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button text-danger " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <strong>BASIC</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body row utils_center">
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Name</strong></span>
                            <span class="mx-3 col-4">Dhiraj Kumar</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Mobile</strong></span>
                            <span class="mx-3 col-4">8956625332</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Address</strong></span>
                            <span class="mx-3 col-4">xxxxxxxxxx</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Description</strong></span>
                            <span class="mx-3 col-4">xxxxxxxxx</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Status</strong></span>
                            <span class="mx-3 col-4">Active</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Email</strong></span>
                            <span class="mx-3 col-4">abc@gmail.com</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>City</strong></span>
                            <span class="mx-3 col-4">Durgapur</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">

                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item ">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button text-danger  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        <strong>REQUIREMENTS</strong> 
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body row utils_center">
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Budget</strong></span>
                            <span class="mx-3 col-4">100 Lakh</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Preferred Floor</strong></span>
                            <span class="mx-3 col-4">4</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Parking</strong></span>
                            <span class="mx-3 col-4">1</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Preferred Location</strong></span>
                            <span class="mx-3 col-4">Newtown</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Configuration</strong></span>
                            <span class="mx-3 col-4">3BHK Toiltes</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>SBA (Sq. Ft.)</strong></span>
                            <span class="mx-3 col-4">1500</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Preferred Facing</strong></span>
                            <span class="mx-3 col-4">South</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Interested In</strong></span>
                            <span class="mx-3 col-4">Puri Veda</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button text-danger  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                       <strong>OTHERS</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body row utils_center">
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Campaign</strong></span>
                            <span class="mx-3 col-4">JFM Campaign</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Lead Source</strong></span>
                            <span class="mx-3 col-4">Housing.COM</span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Referred By</strong></span>
                            <span class="mx-3 col-4"></span>
                        </div>
                        <div class="utils_center col-sm-12 col-md-6 col-lg-6  col-xl-6	col-xxl-6">
                            <span class="mx-3 col-4"><strong>Assigned to</strong></span>
                            <span class="mx-3 col-4">R.K Singh</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button text-danger  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                        <strong>INTERACTION</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <div class="table-responsive" id="appendtable">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <th width="10">#</th>
                                    <th width="100" class="text-center">Date</th>
                                    <th width="200" class="text-center">Subject</th>
                                    <th width="100" class="text-center">User</th>
                                    <th width="100" class="text-center">Interaction Type</th>
                                    <th width="200" class="text-center">Description</th>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                    <button class="accordion-button text-danger  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                        <strong>REMINDERS</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                    <div class="accordion-body">
                        <div class="table-responsive" id="appendtable">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <th width="10">#</th>
                                    <th width="100" class="text-center">Date</th>
                                    <th width="200" class="text-center">Subject</th>
                                    <th width="100" class="text-center">User</th>
                                    <th width="100" class="text-center">Interaction Type</th>
                                    <th width="200" class="text-center">Description</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                    <button class="accordion-button text-danger  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                        <strong>EDITS</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                    <div class="accordion-body">
                        <div class="table-responsive" id="appendtable">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <th width="10">#</th>
                                    <th width="100" class="text-center">Date</th>
                                    <th width="100" class="text-center">User</th>
                                    <th width="200" class="text-center">Field</th>
                                    <th width="100" class="text-center">Previous Value</th>
                                    <th width="200" class="text-center">New Value</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var myCollapsible = document.getElementById('accordionPanelsStayOpenExample')
        myCollapsible.addEventListener('shown.bs.collapse', function(e) {
           
        })
    </script>
    @endsection