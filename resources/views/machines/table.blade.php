<table class="table table-sm table-bordered table-hover text-center" id="data-table" role="grid">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TYPE</th>
      <th scope="col">SERIAL</th>
      <th scope="col">MANUFACTURER</th>
      <th scope="col">MODEL</th>
      <th scope="col">CPU</th>
      <th scope="col">IP</th>
      <th scope="col">MAC</th>
      <th scope="col"><span class="img-fluid"><img src="https://anydesk.com/_static/img/favicon/anydesk_icon.png"
            width="32px" height="32px" alt="{{ asset('png/anydesk.png') }}"></span>
      </th>
      <th scope="col"><span class="img-fluid"><img src="https://www.flaticon.com/svg/static/icons/svg/732/732225.svg"
            width="32px" height="32px" alt="os_windows.svg"></span>
      </th>
      <th scope="col">CAMPUS</th>
      <th scope="col">LOCATION</th>
      <th scope="col">COMMENT</th>
      <th scope="col">ACTIONS</th>
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
        ajax: "{{ route('machines.index')}}",
        columns: [
          { data: 'id',
            name: 'machines.id',
            visible: false 
          },
          { data: 'name',
            name: 'types.name',
            orderable: true, searchable: true 
          },
          { data: 'serial',
            name: 'serial',
            visible: false, orderable: true, searchable: true
          },
          { data: 'manufacturer',
            name: 'manufacturer',
            orderable: true, searchable: true
          },
          { data: 'model',
            name: 'model',
            orderable: true, searchable: true
          },
          { data: 'cpu',
            name: 'cpu',
            visible: false, orderable: true, searchable: true
          },
          { data: 'ip_range',
            name: 'machines.ip_range',
            orderable: true, searchable: true 
          },
          { data: 'mac_address',
            name: 'machines.mac_address',
            orderable: true, searchable: true
          },
          { data: 'anydesk',
            name: 'machines.anydesk',
            orderable: true, searchable: true
          },
          { data: 'os',
            name: 'os',
            visible: true, orderable: true, searchable: true
          },
          { data: 'campu_name',
            name: 'campus.campu_name',
            orderable: true, searchable: true
          },
          { data: 'location',
            name: 'location',
            visible: false, orderable: true, searchable: true
          },
          { data: 'comment',
            name: 'comment',
            visible: false, orderable: true, searchable: true
          },
          { data: 'action',
           orderable: false, searchable: false
          },        
                ]
      });
    });
</script>
@stop