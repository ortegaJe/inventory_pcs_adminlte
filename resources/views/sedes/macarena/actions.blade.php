<form action="{{ route('macarena.destroy', $id) }}" method="POST">
    <a href="{{ route('machines.show', $id) }}"><button type="button" class="btn btn-secondary btn-sm"><i
                class="fas fa-eye"></i></button></a>
    <a href="{{ route('macarena.edit', $id) }}" target="_blank"><button type="button" class="btn btn-success btn-sm"><i
                class="fas fa-edit"></i></button></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
</form>