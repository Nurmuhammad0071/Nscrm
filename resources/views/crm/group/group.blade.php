<x-main>
    <div class="card mb-5" id="customersTable" data-list='{"valueNames":["id","name","teacher_id","total","level","course_id" , "date"],"page":5,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Groups</h5>
                </div>
                <div class="col-8 col-sm-auto text-end ps-2">

                    <div id="table-customers-replace-element">
                        <a href="{{ route('group_create') }}" class="btn btn-falcon-default btn-sm" type="button">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">Guruh qushish</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                    <tr>

                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="id">№</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Guruh nomi</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="teacher_id">O'qituvchisi</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="total">O'quvchilar soni</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="level">Daraja</th>
                        <th class="sort pe-1 align-middle white-space-nowrap ps-5" data-sort="course_id" style="min-width: 200px;">Yo'nalish</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="date">Ochilgan sana</th>
                        <th class="align-middle no-sort"></th>
                        <th class="align-middle no-sort"></th>
                    </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                    @foreach($groups as $group)
                        <tr class="btn-reveal-trigger" @if($group->status === 0)  style="display: none"@endif>



                            <td class="id align-middle py-2">{{ $loop->index +1 }}</td>
                            <td class="name align-middle py-2">{{ $group->name }}</td>
                            <td class="teacher_id align-middle py-2">{{ $group->teacher->name }} </td>

                            <td class="total align-middle white-space-nowrap py-2">10</td>
                            <td class="level align-middle white-space-nowrap ps-5 py-2">{{ $group->level }}</td>
                            <td class="course_id align-middle white-space-nowrap ps-5 py-2">{{ $group->course->name }}</td>
                            <td class="date align-middle py-2">{{ $group->created_at->format('F d') }}</td>
                            <td class="align-middle white-space-nowrap py-2 text-end">
                                <div class="dropdown font-sans-serif position-static">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-24" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-24">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="{{ route('group.show' , ['group' => $group->id]) }}">Ko'rish</a>
                                            <a class="dropdown-item" href="{{ route('group.edit' , ['group' => $group->id]) }}">O'zgartirish</a>
                                            <form action="{{ route('group.destroy' , ['group' => $group->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item text-danger" href="#!">O'chirish</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="date align-middle py-2">
                                <center>
                                <a href="{{ route('connection_create' , ['id' => $group->id]) }}" class="btn btn-primary me-1 mb-1" type="button">+</a>
                                </center>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-center"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
        </div>
    </div>

{{--No Active --}}
    <div id="tableExample3 " data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
        <div class="row justify-content-end g-0 bg-100 p-3" >
           <h5 class="mt-2 text-danger" >Hozirda majut bo'lmagan gruhlar</h5>
        </div>
        <div class="table-responsive scrollbar">
            <table class="table table-bordered table-striped fs--1 mb-0">
                <thead class="bg-200 text-900">
                <tr>
                    <th class="sort" data-sort="name">№</th>
                    <th class="sort" data-sort="email">Guruh nomi</th>
                    <th class="sort" data-sort="age">O'qituvchisi</th>
                    <th class="sort" data-sort="age">O'quvchilar soni</th>
                    <th class="sort" data-sort="age">Daraja</th>
                    <th class="sort" data-sort="age">Yo'nalish</th>
                    <th class="sort" data-sort="age">Ochilgan sana</th>
                </tr>
                </thead>
                <tbody class="list">
                @foreach($groups as $group)
                    <tr class="btn-reveal-trigger" @if($group->status === 1)  style="display: none"@endif>



                        <td class="id align-middle py-2">{{ $loop->index +1 }}</td>
                        <td class="name align-middle py-2">{{ $group->name }}</td>
                        <td class="teacher_id align-middle py-2">{{ $group->teacher->name }} </td>

                        <td class="total align-middle white-space-nowrap py-2">10</td>
                        <td class="level align-middle white-space-nowrap ps-5 py-2">{{ $group->level }}</td>
                        <td class="course_id align-middle white-space-nowrap ps-5 py-2">{{ $group->course->name }}</td>
                        <td class="date align-middle py-2">{{ $group->created_at->format('F d') }}</td>
                        <td class="align-middle white-space-nowrap py-2 text-end">
                            <div class="dropdown font-sans-serif position-static">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-24" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-24">
                                    <div class="py-2">
                                        <a class="dropdown-item" href="{{ route('group.show' , ['group' => $group->id]) }}">Ko'rish</a>
                                        <a class="dropdown-item" href="{{ route('group.edit' , ['group' => $group->id]) }}">O'zgartirish</a>
                                        <form action="{{ route('group.destroy' , ['group' => $group->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="dropdown-item text-danger" href="#!">O'chirish</button>
                                        </form>
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
