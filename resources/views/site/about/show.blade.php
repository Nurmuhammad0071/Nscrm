<x-site>
    <div class="container">
        <a href="{{ route('about') }}" type="button" class="btn btn-primary mb-5 mt-3">Back</a>
        <table class="table">

            <tbody>
            <tr>
                <th scope="row">id</th>
                <td> {{ $about->id }}</td>
            </tr>
            <tr>
                <th scope="row">Photo</th>
                <td>
                    <img src="{{asset('storage/' . $about->photo)}}" width="100" height="100" alt="{{ $about->id }}">
                </td>
            </tr>
            <tr>
                <th scope="row">Color</th>
                <td>{{ $about->paragraph}}</td>
            </tr>
            <tr>
                <th scope="row">Paragraph</th>
                <td>{{ $about->video}}</td>
            </tr>


            </tbody>
        </table>
    </div>
</x-site>
