<x-site>
    <div class="container">
        <form action="{{ route('link.update' , ['link' => $link->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
@method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Color</label>
                <input value="{{ $link->name }}" name="name" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('name')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Font</label>
                <input value="{{ $link->icon }}" name="icon" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('icon')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Size</label>
                <input value="{{ $link->link }}" name="link" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('link')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-site>
