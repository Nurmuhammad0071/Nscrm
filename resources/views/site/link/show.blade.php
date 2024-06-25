<x-site>
    <div class="container">
        <a href="{{ route('link') }}" type="button" class="btn btn-primary mb-5 mt-3">Back</a>
        <table class="table">

            <tbody>
            <tr>
                <th scope="row">id</th>
                <td> {{ $link->id }}</td>
            </tr>

            <tr>
                <th scope="row">Name</th>
                <td>{{ $link->name}}</td>
            </tr>
            <tr>
                <th scope="row">Icon</th>
                <td>
                    <i class="{{ $link->icon}}"></i>
                </td>
            </tr>
            <tr>
                <th scope="row">Link</th>
                <td>
                    <a href="{{ $link->link}}">{{ $link->link}}</a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <script src="https://kit.fontawesome.com/76e1ac26e6.js" crossorigin="anonymous"></script>

</x-site>
