<x-site>
    <div class="container">
        <form action="{{ route('color.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Color</label>
                <input value="{{ old('color') }}" name="color" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('color')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Font</label>
                <input value="{{ old('font') }}" name="font" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('font')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Size</label>
                <input value="{{ old('size') }}" name="size" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('size')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-site>
