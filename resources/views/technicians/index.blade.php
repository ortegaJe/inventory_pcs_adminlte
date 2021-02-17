@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card card-teal card-outline">
      <div class="card-header border">
        <h3 class="card-title" style="font-weight: 500; font-size:28px">Lista de usuarios registrados
        </h3>
        @include('technicians.create')
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
            <thead>
              <tr class="text-center" style="flex: auto">
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">NICKNAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">WORK FUNCTION</th>
                <th scope="col">ROL</th>
                <th scope="col">CAMPUS</th>
                <th scope="col">CREATED_AT</th>
                <th scope="col">ACTIONS</th>
              </tr>
            </thead>
            <tbody class="text-muted">
              @foreach ($users as $user)
              <tr>
                <td>{{ $user->cc }}</td>
                <td><span class="float-left"><img class="img-circle img-fluid elevation-2 img-size-64"
                      src=" {{ asset('upload/'.$user->image) }}" alt="{{ $user->image }}">
                  </span>
                  <span class="m-2"><small>{{ $user->name }} {{ $user->last_name }}</small></span>
                </td>
                <td>{{ $user->nick_name }}</td>
                <td>{{ $user->email }}</td>
                <!--<td>{{ $user->phone }}</td>-->
                <td>{{ $user->work_function }}</td>
                <td><span class="badge badge-success">
                    @foreach( $user->roles as $role)
                    @php($permissionsConcatenated = '" "')
                    @php ($permissionsConcatenated .='* '.$role->name)
                    <div>{{substr($permissionsConcatenated,3) }}
                      @endforeach
                  </span>
                </td>
                <td class="text-center">
                  @foreach ($campus as $campu)
                  @if($campu->id == $user->campus_id)
                  {{ $campu->campu_name }}
                  @endif
                  @endforeach
                </td>
                <td class="text-center">
                  <h6>{{ $user->created_at->diffForHumans() }}</h6>
                </td>
                <td>
                  <form class="deletedUser" action="{{ route('technicians.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="btn-group w-100">
                      <button type="button" onclick="window.location='{{ route('technicians.show', $user->id) }}'"
                        class="btn btn-secondary btn-sm col start" data-dismiss="modal">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button type="button" onclick="window.location='{{ route('technicians.edit', $user->id) }}'"
                        class="btn btn-success btn-sm col start">
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
          {{ $users->links() }}
        </ul>
      </div>
      <!-- /.card-footer -->
    </div>
  </div>
</div>
@endsection

@push('js')
@if(Session::has('user_deleted'))
<script>
  Swal.fire(
'Eliminado con Exito!',
'{!! Session::get('user_deleted') !!}',
'success'
)
</script>
@endif
<script>
  $('.deletedUser').submit(function(e) {
          e.preventDefault(); 

          Swal.fire({
                  title: 'Estas seguro?',
                  text: "No podras revertir esto!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, Eliminar!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                  this.submit();
                  }
                  })
        });
</script>

<script>
  $(document).ready(function(){
  $.ajax({
    url: '/technicians/script',
    method: 'POST',
    data:{
      id: 1,
      _token:$('input[name="_token"]').val()
    }
  }).done(function(res){
    //alert(res);
  });
})
</script>
@endpush