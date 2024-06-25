<x-main>
    <div class="container mt-5">
        <h3 class="text-center mb-3 ">O'qituvchi qo'shish</h3>
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
        <form method="POST" action="{{ route('teacher.store') }}" enctype="multipart/form-data">

            @csrf
            {{--file--}}
            <div class="mb-3"><label class="form-label" for="customFile">O'qituvchi rasmi</label><input class="form-control" id="customFile" name="photo" type="file" /></div>

            {{--file--}}
            <div class="form-floating mt-3 mb-3">
                <input name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="floatingInput" type="text" placeholder="Ism" /><label for="floatingInput">Ism</label>
                @error('name')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input  value="{{ old('lastname') }}" name="lastname" autocomplete="on" class="form-control" id="floatingInput" type="text" placeholder="Familiya" /><label for="floatingInput">Familiya</label></div>
            <div class="form-floating mb-3"><input value="{{old('patronymic')}}" name="patronymic" class="form-control" id="floatingInput" type="text" placeholder="Sharif" /><label for="floatingInput">Sharif</label></div>
            <div class="form-floating mb-3"><input value="{{old('birthday')}}" name="birthday" class="form-control" id="floatingInput" type="date" placeholder="Sharif" /><label for="floatingInput">Tug'lgan kuni</label></div>
            <div class="form-floating mb-3">
                <input name="email"  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="floatingInput" type="email" placeholder="Email" /><label for="floatingInput">Email</label>
                @error('email')
                <p class="text-danger">Bu email ishlatilgan</p>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input name="phone_1"  value="{{ old('phone_1') }}" class="form-control @error('phone_1') is-invalid @enderror" id="floatingInput" type="text" placeholder="+998" /><label for="floatingInput">Telefon raqam</label>
                @error('phone_1')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input value="{{ old('phone_2') }}" name="phone_2" class="form-control" id="floatingInput" type="text" placeholder="+998" /><label for="floatingInput">Telefon raqam #2</label></div>
            <div class="form-floating mb-3">
                <input name="password" value="12345678"   class="form-control @error('password') is-invalid @enderror" id="floatingPassword" type="password" placeholder="Password" /><label for="floatingPassword">Password</label>
                @error('password')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input value="{{ old('comment') }}" name="comment" class="form-control" id="floatingInput" type="text" placeholder="Izoh" /><label for="floatingInput">Izoh</label></div>
            <div class="form-floating mb-3"><input value="{{ old('science') }}" name="science" class="form-control" id="floatingInput" type="text" placeholder="Mavzu" /><label for="floatingInput">Sohasi</label></div>
            <div class="form-floating mb-3"><input value="{{ old('comming') }}" name="comming" class="form-control" id="floatingInput" type="date" placeholder="Mavzu" /><label for="floatingInput">Ishga tuhsgan sana</label></div>
            <div class="form-floating mb-3"><input value="{{ old('Intership') }}" name="Intership" class="form-control" id="floatingInput" type="text" placeholder="Daraja" /><label for="floatingInput">Ishalagan yil tajribasi</label></div>
            <div class="form-floating mb-3"><input value="{{ old('percetage') }}" name="percetage" class="form-control" id="floatingInput" type="text" placeholder="Daraja" /><label for="floatingInput">Oylik foizi %</label></div>
            <div class="form-floating mb-3"><input value="{{ old('telegram') }}" name="telegram" class="form-control" id="floatingInput" type="text" placeholder="Daraja" /><label for="floatingInput">Telegram username</label></div>
            <div class="form-floating mb-3"><input value="{{ old('link') }}" name="link" class="form-control" id="floatingInput" type="text" placeholder="Daraja" /><label for="floatingInput">Ishtimoyi tarmoqdagi sahifasi</label></div>
            <div class="form-floating mb-3"><input value="{{ old('address') }}" name="address" class="form-control" id="floatingInput" type="text" placeholder="Daraja" /><label for="floatingInput">Address</label></div>
            <div class="form-check"><input class="form-check-input" id="flexCheckChecked" type="checkbox" value="1" name="status" checked="" /><label class="form-check-label" for="flexCheckChecked">Checked checkbox</label></div>

            <center><button type="submit" class="btn btn-primary" type="submit">Submit</button></center>
        </form>
    </div>
</x-main>
