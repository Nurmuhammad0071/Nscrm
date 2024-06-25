<x-main>
    <div id="tableExample3" data-list='{"valueNames":["id","name","email","age" , "phone"],"page":10,"pagination":true}'>
        <a href="{{ route('interested.create') }}"> <button type="button" class="btn btn-primary mt-5"> O'quvchi +</button></a>

        <div class="row justify-content-end g-0">
            <div class="col-auto col-sm-5 mb-3">
                <form>
                    <div class="input-group"><input class="form-control form-control-sm shadow-none search" type="search" placeholder="Search..." aria-label="search" />
                        <div class="input-group-text bg-transparent"><span class="fa fa-search fs--1 text-600"></span></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive scrollbar">
            <table class="table table-bordered table-striped fs--1 mb-0">
                <thead class="bg-200 text-900">
                <tr>
                    <th class="sort" data-sort="id">№</th>
                    <th class="sort" data-sort="photo">Rasm</th>
                    <th class="sort" data-sort="name">Ism</th>
                    <th class="sort" data-sort="email">Email</th>
                    <th class="sort" data-sort="age">Yoshi</th>
                    <th class="sort" data-sort="phone">Raqami</th>
                    <th class="sort"></th>

                </tr>
                </thead>
                <tbody class="list">
                @foreach($students as $student)
                    @if($student->status === 1 && $student->active === 0)

                        <tr >
                        <td class="id">{{ $loop->index +1 }}</td>
                        <td class="name align-middle white-space-nowrap py-2">
                            <div class="d-flex d-flex align-items-center">
                                <div class="avatar avatar-xl me-2">
                                    <div class="avatar-name rounded-circle">
                                        <img src="{{ asset('storage/' . $student->photo) }}" alt="">
                                    </div>
                                </div>

                            </div>
                        </td>
                        <td class="name">{{ $student->name }}</td>
                        <td class="email">{{ $student->email }}</td>
                        <td class="age">{{ $student->age }}</td>
                        <td class="phone">{{ $student->phone }}</td>
                        <td class="align-middle white-space-nowrap py-2 text-end">
                            <div class="dropdown font-sans-serif position-static">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-24" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-24">
                                    <div class="py-2">
                                        <a class="dropdown-item" href="{{ route('student.show' , ['student' => $student->id]) }}">Ko'rish</a>
                                        <a class="dropdown-item" href="{{ route('interested.edit' , ['interested' => $student->id]) }}">O'zgartirish</a>
                                        <form action="{{ route('student.destroy' , ['student' => $student->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="dropdown-item text-danger" href="#!">O'chirish</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @else
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
        </div>
    </div>
</x-main>
