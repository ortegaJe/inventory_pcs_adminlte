<form action="{{ route('soledad.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="btn-group w-50">
        <button type="button" onclick="window.location='{{ route('machines.show', $id) }}'"
            class="btn btn-secondary btn-sm col start" data-dismiss="modal">
            <i class="fas fa-eye"></i>
        </button>
        <button type="button" onclick="window.location='{{ route('soledad.edit', $id) }}'"
            class="btn btn-success btn-sm col start">
            <i class="fas fa-edit"></i>
        </button>
        <button type="submit" class="btn btn-danger btn-sm col start">
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
</form>