<x-main>
    <div class="table-responsive scrollbar mt-5">
        <h3 class="text-center">Oy</h3>
        <a href="{{ route('month_create') }}" type="button" class="btn btn-primary col-lg-2 m-2">Yangi oy +</a>

        <table class="table table-hover table-striped overflow-hidden">
            <thead>
            <tr>
                <th class="sort" data-sort="id">№</th>
                <th scope="col">Oy</th>
                <th scope="col">Yil</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($months as $month)
                <tr class="align-middle">
                    <td class="id">{{ $loop->index +1 }}</td>
                    <td class="text-nowrap">{{ $month->month }}</td>
                    <td class="text-end"> <center>{{ $month->year }}</center></td>
                    @if($month->status === 1)
                        <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-success">Active<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span></td>
                    @else
                        <td class="align-middle text-end fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-secondary">NoActive<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span></td>
                    @endif
                    <td class="align-middle white-space-nowrap py-2 text-end">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-24" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-24">
                                <div class="py-2">
                                    <a class="dropdown-item" href="{{ route('month.show' , ['month' => $month->id]) }}">Ko'rish</a>
                                    <a class="dropdown-item" href="{{ route('month.edit' , ['month' => $month->id]) }}">O'zgartirish</a>
{{--                                                                    <form action="{{ route('month.destroy' , ['month' => $month->id]) }}" onclick="return confirm('O\'chirishni istaysizmi')" method="POST">--}}
{{--                                                                        @method('DELETE')--}}
{{--                                                                        @csrf--}}
{{--                                                                        <button class="dropdown-item text-danger" href="#!">O'chirish</button>--}}
{{--                                                                    </form>--}}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-main>

