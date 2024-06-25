<x-site>

    <div class="container">
        <a href="{{ route('header_create') }}" type="button" class="btn btn-primary mb-5 mt-4">Create +</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Logo</th>
                <th scope="col">Company Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Settings</th>
            </tr>
            </thead>
            <tbody>
            @foreach($header as $head)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>
                    <td>
                        <img width="60" height="60" src="{{ asset('storage/' . $head->photo) }}" alt="{{ $head->id }}">
                    </td>
                    <td>{{ $head->head }}</td>
                    <td>{{ $head->video }}</td>
                    <td style="display: flex; gap: 20px">

                        <a href="{{ route('header.show' , ['header' => $head->id]) }}" type="button" class="btn btn-primary">View</a>
                        <a href="{{ route('header.edit' , ['header' => $head->id]) }}" type="button" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{ route('header.destroy' , ['header' => $head->id]) }}" onclick="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-site>
