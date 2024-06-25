<x-site>
    <div class="container">
        <a href="{{ route('header') }}" type="button" class="btn btn-primary mb-5 mt-3">Back</a>
        <table class="table">

            <tbody>
            <tr>
                <th scope="row">id</th>
                <td>{{ $header->id }}</td>
            </tr>
            <tr>
                <th scope="row">Photo</th>
                <td>
                    <img src="{{asset('storage/' . $header->photo)}}" width="100" height="100" alt="{{ $header->id }}">
                </td>
            </tr>
            <tr>
                <th scope="row">Head</th>
                <td>{{ $header->head}}</td>
            </tr>
            <tr>
                <th scope="row">Paragraph</th>
                <td>{{ $header->paragraph}}</td>
            </tr>
            <tr>
                <th scope="row">Video</th>
                <td>{{ $header->video}}</td>
            </tr>

            </tbody>
        </table>
    </div>
</x-site>
