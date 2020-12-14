<table class="table table-sm table-bordered table-hover text-center" id="data-table">
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
        ajax: "{{ route('macarena.index')}}",
        columns: [
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
          { data: 'created_at',
          name: 'm.created_at',
          visible: true, orderable: true, searchable: true
          },
          { data: 'action',
           orderable: false, searchable: false
          },        
                ]
      });
    });
</script>
@stop