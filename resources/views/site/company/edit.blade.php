<x-site>
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('company.update' , ['company' => $company->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Logo</label>
                <input  name="logo" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your info with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Company Name</label>
                <input value="{{ $company->full_name }}" name="full_name" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your info with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail3" class="form-label">Address</label>
                <input value="{{ $company->address }}" name="address" type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your info with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail4" class="form-label">Phone number</label>
                <input value="{{ $company->phone }}" name="phone" type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your info with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail4" class="form-label">Phone number #2</label>
                <input value="{{ $company->phones }}" name="phones" type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your info with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail5" class="form-label">Email</label>
                <input value="{{ $company->email }}"  name="email" type="email" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your info with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail6" class="form-label">Hours</label>
                <input value="{{ $company->hours }}" name="hours" type="text" class="form-control" id="exampleInputEmail6" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your info with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail7" class="form-label">Map</label>
                <input value="{{ $company->location }}" name="location" type="text" class="form-control" id="exampleInputEmail7" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your info with anyone else.</div>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-site>
