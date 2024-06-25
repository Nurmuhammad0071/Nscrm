<x-site>

    <div class="container">
        <a href="{{ route('about_create') }}" type="button" class="btn btn-primary mb-5 mt-4">Create +</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Paragraph</th>
                <th scope="col">Video</th>
                <th scope="col">Settings</th>
            </tr>
            </thead>
            <tbody>
            @foreach($abouts as $about)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>
                    <td>
                        <img width="60" height="60" src="{{ asset('storage/' . $about->photo) }}" alt="{{ $about->id }}">
                    </td>
                    <td >{{ $about->paragraph }}</td>
                    <td >{{ $about->video }}</td>
                    <td style="display: flex;gap: 30px">

                        <a href="{{ route('about.show' , ['about' => $about->id]) }}" type="button" class="btn btn-primary">View</a>
                        <a href="{{ route('about.edit' , ['about' => $about->id]) }}" type="button" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{ route('about.destroy' , ['about' =>$about->id]) }}" onclick="return confirm('Are you sure?')">
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
