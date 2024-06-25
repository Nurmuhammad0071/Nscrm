<x-main>
    <div class="container">
        <table class="table">
            <caption>Info Student</caption>

            <a href="{{ route('admin_teacher') }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Ortga<i class="fas fa-backward"></i></a>
            <a href="{{ route('teacher.edit' , ['teacher' => $teacher->id]) }}" class="btn btn-falcon-warning me-1 mb-1 mt-5" type="button">O'zgartirish<i class="far fa-edit"></i></a>
            <form style="height: 50px;position: absolute;right: 100px" action="{{ route('teacher.destroy' , ['teacher' => $teacher->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">
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
                <th>{{ $teacher->id }}</th>
            </tr>
            <tr>
                <td>Ism</td>
                <th>{{ $teacher->name }}</th>
            </tr>
            <tr>
                <td>Photo</td>
                <th>
                    <img src="{{ asset('storage/' . $teacher->photo) }}" width="200" height="200" alt="{{ $teacher->id }}">
                </th>
            </tr>
            <tr>
                <td>Familiya</td>
                <th>{{ $teacher->lastname }}</th>
            </tr>
            <tr>
                <td>Otasining ismi</td>
                <th>{{ $teacher->patronymic }}</th>
            </tr>
            <tr>
            <tr>
                <td>Email</td>
                <th>{{ $teacher->email }}</th>
            </tr>
            <tr>
                <td>Telefon raqam</td>
                <th>{{ $teacher->phone_1 }}</th>
            </tr>
            <tr>
                <td>Telefon raqam #2</td>
                <th>{{ $teacher->phone_2 }}</th>
            </tr>
            <tr>
                <td>Password</td>
                <th>{{ $teacher->password }}</th>
            </tr>

            <tr>
                <td>Komentariya</td>
                <th>{{ $teacher->comment }}</th>
            </tr>
            <tr>
                <td>Ishni boshlagan sana </td>
                <th>{{ $teacher->comming }}</th>
            </tr>
            <tr>
                <td>Mavqey</td>
                <th>{{ $teacher->science }}</th>
            </tr>
            <tr>
                <td>Tug'ilgan sana</td>
                <th>{{ $teacher->birthday }}</th>
            </tr>
            <tr>
                <td>Ishlagan yil tajribasi</td>
                <th>{{ $teacher->Intership }}</th>
            </tr>
            <tr>
                <td>Oylik foizi %</td>
                <th>{{ $teacher->percetage }}</th>
            </tr>
            <tr>
                <td>Ishtimoiy tarmoqdagi sahifasi</td>
                <th>{{ $teacher->link }}</th>
            </tr>
            <tr>
            <tr>
                <td>Telegram username</td>
                <th>{{ $teacher->telegram }}</th>
            </tr>
                <td>Adress</td>
                <th>{{ $teacher->address }}</th>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    @if($teacher->status === 1)
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
