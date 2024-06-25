<x-main>
    <div class="container mt-5">
        <a href="{{ route('connection') }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Ortga<i class="fas fa-backward"></i></a>

        <div id="tableExample3" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
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
                        <th class="sort" data-sort="name">Ism</th>
                        <th class="sort" data-sort="email">Telefon raqami</th>
                        <th class="sort" data-sort="age">Yosh</th>
                        <th class="sort"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                        @foreach($connectedUsers as $user)
                            <tr>
                                <td class="name">{{ $user->lastname.' '. $user->name .' '.$user->patronymic }}</td>
                                <td class="email">{{ $user->phone }}</td>
                                <td class="age">{{ $user->age }}</td>
                                <td class="align-middle white-space-nowrap py-2 text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-24" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-24">
                                            <div class="py-2">

                                                <form action="{{ route('connection.destroyConnection', ['user_id' => $user->id, 'group_id' => $group->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">
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
    </div>
</x-main>
