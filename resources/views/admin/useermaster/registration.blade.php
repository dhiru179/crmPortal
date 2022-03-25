@extends('admin.dashboard.dashboard')
@section('title', 'Home')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div class="card">
    <nav class="bg-light d-flex justify-content-between border-bottom " style="" aria-label="breadcrumb">
        <ol class="breadcrumb  m-0  d-flex align-items-center px-3 h4" style="height:51px;font-size:21px;">
            <li class="breadcrumb-item ">Dashboard</li>
        </ol>
    </nav>
    <div class="container mt-5">
        <h3 class="text-center">Welcome</h3>
    </div>
</div>
@endsection