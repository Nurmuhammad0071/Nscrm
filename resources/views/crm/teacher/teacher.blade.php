<x-main>

    <div id="tableExample3" data-list='{"valueNames":["id","name","email","age" , "phone"],"page":8,"pagination":true}'>
        <h3 class="text-center mt-3 mb-3 ">O'qituvchilar</h3>
        <a href="{{route('admin_create')}}" type="button" class="btn btn-primary col-lg-2">O'qituvchi +</a>
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
                    <th class="sort" data-sort="photo">Photo</th>
                    <th class="sort" data-sort="name">Ism</th>
                    <th class="sort" data-sort="email">Email</th>
                    <th class="sort" data-sort="age">Yoshi</th>
                    <th class="sort" data-sort="phone">Telefon raqam</th>
                    <th class="sort" data-sort="status">Ish Holati</th>
                </tr>
                </thead>
                <tbody class="list">
                @foreach($teachers as $teacher)
                <tr>
                    <td class="id">{{ $loop->index +1 }}</td>
                    <td class="name align-middle white-space-nowrap py-2">
                        <div class="d-flex d-flex align-items-center">
                            <div class="avatar avatar-xl me-2">
                                <div class="avatar-name rounded-circle">
                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="">
                                </div>
                            </div>

                        </div>
                    </td>
                    <td class="name">{{ $teacher->name }}</td>
                    <td class="email">{{ $teacher->email }}</td>

                    <td class="age">
                        @if($teacher->birthday && $now)
                            {{ \Illuminate\Support\Carbon::parse($teacher->birthday)->diffInYears($now) }} yosh
                        @endif
                    </td>
                    <td class="phone">{{ $teacher->phone_1 }}</td>
                    @if($teacher->status === 1)
                        <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-success">Ish faoliyatida<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span></td>
                    @else
                        <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-secondary">Ish faoliyatida emas<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span></td>
                    @endif
                    <td class="align-middle white-space-nowrap py-2 text-end">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-24" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-24">
                                <div class="py-2">
                                    <a class="dropdown-item" href="{{ route('teacher.show' , ['teacher' => $teacher->id]) }}">Ko'rish</a>
                                    <a class="dropdown-item" href="{{ route('teacher.edit' , ['teacher' => $teacher->id]) }}">O'zgartirish</a>
{{--                                    <form action="{{ route('teacher.destroy' , ['teacher' => $teacher->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">--}}
{{--                                        @method('DELETE')--}}
{{--                                        @csrf--}}
{{--                                        <button class="dropdown-item text-danger" href="#!">O'chirish</button>--}}
{{--                                    </form>--}}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
        </div>
    </div>
</x-main>
