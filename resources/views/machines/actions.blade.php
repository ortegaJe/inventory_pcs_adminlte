<a href="{{ route('machines.show', $id) }}"><button type="button" class="d-inline btn bg-secondary btn-sm"><i
            class="fas fa-eye"></i></button></a>
<a href="{{ route('machines.edit', $id) }}" target="_blank"><button type="button"
        class="d-inline btn bg-success btn-sm"><i class="fas fa-edit"></i></button></a>

<form action="{{ route('machines.destroy', $id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn bg-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
</form>