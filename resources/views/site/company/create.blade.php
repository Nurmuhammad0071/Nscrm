<x-site>
    <div class="container">
        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Logo</label>
                <input name="logo" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('logo')
                <div id="emailHelp" class="form-text text-danger">Logo rasm holatida va 8mb dan oshiq bo'lmasligi kerak</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail2" class="form-label">Company Name</label>
                <input value="{{ old('full_name') }}" name="full_name" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
                @error('full_name')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail3" class="form-label">Address</label>
                <input value="{{ old('address') }}" name="address" type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp">
                @error('address')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail4" class="form-label">Phone number</label>
                <input value="{{ old('phone') }}" name="phone" type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp">
                @error('phone')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail4" class="form-label">Phone number #2</label>
                <input value="{{ old('phones') }}"  name="phones" type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp">
                @error('phones')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail5" class="form-label">Email</label>
                <input value="{{ old('email') }}" name="email" type="email" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp">
                @error('email')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail6" class="form-label">Hours</label>
                <input value="{{ old('hours') }}" name="hours" type="text" class="form-control" id="exampleInputEmail6" aria-describedby="emailHelp">
                @error('hours')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail7" class="form-label">Map</label>
                <input value="{{ old('location') }}" name="location" type="text" class="form-control" id="exampleInputEmail7" aria-describedby="emailHelp">
                @error('location')
                <div id="emailHelp" class="form-text text-danger">To'ldirish majburiy</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-site>
