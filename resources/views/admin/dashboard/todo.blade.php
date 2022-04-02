@extends('admin.dashboard.template')
@section('title', 'Home')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
    <div class="">
        <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
            <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
                <li class="breadcrumb-item ">Dashboard</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-center row mx-1" style="overflow:hidden;height:87vh">
            <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10 p-3">
                <div class="mb-1">
                <a href="{{route('dashboard')}}" class="btn btn-outline-secondary me-2 tableBtn" value="">New Leads</a>
                    <a href="{{route('todo')}}" class="btn btn-success mx-2 tableBtn" value="">ToDo</a>
                    <a href="{{route('calender')}}" class="btn btn-outline-secondary mx-2 tableBtn" value="">Calender</a>
                </div>

                <div class="table-responsive" id="appendtable" style="height:80vh">
                    <table class="table table-hover table-bordered mb-5">
                        <thead class="thead_sticky">
                        <th width="50">S.No</th>
                            <th width="100" class="text-center">Source</th>
                            <th width="200" class="text-center">Type</th>
                            <th width="100" class="text-center">Date</th>
                            <th width="100" class="text-center">Name</th>
                            <th width="100" class="text-center">Mobile</th>
                            <th width="100" class="text-center">Status</th>
                            <th width="100" class="text-center" style="min-width:80px">Action</th>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 25; $i++)
                                <tr>

                                    <td>1</td>
                                    <td>abc</td>
                                    <td>785956</td>
                                    <td>active</td>
                                    <td>Budget</td>
                                    <td></td>
                                    <td>yes</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="" title="VIEW" class="btn btn-info btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="" title="MODIFY" class="btn btn-warning btn-sm m-1 "><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    
                                        </div>
                                    </td>
                                </tr>
                            @endfor



                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card bg-info p-3 mt-3 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2 d-flex justify-content-evenly"
                style="height:100%">
                <div class="utils_center border-bottom">
                    <span class="w-75" style="font-size:27px;"><strong>Total Leads</strong></span>
                    <span class="w-25 text-center text-danger" style="font-size:46px;"><strong>50</strong></span>
                </div>
                <div class="   utils_center border-bottom">
                    <span class="w-75" style="font-size:27px;"><strong>New Leads</strong></span>
                    <span class="w-25 text-center text-danger" style="font-size:46px;"><strong>4</strong></span>
                </div>
                <div class="   utils_center border-bottom">
                    <span class="w-75" style="font-size:27px;"><strong>HOT Leads</strong></span>
                    <span class="w-25 text-center text-danger" style="font-size:46px;"><strong>7</strong></span>
                </div>

                <div class="   utils_center border-bottom">
                    <span class="w-75" style="font-size:27px;"><strong>WARM Leads</strong></span>
                    <span class="w-25 text-center text-danger" style="font-size:46px;"><strong>8</strong></span>
                </div>
                <div class="   utils_center border-bottom">
                    <span class="w-75" style="font-size:27px;"><strong>Today's
                            Interaction</strong></span>
                    <span class="w-25 text-center text-danger" style="font-size:46px;"><strong>9</strong></span>
                </div>
                <div class="   utils_center border-bottom">
                    <span class="w-75" style="font-size:27px;"><strong>Today's
                            Interacted</strong></span>
                    <span class="w-25 text-center text-danger" style="font-size:46px;"><strong>13</strong></span>
                </div>
            </div>

        </div>
    </div>

@endsection
