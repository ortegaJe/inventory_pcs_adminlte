<a href="#" class="d-inline invisible"><button type="button" class="btn bg-secondary btn-sm">
        <i class="fas fa-eye"></i></button></a>
<a href="#" class="d-inline invisible"><button type="button" class="btn bg-success btn-sm">
        <i class="fas fa-edit"></i></button></a>
<form action="{{ route('campus.destroy', $id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn bg-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
</form>