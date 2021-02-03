@extends('adminlte::page')

@section('content')
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Salary</th>
        </tr>
    </tfoot>
</table>
@endsection

@push('js')
<script>
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.serial+'</td>'+
            '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.ip_range+'</td>'+
            '</tr>'+
        '<tr>'+
        '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.created_at+'</td>'+
                '</tr>'+
            '<tr>'+
                
            '<tr>'+
                '<td>Extension number:</td>'+
                '<td>'+d.updated_at+'</td>'+
                '</tr>'+
            '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
            '</tr>'+
        '</table>';
    }
    
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        "select": {
                'selector':'td:not(:first-child)',
                'style': 'os'
                },
    "processing": true,
    "serverSide": true,
    "ajax": "{{route('datatables.data')}}",
    "columns": [
    {
    "className": 'details-control',
    "orderable": false,
    "data": null,
    "defaultContent": ''
    },
    { "data": "serial" },
    { "data": "ip_range" },
    { "data": "created_at" },
    { "data": "updated_at" }
    ],
    "order": [[1, 'asc']]
    } );
    
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row( tr );
    
    if ( row.child.isShown() ) {
    // This row is already open - close it
    row.child.hide();
    tr.find('svg').attr('data-icon', 'plus-circle'); // FontAwesome 5
    tr.removeClass('shown');
    }
    else {
    // Open this row
    row.child( format(row.data()) ).show();
    tr.find('svg').attr('data-icon', 'minus-circle'); // FontAwesome 5
    tr.addClass('shown');
    }
    } );
    } );
</script>
@endpush