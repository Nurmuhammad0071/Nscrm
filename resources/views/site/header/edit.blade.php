<x-site>
    <div class="container">
        <form action="{{ route('header.update' , ['header' => $header->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Photo</label>
                <input name="photo" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('photo')
                <div id="emailHelp" class="form-text text-danger">Bu rasm holatida va 8mb dan oshiq bo'lmasligi kerak</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Head</label>
                <input value="{{$header->head }}" name="head" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('head')
                <div id="emailHelp" class="form-text">To'ldirish majburiy</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Paragraph</label>
                <input value="{{$header->paragraph}}" name="paragraph" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('paragraph')
                <div id="emailHelp" class="form-text">Video</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail3" class="form-label">Address</label>
                <input value="{{ $header->video }}" name="video" type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
                @error('video')
                <div id="emailHelp" class="form-text">To'ldirish majburiy</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-site>
