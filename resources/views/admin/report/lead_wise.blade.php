@extends('admin.dashboard.template')
@section('title', 'LeadWise')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div>
    <nav class="bg-info d-flex justify-content-between border border-dark" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item">Lead-Wise Report</li>
        </ol>
        <div class="alert alert-success m-0 d-flex align-items-center" id="flashMsg" role="alert" style="width: 0px;height:51px;position:fixed;right:0;transition:width 1s;border:0;padding:0rem;"></div>
    </nav>
    <div class="table-responsive" id="appendtable">
        <table class="table table-hover table-bordered mb-5">
            <thead class="thead_sticky">
                <th>Lead ID</th>
                <th>Lead Name</th>
                <th>Date Created</th>
                <th>Status</th>
                <th>Response Time</th>
                <th>First Interaction</th>
                <th>Last Interaction</th>
                <th>User Asigned</th>
                <th>No. of Calls</th>
                <th>No. of Meetings</th>
                <th>No. of Site Visit</th>
                <th>No. of Messages</th>
                <th>No. of Usr. WhatsApp</th>
                <th>Last Call Date</th>
                <th>Last Meeting Date</th>
                <th>Last Site Visit Date</th>
                <th>Profilling</th>
                <th>Intersted In</th>
                <th>Budget</th>
                <th>Preffered Location</th>
                <th>Source</th>
                <th>Campaign</th>
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