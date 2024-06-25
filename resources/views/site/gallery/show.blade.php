<x-site>
    <div class="container">
        <a href="{{ route('gallery') }}" type="button" class="btn btn-primary mb-5 mt-3">Back</a>
        <table class="table">

            <tbody>
            <tr>
                <th scope="row">id</th>
                <td> {{ $gallery->id }}</td>
            </tr>
            <tr>
                <th scope="row">Photo</th>
                <td>
                    <img src="{{asset('storage/' . $gallery->photo)}}" width="100" height="100" alt="{{ $gallery->id }}">
                </td>
            </tr>



            </tbody>
        </table>
    </div>
</x-site>
