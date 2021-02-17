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
        //select: true,
        autoWidth: true,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        order: [[ 0, 'desc' ]],
        ajax: "{{ route('machines.index')}}",
        language: {
        loadingRecords: "<img src='images/Loading.gif'> Loading...",
        processing: "<img src='{{ asset('gif/load.gif') }}' width='32px'> Procesando..."
        },
        columnDefs:[{
                        targets:-1,
                        data:null,
                        defaultContent: "<button class='btn btn-danger btn-create-report'>Reportes</button>"
                        }],
        columns: [
          { data: 'rownum', 
            name: 'rownum',
            visible: true, searchable: false
          },
          { data: 'id',
            name: 'm.id',
            visible: true 
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
            orderable: true, searchable: true, visible: false
          },
          { data: 'model',
            name: 'm.model',
            orderable: true, searchable: true, visible: false
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
          {
            data: 'statu_description.description',
            visible: true, orderable: true, searchable: true
          },
          { data: 'action',
            orderable: false, searchable: false
          },  
          { data: 'reports',
            orderable: false, searchable: false
          },
                ]
      });

      var fila;
              $(document).on("click", ".btn-create-report", function(){
              fila = $(this).closest("tr");
              id = parseInt(fila.find('td:eq(1)').text());
              $("#id").val(id);
              $("").modal("show");
              });

      $("#btnPrueba").click(function(){
            alert("crear formato");
            });

      $("#reload").click(function(){
        $('#data-table').DataTable().ajax.reload();
        });
      
    });
</script>

<script>
  function getDataFoReport(id){
    $.get('/machines/'+id,function(machines){
      $("#id2").val(machines.id);
      $("#AddReports").modal("show");
    });
  }
</script>
@stop