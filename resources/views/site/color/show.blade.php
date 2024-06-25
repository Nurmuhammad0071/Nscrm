<x-site>
    <div class="container">
        <a href="{{ route('color') }}" type="button" class="btn btn-primary mb-5 mt-3">Back</a>
        <table class="table">

            <tbody>
            <tr>
                <th scope="row">id</th>
                <td> {{ $color->id }}</td>
            </tr>

            <tr>
                <th scope="row">Color</th>
                <td>{{ $color->color}}</td>
            </tr>
            <tr>
                <th scope="row">Paragraph</th>
                <td>{{ $color->font}}</td>
            </tr>


            </tbody>
        </table>
    </div>
</x-site>
