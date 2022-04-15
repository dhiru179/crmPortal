@extends('admin.dashboard.template')
@section('title', 'OverAllLeadWise')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div>
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">OverAllLead-Wise Report</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;"></div>
    </nav>
    <div class="table-responsive" id="appendtable">
        <table class="table table-hover table-bordered mb-5">
            <thead class="thead_sticky">
                <th>No. of Team Leader</th>
                <th>Avg No. of Advisors</th>
                <th>No. of Advisors</th>
                <th>Avg. Lead per Advisor</th>
                <th>No. of Leads</th>
                <th>Avg. Response</th>
                <th>First Impression</th>
                <th>NEW Leads</th>
                <th>CLOSED Leads</th>
                <th>HOT Leads</th>
                <th>WARM Leads</th>
                <th>COLD Leads</th>
                <th>FROZEN Leads</th>
                <th>Daily Calls</th>
                <th>Daily Usr. WhatsApp</th>
                <th> Weekly Meetings</th>
                <th> Weekly Site Visit</th>
                <th> Profilling</th>
                <th>Avg. Conversion</th>
                <th>Avg. Monthly Deals</th>
                <th>Last Month Deal</th>
                <th> Last month No. of Deal</th>
                <th>Current Deal</th>
                <th>Current No. of Deals</th>

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