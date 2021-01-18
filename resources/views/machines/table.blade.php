<table class="table table-sm table-bordered table-hover text-center" id="data-table" role="grid">
  <thead class="thead-light">
    <tr>
      @include('machines.header_list_table')
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>

@section('js')
<script>
  $(function (){
      var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        //responsive: true,
        autoWidth: true,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        order: [[ 0, 'desc' ]],
        ajax: "{{ route('machines.index')}}",
        language: {
        loadingRecords: "<img src='images/Loading.gif'> Loading...",
        processing: "<img src='{{ asset('gif/load.gif') }}' width='32px'> Procesando..."
        },
        columns: [
          { data: 'rownum', 
            name: 'rownum',
            visible: true, searchable: false,
          },
          { data: 'id',
            name: 'm.id',
            visible: false 
          },
          { data: 'name',
            name: 't.name',
            orderable: true, searchable: true 
          },
          { data: 'serial',
            name: 'm.serial',
            visible: false, orderable: true, searchable: true
          },
          { data: 'serial_monitor',
            name: 'm.serial_monitor',
            visible: false, orderable: true, searchable: true
          },
          { data: 'manufacturer',
            name: 'm.manufacturer',
            orderable: true, searchable: true
          },
          { data: 'model',
            name: 'm.model',
            orderable: true, searchable: true
          },
          { data: 'cpu',
            name: 'm.cpu',
            visible: false, orderable: true, searchable: true
          },
          { data: 'name_pc',
            name: 'm.name_pc',
            orderable: true, searchable: true
          },
          { data: 'ip_range',
            name: 'm.ip_range',
            orderable: true, searchable: true 
          },
          { data: 'mac_address',
            name: 'm.mac_address',
            orderable: true, searchable: true
          },
          { data: 'anydesk',
            name: 'm.anydesk',
            orderable: true, searchable: true
          },
          { data: 'os',
            name: 'm.os',
            visible: true, orderable: true, searchable: true
          },
          { data: 'campu_name',
            name: 'c.campu_name',
            orderable: true, searchable: true
          },
          { data: 'location',
            name: 'm.location',
            visible: false, orderable: true, searchable: true
          },
          { data: 'comment',
            name: 'm.comment',
            visible: false, orderable: true, searchable: true
          },
          { data: 'm.created_at',
            name: 'm.created_at',
            visible: true, orderable: true, searchable: true
          },
          { data: 'description',
            name: 'statu_description.description',
            visible: true, orderable: true, searchable: true
          },
          { data: 'action',
            orderable: false, searchable: false
          },        
                ]
      });
      $("#reload").click(function(){
        $('#data-table').DataTable().ajax.reload();
        });
    });
</script>
@stop