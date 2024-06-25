<x-site>
    <div class="container">
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Photo</label>
                <input name="photo" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('photo')
                <div id="emailHelp" class="form-text text-danger">Logo rasm holatida va 8mb dan oshiq bo'lmasligi kerak</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-site>
