<x-main>
<div class="container mt-5">
    <h3 class="text-center mb-3 ">O'quvchi qo'shish</h3>
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
    <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">

        @csrf
    {{--file--}}
        <div class="mb-3"><label class="form-label" for="customFile">O'quvchi rasmi</label><input class="form-control" id="customFile" name="photo" type="file" /></div>

    {{--file--}}
    <div class="form-floating mt-3 mb-3">
        <input name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="floatingInput" type="text" placeholder="Ism" /><label for="floatingInput">Ism</label>
        @error('name')
        <p class="text-danger">To'ldirish shart</p>
        @enderror
    </div>
    <div class="form-floating mb-3"><input  value="{{ old('lastname') }}" name="lastname" autocomplete="on" class="form-control" id="floatingInput" type="text" placeholder="Familiya" /><label for="floatingInput">Familiya</label></div>
        <div class="form-floating mb-3"><input value="{{old('patronymic')}}" name="patronymic" class="form-control" id="floatingInput" type="text" placeholder="Sharif" /><label for="floatingInput">Sharif</label></div>
        <div class="form-floating mb-3"><input value="{{old('age')}}" name="age" class="form-control" id="floatingInput" type="number" placeholder="Sharif" /><label for="floatingInput">Yoshi</label></div>
    <div class="form-floating mb-3">
        <input name="email"  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="floatingInput" type="email" placeholder="Email" /><label for="floatingInput">Email</label>
        @error('email')
        <p class="text-danger">Bu email ishlatilgan</p>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input name="phone"  value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" type="text" placeholder="+998" /><label for="floatingInput">Telefon raqam</label>
        @error('phone')
        <p class="text-danger">To'ldirish shart</p>
        @enderror
    </div>
    <div class="form-floating mb-3"><input value="{{ old('phone_2') }}" name="phone_2" class="form-control " id="floatingInput" type="text" placeholder="+998" /><label for="floatingInput">Telefon raqam #2</label></div>
    <div class="form-floating mb-3"><input value="{{ old('phone_3') }}" name="phone_3" class="form-control " id="floatingInput" type="text" placeholder="+998" /><label for="floatingInput">Telefon raqam #3</label></div>
    <div class="form-floating mb-3">
        <input name="password" value="12345678"  class="form-control @error('password') is-invalid @enderror" id="floatingPassword" type="hidden" placeholder="Password" /><label for="floatingPassword">Password</label>
        @error('password')
        <p class="text-danger">To'ldirish shart</p>
        @enderror
    </div>
    <div class="form-floating mb-3"><input value="{{ old('comment') }}" name="comment" class="form-control" id="floatingInput" type="text" placeholder="Izoh" /><label for="floatingInput">Izoh</label></div>
    <div class="form-floating mb-3"><input value="{{ old('title') }}" name="title" class="form-control" id="floatingInput" type="text" placeholder="Mavzu" /><label for="floatingInput">Mavzu</label></div>
    <div class="form-floating mb-3"><input value="{{ old('comming') }}" name="comming" class="form-control" id="floatingInput" type="text" placeholder="Mavzu" /><label for="floatingInput">Biz haqimizda malumotni?</label></div>
    <div class="form-floating mb-3"><input value="{{ old('position') }}" name="position" class="form-control" id="floatingInput" type="text" placeholder="Daraja" /><label for="floatingInput">Daraja</label></div>
    <div class="form-floating mb-3"><input value="{{ old('address') }}" name="address" class="form-control" id="floatingInput" type="text" placeholder="Daraja" /><label for="floatingInput">Address</label></div>
        <input type="hidden" value="1" name="status">
        <input type="hidden" value="1" name="active">
        <center><button type="submit" class="btn btn-primary" type="submit">Submit</button></center>
    </form>
</div>
</x-main>
