<form action="{{ route('campus.destroy', $id) }}" method="POST">
    <a href="#"><button type="button" class="btn bg-secondary btn-sm"><i class="fas fa-eye"></i></button></a>
    <a href="#"><button type="button" class="btn bg-success btn-sm"><i class="fas fa-edit"></i></button></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn bg-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
</form>