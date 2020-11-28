@extends('adminlte::page')

@section('title', 'Sedes')

@section('content')

<section class="content-fluid">

  <div class="content-header">
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-maroon card-outline">
          <div class="card-header border">
            <h3 class="card-title" style="font-weight: 500; font-size:28px">Registros de Sedes
            </h3>
            @include('campus.modal')
            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0" style="display: block;">
            <div class="table-responsive p-2">
              <table class="table table-sm table-bordered table-hover text-center" id="data-table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">SEDES</th>
                    <th scope="col">LABEL</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">ACTIONS</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>

            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">

          </div>
          <!-- /.card-footer -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('js')
<script>
  $(function (){
      var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        //responsive: true,
        autoWidth: true,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        ajax: "{{ route('campus.index')}}",
        columns: [
          { data: 'id', 
            name: 'campus.id', 
            visible: false 
          },
          { data: 'campu_name',
            name: 'campus.campu_name',
            orderable: true, searchable: true 
          },
          { data: 'label',
            name: 'campus.label',
            orderable: true, searchable: true
          },
          { data: 'created_at',
            name: 'campus.created_at',
            orderable: true, searchable: true
          },
          { data: 'action',
           orderable: false, searchable: false,
          },
        ]
      });
});
</script>
@endpush