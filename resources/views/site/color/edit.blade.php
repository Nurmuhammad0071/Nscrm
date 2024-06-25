<x-site>
    <div class="container">
        <form action="{{ route('color.update' , ['color' => $color->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
@method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Color</label>
                <input value="{{ $color->color }}" name="color" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('color')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Font</label>
                <input value="{{ $color->font }}" name="font" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('font')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Size</label>
                <input value="{{ $color->sizr }}" name="size" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('size')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-site>
