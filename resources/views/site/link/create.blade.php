<x-site>
    <div class="container">
        <form action="{{ route('link.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Name</label>
                <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('name')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Icon</label>
                <input value="{{ old('icon') }}" name="icon" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('icon')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Link</label>
                <input value="{{ old('link') }}" name="link" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('link')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-site>
