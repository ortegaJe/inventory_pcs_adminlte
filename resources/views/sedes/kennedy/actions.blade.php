<form action="{{ route('kennedy.destroy', $id) }}" method="POST">
    <a href="{{ route('machines.show', $id) }}"><button type="button" class="btn bg-gradient-secondary btn-sm"><i
                class="fas fa-eye"></i></button></a>
    <a href="{{ route('kennedy.edit', $id) }}" target="_blank"><button type="button"
            class="btn bg-gradient-success btn-sm"><i class="fas fa-edit"></i></button></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn bg-gradient-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
</form>

<!--@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('.delete-id').submit(function(e) {
        e.preventDefault();

        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success')
            }
        })
    });
</script>
@stop-->