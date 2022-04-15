@extends('admin.dashboard.template')
@section('title', 'SourceWise')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div>
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Source-Wise Report</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;"></div>
    </nav>
    <div class="table-responsive" id="appendtable">
        <table class="table table-hover table-bordered mb-5">
            <thead class="thead_sticky">
                <th>Source Name</th>
                <th>Cost</th>
                <th>No. of Leads</th>
                <th>Daily Leads</th>
                <th>Weekly Leads</th>
                <th>Monthly Leads</th>
                <th>No. of Leads per Project</th>
                <th>No. of Leads per Campaign</th>
                <th>No. of Calls</th>
                <th>No. of Site Visit</th>
                <th>No. of Deals</th>
                <th>Amount of Deals</th>
                <th> Revenue</th>
                <th>NEW Leads</th>
                <th>CLOSED Leads</th>
                <th>HOT Leads</th>
                <th>WARM Leads</th>
                <th>COLD Leads</th>
                <th>FROZEN Leads</th>
                <th> Average Weekly Site Visit</th>
                <th> Last week total Site Visit</th>
                <th> Current week site visit</th>

            </thead>
            <tbody id="tbody">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
@endsection