@extends('admin.dashboard.template')
@section('title', 'Loan Facility')
{{-- @section('dash', 'active') --}}
@section('dashboard_section')
<div>
    <input type="button" class="btn btn-primary" value="get" onclick="postItem(event)">
</div>
<script>
    
    function postItem(event) {
        // event.preventDefault();

        var data = {
            start_date:'1467893596',
            end_date:'1467893594',
            current_time:'1650023931501',
            hash:'rgr334343rfe3',
            id :1,
        };
      

        $.ajax({

            type: "GET",
            url: "https://leads.housing.com/api/v0/get-builder-leads",
            processData: false,
            contentType: false,
            data: data, // serializes the form's elements.

            success: function(response) {
                console.log(response);

           
            },
            error: function(data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    }
</script>
@endsection