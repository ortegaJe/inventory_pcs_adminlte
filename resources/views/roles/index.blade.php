@extends('adminlte::page')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-success card-outline">
      <div class="card-header border">
        <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de roles registrados
        </h3>
        @include('roles.modal')
        <!--<div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>-->
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0" style="display: block;">
        <div class="table-responsive">
          <table class="table table-hover table-striped table-bordered">
            <thead class="text-center">
              <tr style="flex: auto;">
                <th scope="col">NAME</th>
                <th scope="col">LABEL</th>
                <th scope="col">ACTIONS</th>
              </tr>
            </thead>
            <tbody class="text-muted">
              @foreach ($roles as $role)
              <tr>
                <td class="text-center" style="font-size: 18px">
                  <span class="badge bg-success">{{ $role->name }}</span>
                </td>
                <td class="text-center">{{ $role->label }}</td>
                <td class="text-center" style="width: 250px">
                  <form class="deletedRoles" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group w-25 text-center">
                      <button type="button" onclick="window.location=''" class="btn btn-secondary btn-sm col start"
                        data-dismiss="modal">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button type="button" onclick="window.location=''" class="btn btn-success btn-sm col start">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button type="submit" class="btn btn-danger btn-sm col start">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">

        </ul>
      </div>
      <!-- /.card-footer -->
    </div>
  </div>
</div>
@endsection