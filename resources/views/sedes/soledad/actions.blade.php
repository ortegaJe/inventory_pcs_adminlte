<form action="{{ route('soledad.destroy', $id) }}" method="POST">
    <a href="{{ route('machines.show', $id) }}"><button type="button" class="btn bg-gradient-secondary btn-sm"><i
                class="fas fa-eye"></i></button></a>
    <a href="{{ route('soledad.edit', $id) }}" target="_blank"><button type="button"
            class="btn bg-gradient-success btn-sm"><i class="fas fa-edit"></i></button></a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn bg-gradient-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
</form>