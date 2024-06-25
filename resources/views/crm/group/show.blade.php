<x-main>
    <div class="container">
        <table class="table">
            <caption>Info Student</caption>

            <a href="{{ url()->previous() }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Ortga<i class="fas fa-backward"></i></a>
            <a href="{{ route('group.edit' , ['group' => $group->id]) }}" class="btn btn-falcon-warning me-1 mb-1 mt-5" type="button">O'zgartirish<i class="far fa-edit"></i></a>
            <form style="height: 50px;position: absolute;right: 100px" action="{{ route('group.destroy' , ['group' => $group->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">
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
                <th>{{ $group->id }}</th>
            </tr>
            <tr>
                <td>Nomi</td>
                <th>{{ $group->name }}</th>
            </tr>
            <tr>
                <td>Daraja</td>
                <th>{{ $group->level }}</th>
            </tr>
            <tr>
                <td>Asistent</td>
                <th>{{ $group->asistente }}</th>
            </tr>
            <tr>
                <td>Izoh</td>
                <th>{{ $group->comment }}</th>
            </tr>

            <tr>
                <td>Kurs nomi</td>
                <th>{{ $group->course->name }}</th>
            </tr>

            <tr>
                <td>O'qtuvchi</td>
                <th>{{ $group->teacher->name }}</th>
            </tr>
            <tr>
                <td>Ochilgan sana</td>
                <th>{{ $group->created_at }}</th>
            </tr>

            <tr>
                <td>Status</td>
                <td>
                    @if($group->status === 1)
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
