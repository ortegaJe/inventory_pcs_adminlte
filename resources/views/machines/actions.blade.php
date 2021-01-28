<form action="{{ route('machines.destroy', $id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="btn-group w-120">
        <button type="button" onclick="window.location='{{ route('machines.show', $id) }}'"
            class="btn btn-secondary btn-sm col start" data-dismiss="modal">
            <i class="fas fa-eye"></i>
        </button>
        <button type="button" onclick="window.location='{{ route('machines.edit', $id) }}'"
            class="btn btn-success btn-sm col start">
            <i class="fas fa-edit"></i>
        </button>
        <button type="button" onclick="window.location='{{ route('reportMachine.data', $id) }}'"
            class="btn btn-primary btn-sm col start">
            <i class="fas fa-file-alt"></i>
        </button>
        <button type="submit" class="btn btn-danger btn-sm col start">
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
</form>