<x-main>
    <div class="container">
        <table class="table">
            <caption>Info Student</caption>

            <a href="{{ route('month') }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Ortga<i class="fas fa-backward"></i></a>
            <a href="{{ route('month.edit' , ['month' => $month->id]) }}" class="btn btn-falcon-warning me-1 mb-1 mt-5" type="button">O'zgartirish<i class="far fa-edit"></i></a>
            <form style="height: 50px;position: absolute;right: 100px" action="{{ route('month.destroy' , ['month' => $month->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">
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
                <th>{{ $month->id }}</th>
            </tr>
            <tr>
                <td>Oy</td>
                <th>{{ $month->month }}</th>
            </tr>
            <tr>
                <td>Yil</td>
                <th>{{ $month->year }}</th>
            </tr>
            <tr>
                <td>Izoh</td>
                <th>{{ $month->comment }}</th>
            </tr>

            <tr>
                <td>Status</td>
                <td>
                    @if($month->status === 1)
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
