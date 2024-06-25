    <x-site>

    <div class="container">
        <a href="{{ route('company_create') }}" type="button" class="btn btn-primary mb-5 mt-4">Create +</a>

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
            @foreach($companies as $company)
            <tr>
                <th scope="row">{{ $loop->index +1 }}</th>
                <td>
                    <img width="60" height="60" src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->id }}">
                </td>
                <td>{{ $company->full_name }}</td>
                <td>{{ $company->phone }}</td>
                <td style="display: flex; gap: 20px">

                    <a href="{{ route('company.show' , ['company' => $company->id]) }}" type="button" class="btn btn-primary">View</a>
                    <a href="{{ route('company.edit' , ['company' => $company->id]) }}" type="button" class="btn btn-warning">Edit</a>
                    <form method="post" action="{{ route('company.destroy' , ['company' => $company->id]) }}" onclick="return confirm('Are you sure?')">
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
