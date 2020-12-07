<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($machines as $machine)
        <tr>
            <td>{{ $machine->id }}</td>
            <td>{{ $machine->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>