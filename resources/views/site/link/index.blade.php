<x-site>

    <div class="container">
        <a href="{{ route('link_create') }}" type="button" class="btn btn-primary mb-5 mt-4">Create +</a>

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
            @foreach($links as $link)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>

                    <td >{{ $link->name }}</td>
                    <td>
                        <i class="{{ $link->icon}}"></i>
                    </td>
                    <td ><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                    <td style="display: flex;gap: 30px">

                        <a href="{{ route('link.show' , ['link' => $link->id]) }}" type="button" class="btn btn-primary">View</a>
                        <a href="{{ route('link.edit' , ['link' => $link->id]) }}" type="button" class="btn btn-warning">Edit</a>
                        <form method="post" action="{{ route('link.destroy' , ['link' =>$link->id]) }}" onclick="return confirm('Are you sure?')">
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
    <script src="https://kit.fontawesome.com/76e1ac26e6.js" crossorigin="anonymous"></script>

</x-site>
