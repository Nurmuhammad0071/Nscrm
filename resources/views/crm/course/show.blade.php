<x-main>
    <div class="container">
        <table class="table">
            <caption>Info Student</caption>

            <a href="{{ url()->previous() }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Ortga<i class="fas fa-backward"></i></a>
            <a href="{{ route('course.edit' , ['course' => $course->id]) }}" class="btn btn-falcon-warning me-1 mb-1 mt-5" type="button">O'zgartirish<i class="far fa-edit"></i></a>
            <form style="height: 50px;position: absolute;right: 100px" action="{{ route('course.destroy' , ['course' => $course->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">
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
                <th>{{ $course->id }}</th>
            </tr>
            <tr>
                <td>Nomi</td>
                <th>{{ $course->name }}</th>
            </tr>
            <tr>
                <td>Malumot</td>
                <th>{{ $course->info }}</th>
            </tr>
            <tr>
                <td>Narxi</td>
                <th><i id="number">{{ $course->prise }}</i> so'm</th>
            </tr>
            <tr>
                <td>Oyda Necha marotaba</td>
                <th>{{ $course->days }}</th>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    @if($course->status === 1)
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
<script>
    const elements = document.querySelectorAll('[id^="number"]');
    elements.forEach(element => {
        let number = element.innerText.trim();
        let formattedNumber = number.replace(/(\d)(?=(\d{3})+$)/g, '$1 ');
        element.innerText = formattedNumber;
    });
</script>
