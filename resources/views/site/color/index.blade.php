<x-site>

    <div class="container">
        <a href="{{ route('color_create') }}" type="button" class="btn btn-primary mb-5 mt-4">Create +</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Logo</th>
                <th scope="col">font</th>
                <th scope="col">Settings</th>
            </tr>
            </thead>
            <tbody>
            @foreach($colors as $color)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>

                    <td style="color: {{ $color->color }};font-family: '{{$color->font}}'">{{ $color->color }}</td>
                    <td style="color: {{ $color->color }};font-family: '{{$color->font}}'">{{ $color->font }}</td>
                    <td style="display: flex; gap: 20px">

                        <a href="{{ route('color.show' , ['color' => $color->id]) }}" type="button" class="btn btn-primary">View</a>
                        <a href="{{ route('color.edit' , ['color' => $color->id]) }}" type="button" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{ route('color.destroy' , ['color' =>$color->id]) }}" onclick="return confirm('Are you sure?')">
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
