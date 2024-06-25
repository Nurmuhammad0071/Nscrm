<x-site>
    <div class="container">
        <a href="{{ route('company') }}" type="button" class="btn btn-primary mb-5 mt-3">Back</a>
        <table class="table">

            <tbody>
            <tr>
                <th scope="row">id</th>
                <td>{{ $company->id }}</td>
            </tr>
            <tr>
                <th scope="row">Logo</th>
                <td>
                    <img src="{{asset('storage/' . $company->logo)}}" width="100" height="100" alt="{{ $company->id }}">
                </td>
            </tr>
            <tr>
                <th scope="row">Company Name</th>
                <td>{{ $company->full_name }}</td>
            </tr>
            <tr>
                <th scope="row">Phone</th>
                <td>{{ $company->phone}}</td>
            </tr>
            <tr>
                <th scope="row">Phone #2</th>
                <td>{{ $company->phones}}</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>{{ $company->email}}</td>
            </tr>
            <tr>
                <th scope="row">Hours</th>
                <td>{{ $company->hours}}</td>
            </tr>
            <tr>
                <th scope="row">Map</th>
                <td>{{ $company->location}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</x-site>
