<x-site>
    <div class="container">
        <form action="{{ route('about.update' , ['about' => $about->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Photo</label>
                <input  name="photo" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('photo')
                <div id="emailHelp" class="form-text text-danger">Logo rasm holatida va 8mb dan oshiq bo'lmasligi kerak</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Paragraph</label>
                <input value="{{ $about->paragraph }}" name="paragraph" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('paragraph')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">video</label>
                <input value="{{ $about->video }}" name="video" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('video')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>



            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-site>
