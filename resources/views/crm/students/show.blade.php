<x-main>
    <div class="container">
        <table class="table">
            <caption>Info Student</caption>
            @if($user->status == 1)
            @if($user->active == 1)
            <a href="{{ route('student.create') }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">O'quvchi qo'shish <i class="fas fa-plus"></i></a>
            @else
                <a href="{{ route('interested.create') }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Qiziquvchi qo'shish  <i class="fas fa-plus"></i></a>
            @endif
            @endif
            @if($user->status == 1)
            @if($user->active == 1)
                <a href="{{  route('students') }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Ortga<i class="fas fa-backward"></i></a>
            @else
                <a href="{{  route('interested') }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Ortga<i class="fas fa-backward"></i></a>
            @endif
            @else
                <a href="{{  url()->previous() }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Ortga<i class="fas fa-backward"></i></a>

            @endif
            <a href="{{ route('student.edit' , ['student' => $user->id]) }}" class="btn btn-falcon-warning me-1 mb-1 mt-5" type="button">O'zgartirish<i class="far fa-edit"></i></a>
            <a href="{{ route('students_card' , ['id' => $user->id]) }}" class="btn btn-falcon-warning me-1 mb-1 mt-5" type="button"><i class="fas fa-money-bill"></i></a>
            <form style="height: 50px;position: absolute;right: 100px" action="{{ route('student.destroy' , ['student' => $user->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">
                @method('DELETE')
                @csrf
                <button  class="btn btn-danger me-1 mb-1 mt-5 mx-3" type="submit"><i class="far fa-trash-alt"></i></button><br class='d-none d-xl-block d-xxl-none' />
            </form>


            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Malumot</th>
            </tr>
            </thead>

            <tbody>

            <tr>
                <td>#id</td>
                <th>{{ $user->id }}</th>
            </tr>
            <tr>
                <td>Ism</td>
                <th>{{ $user->name }}</th>
            </tr>
            <tr>
                <td>Photo</td>
                <th>
                    <img src="{{ asset('storage/' . $user->photo) }}" width="200" height="200" alt="{{ $user->id }}">
                </th>
            </tr>
            <tr>
                <td>Familiya</td>
                <th>{{ $user->lastname }}</th>
            </tr>
            <tr>
                <td>Otasining ismi</td>
                <th>{{ $user->patronymic }}</th>
            </tr>
            <tr>
            <tr>
                <td>Email</td>
                <th>{{ $user->email }}</th>
            </tr>
            <tr>
                <td>Telefon raqam</td>
                <th>{{ $user->phone }}</th>
            </tr>
            <tr>
                <td>Telefon raqam #2</td>
                <th>{{ $user->phone_2 }}</th>
            </tr>
            <tr>
                <td>Telefon raqam #3</td>
                <th>{{ $user->phone_3 }}</th>
            </tr>
            <tr>
                <td>Password</td>
                <th>{{ $user->password }}</th>
            </tr>
            <tr>
                <td>Telefon raqam</td>
                <th>{{ $user->phone }}</th>
            </tr>
            <tr>
                <td>Komentariya</td>
                <th>{{ $user->comment }}</th>
            </tr>
            <tr>
                <td>Biz haqimizda malumot?</td>
                <th>{{ $user->comming }}</th>
            </tr>
            <tr>
                <td>Mavqey</td>
                <th>{{ $user->position }}</th>
            </tr>
            <tr>
                <td>Adress</td>
                <th>{{ $user->address }}</th>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    @if($user->status === 1)
                    <button class="btn  btn-primary me-1 mb-1" type="button">Active</button>
                    @else
                        <button class="btn  btn-danger me-1 mb-1" type="button">NoActive</button>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Aktive Status</td>
                <td>
                    @if($user->active === 1)
                        <button class="btn  btn-primary me-1 mb-1" type="button">Active</button>
                    @else
                        <button class="btn  btn-danger me-1 mb-1" type="button">NoActive</button>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</x-main>
