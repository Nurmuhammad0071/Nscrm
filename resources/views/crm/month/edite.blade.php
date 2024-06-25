<x-main>
    <div class="container mt-5">
        <h3 class="text-center mb-3 ">Oy qo'shish</h3>
        <p class="text-danger">Har bir bo'limni to'ldirishingizni suraymiz!</p>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('month.update' , ['month' => $month->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-floating mt-3 mb-3">
                <input name="month" value="{{ $month->month }}" class="form-control @error('month') is-invalid @enderror" id="floatingInput" type="text" placeholder="Ism" /><label for="floatingInput">Oy</label>
                @error('month')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input value="{{ $month->year}}" name="year" class="form-control  @error('year') is-invalid @enderror" id="floatingInput" type="text" placeholder="Yil" /><label for="floatingInput">Yil</label>
                @error('year')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input value="{{$month->comment}}" name="comment" class="form-control " id="floatingInput" type="text" placeholder="Sharif" /><label for="floatingInput">Izoh</label></div>
            <div class="form-check"><input class="form-check-input" id="flexCheckChecked" type="checkbox" value="1" name="status" checked="" /><label class="form-check-label" for="flexCheckChecked">Status</label></div>

            <center><button type="submit" class="btn btn-primary" type="submit">Saqlash</button></center>
        </form>
    </div>
</x-main>
