<x-site>

    <div class="container">
        <a href="{{ route('gallery_create') }}" type="button" class="btn btn-primary mb-5 mt-4">Create +</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>

                <th scope="col">Settings</th>
            </tr>
            </thead>
            <tbody>
            @foreach($galleries as $gallery)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>
                    <td>
                        <img width="60" height="60" src="{{ asset('storage/' . $gallery->photo) }}" alt="{{ $gallery->id }}">
                    </td>

                    <td style="display: flex;gap: 30px">

                        <a href="{{ route('gallery.show' , ['gallery' => $gallery->id]) }}" type="button" class="btn btn-primary">View</a>
                        <a href="{{ route('gallery.edit' , ['gallery' => $gallery->id]) }}" type="button" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{ route('gallery.destroy' , ['gallery' =>$gallery->id]) }}" onclick="return confirm('Are you sure?')">
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
