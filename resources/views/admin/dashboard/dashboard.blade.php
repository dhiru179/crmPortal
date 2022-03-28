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
        <div class="container-fluid mt-3">
            <div>
                <input type="button" class="btn btn-success me-2 rounded-0 tableBtn" value="New Leads">
                <input type="button" class="btn btn-secondary mx-2 rounded-0 tableBtn" value="To Do">
                <input type="button" class="btn btn-secondary mx-2 rounded-0 tableBtn" value="Calender">
            </div>
            <div class="border border-dark p-2">
                <div class="table-responsive" id="appendtable">
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
