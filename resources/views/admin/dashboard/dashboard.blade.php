@extends('admin.dashboard.template')
@section('title', 'Home')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
    <div class="">
        <nav class="bg-light d-flex justify-content-between border-bottom " style="" aria-label="breadcrumb">
            <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
                <li class="breadcrumb-item ">Dashboard</li>
            </ol>
        </nav>

        <div class="row m-0 py-1 px-3">

            <div class="card p-3 col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10">
                <div class="">
                    <input type="button" class="btn btn-success me-2 rounded-0 tableBtn" value="New Leads">
                    <input type="button" class="btn btn-secondary mx-2 rounded-0 tableBtn" value="To Do">
                    <input type="button" class="btn btn-secondary mx-2 rounded-0 tableBtn" value="Calender">
                </div>
                
                    <div class="table-responsive " id="appendtable">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <th width="50">S.No</th>
                                <th width="100" class="text-center">Name</th>
                                <th width="200" class="text-center">Mobile</th>
                                <th width="100" class="text-center">Status</th>
                                <th width="100" class="text-center">Budget</th>
                                <th width="100" class="text-center">Interested In</th>
                                <th width="100" class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
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

            
            <div class="card bg-info p-3 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                <div class="utils_center">
                    <span class="w-75"><strong>Total Leads</strong></span>
                    <span class="w-25 text-center">50</span>
                </div>
                <div class="utils_center">
                    <span class="w-75"><strong>New Leads</strong></span>
                    <span class="w-25 text-center">4</span>
                </div>
                <div class="utils_center">
                    <span class="w-75"><strong>HOT Leads</strong></span>
                    <span class="w-25 text-center">7</span>
                </div>

                <div class="utils_center">
                    <span class="w-75"><strong>WARM Leads</strong></span>
                    <span class="w-25 text-center">8</span>
                </div>
                <div class="utils_center">
                    <span class="w-75"><strong>Today's Interaction</strong></span>
                    <span class="w-25 text-center">9</span>
                </div>
                <div class="utils_center">
                    <span class="w-75"><strong>Today Interacted</strong></span>
                    <span class="w-25 text-center">13</span>
                </div>
            </div>


        </div>
    </div>
    <script>
        let tableHtml = `<table class="table table-hover">
                    <thead>
                        <th width="50">S.No</th>
                        <th width="100" class="text-center">Name</th>
                        <th width="200" class="text-center">Mobile</th>
                        <th width="100" class="text-center">Status</th>
                        <th width="100" class="text-center">Budget</th>
                        <th width="100" class="text-center">Interested In</th>
                        <th width="100" class="text-center">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>`;


        document.querySelectorAll('.tableBtn').forEach((element, index, array) => {
            element.addEventListener('click', (e) => {
                e.preventDefault();
                if (e.target.classList.contains('btn-secondary')) {
                    array.forEach((btn) => {

                        if (btn.classList.contains('btn-success')) {
                            btn.classList.remove('btn-success')
                            btn.classList.add('btn-secondary')
                        }
                    })
                    e.target.classList.add('btn-success')

                }
                $('#appendtable').html('');
                $('#appendtable').html(tableHtml);
            })
        });
    </script>
@endsection
