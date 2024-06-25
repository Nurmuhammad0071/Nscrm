<x-main>
    <div   style="background: white; margin: 10px 0px;display: flex;justify-content: right">
        <a href="{{ route('chart') }}"  style="margin-right: 30px"><i class="far fa-chart-bar"></i> Hammasi <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="col-lg-12 ps-lg-2 mb-3" style="width: 50%;display: flex">
        <canvas id="paymentChart" width="200" height="200"></canvas>
        <canvas id="UserChart" width="200" height="200"></canvas>

    </div>




{{--    #########################################--}}
    <div class="card mb-3">
        <div class="card-body px-xxl-0 pt-4">
            <div class="row g-0">
                <div
                    class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-xxl-0 pb-3 p-xxl-0 ps-md-0">
                    <div class="icon-circle icon-circle-primary"><span
                            class="fs-2 fas fa-user-graduate text-primary"></span></div>
                    <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2"
                                                           data-countup='{"endValue":"4968"}'>{{$totalUsers}}</span><span class="fw-normal text-600">O'quvcilar</span></h4>
                    <p class="fs--1 fw-semi-bold mb-0"> {{$current}}<span class="text-600 fw-normal"> yangi</span></p>
                </div>
                <div
                    class="col-xxl-3 col-md-6 px-3 text-center border-end-xxl border-bottom border-bottom-xxl-0 pb-3 pt-4 pt-md-0 pe-md-0 p-xxl-0">
                    <div class="icon-circle icon-circle-info"><span class="fs-2 fas fa-chalkboard-teacher text-info"></span>
                    </div>
                    <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2"
                                                           data-countup='{"endValue":"324"}'>{{ $totalTeachers }}</span><span class="fw-normal text-600">New Trainers</span></h4>
                    <p class="fs--1 fw-semi-bold mb-0">{{ $newTeacher }} <span class="text-600 fw-normal">yangi</span></p>
                </div>
                <div
                    class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-md-0 pb-3 pt-4 p-xxl-0 pb-md-0 ps-md-0">
                    <div class="icon-circle icon-circle-success"><span class="fs-2 fas fa-book-open text-success"></span>
                    </div>
                    <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2"
                                                           data-countup='{"endValue":"3712"}'>{{ $totalCourses }}</span><span class="fw-normal text-600">New Courses</span></h4>
                    <p class="fs--1 fw-semi-bold mb-0">{{ $newCourse }} <span class="text-600 fw-normal">yangi</span></p>
                </div>
                <div class="col-xxl-3 col-md-6 px-3 text-center pt-4 p-xxl-0 pb-0 pe-md-0">
                    {{--                    MOdal--}}
                    <button class="btn btn-primary position-absolute" type="button" data-bs-toggle="modal" style="right: 30px"  data-bs-target="#error-modal">-</button>
                    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                            <div class="modal-content position-relative">
                                <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-0">
                                    <div class="rounded-top-3 py-3 ps-4 pe-6 bg-light">
                                        <h4 class="mb-1" id="modalExampleDemoLabel">Add a new illustration </h4>
                                    </div>
                                    <form action="{{ route('total.store') }}" method="POST">
                                        @csrf
                                    <div class="p-4 pb-0">

                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Recipient:</label>
                                                <input class="form-control" id="recipient-name" oninput="formatNumbers(this)" name="pay" type="text" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="message-text">Message:</label>
                                                <textarea required class="form-control" name="comment" id="message-text"></textarea>
                                            </div>

                                    </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit">Understood </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{--                    MOdal--}}
                    <div class="icon-circle icon-circle-warning"><span class="fs-2 fas fa-dollar-sign text-warning"></span>
                    </div>
                    <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2"
                                                           data-countup='{"endValue":"1054"}' id="number1">{{ $totalPayment }}</span><span class="fw-normal text-600">so'm</span></h4>
                    <a href="{{ route('ipayment') }}" class="fs--1 fw-semi-bold mb-0">Oylik Hisobot...</a><br>
                    <a href="{{ route('ipayment') }}" class="fs--1 fw-semi-bold mb-0">Kassa...</a>
                </div>
            </div>
        </div>
    </div>
{{--    --}}
    <div class="card overflow-hidden mb-3">
        <div class="card-header p-0 scrollbar">
            <ul class="nav nav-tabs border-0 top-courses-tab flex-nowrap" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link p-x1 mb-0 active" role="tab" id="popularPaid-tab" data-bs-toggle="tab" href="#popularPaid" aria-controls="popularPaid" aria-selected="false">
                        <div class="d-flex gap-1 py-1 pe-3">
                            <div class="d-flex flex-column flex-between-center"><span class="fas fa-crown fs--2 text-warning" data-fa-transform="shrink-4"></span><span class="mt-auto fas fa-fire fs-2"></span></div>
                            <div class="ms-2">
                                <h6 class="mb-1 text-700 fs--2 text-nowrap">Kirim chiqim</h6>
                                <h5 class="mb-0 lh-1">Manitoring</h5>
                            </div>
                        </div>
                    </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link p-x1 mb-0 false" role="tab" id="popularFree-tab" data-bs-toggle="tab" href="#popularFree" aria-controls="popularFree" aria-selected="true">
                        <div class="d-flex gap-1 py-1 pe-3">
                            <div class="d-flex flex-column flex-between-center"><span class="mt-auto fas fa-fire fs-2"></span></div>
                            <div class="ms-2">
                                <h6 class="mb-1 text-700 fs--2 text-nowrap">Most Popular</h6>
                                <h5 class="mb-0 lh-1">Free</h5>
                            </div>
                        </div>
                    </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link p-x1 mb-0 false" role="tab" id="topPaid-tab" data-bs-toggle="tab" href="#topPaid" aria-controls="topPaid" aria-selected="false">
                        <div class="d-flex gap-1 py-1 pe-3">
                            <div class="d-flex flex-column flex-between-center"><span class="fas fa-crown fs--2 text-warning" data-fa-transform="shrink-4"></span><span class="mt-auto fas fa-star fs-2"></span></div>
                            <div class="ms-2">
                                <h6 class="mb-1 text-700 fs--2 text-nowrap">Top Rated</h6>
                                <h5 class="mb-0 lh-1">Paid</h5>
                            </div>
                        </div>
                    </a></li>
                <li class="nav-item" role="presentation"><a class="nav-link p-x1 mb-0 false" role="tab" id="topFree-tab" data-bs-toggle="tab" href="#topFree" aria-controls="topFree" aria-selected="false">
                        <div class="d-flex gap-1 py-1 pe-3">
                            <div class="d-flex flex-column flex-between-center"><span class="mt-auto fas fa-star fs-2"></span></div>
                            <div class="ms-2">
                                <h6 class="mb-1 text-700 fs--2 text-nowrap">Top Rated</h6>
                                <h5 class="mb-0 lh-1">Admins</h5>
                            </div>
                        </div>
                    </a></li>
            </ul>
        </div>
        <div class="card-body p-0">
            <div class="tab-content">
                <div class="tab-pane active" id="popularPaid" role="tabpanel" aria-labelledby="popularPaid-tab">
                    <div class="z-1" id="popularPaidCourses" data-list='{"valueNames":["title","name","published","enrolled","price"],"page":4}'>
                        <div class="px-0 py-0">
                            <div class="table-responsive scrollbar">
                                <table class="table fs--1 mb-0 overflow-hidden">
                                    <thead class="bg-light text-900">
                                    <tr class="font-sans-serif">
                                        <th class="fw-medium sort pe-1 align-middle" data-sort="title">Izoh</th>

                                        <th class="fw-medium sort pe-1 align-middle text-end text-end" data-sort="price">Olindi</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end text-end" data-sort="price">Qo'shildi</th>
                                        <th class="fw-medium no-sort pe-1 align-middle data-table-row-action"></th>

                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach($totals as $total)
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title">{{ $total->comment }}</td>

                                        <td class="align-middle white-space-nowrap text-end" ><span id="number">{{ $total->pay }}</span> so'm</td>
                                        <td class="align-middle white-space-nowrap text-end" ><span id="number">{{ $total->add }}</span> so'm</td>
                                        <td><a href="{{ route('cashbox') }}">All <i class="fas fa-arrow-right"></i></a></td>
                                    </tr>
                                    @endforeach


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="popularFree" role="tabpanel" aria-labelledby="popularFree-tab">
                    <div class="z-1" id="popularFreeCourses" data-list='{"valueNames":["title","name","published","enrolled","price"],"page":4}'>
                        <div class="px-0 py-0">
                            <div class="table-responsive scrollbar">
                                <table class="table fs--1 mb-0 overflow-hidden">
                                    <thead class="bg-light text-900">
                                    <tr class="font-sans-serif">
                                        <th class="fw-medium sort pe-1 align-middle" data-sort="title">Course Title</th>
                                        <th class="fw-medium sort pe-1 align-middle" data-sort="name">Trainer</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end" data-sort="published">Published on</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end" data-sort="enrolled">Enrolled</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end text-end" data-sort="price">Price</th>
                                        <th class="fw-medium no-sort pe-1 align-middle data-table-row-action"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">Script Writing Masterclass: Introdution to Industry Cliches</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bill finger</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">31/08/21</td>
                                        <td class="align-middle text-end enrolled">92,632</td>
                                        <td class="align-middle text-end price">$69.50</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-popularFreeCourses-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-popularFreeCourses-1"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">Composition in Comics: Easy to Read Between Panels</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bill finger</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">14/05/21</td>
                                        <td class="align-middle text-end enrolled">92,603</td>
                                        <td class="align-middle text-end price">$39.50</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-popularFreeCourses-2" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-popularFreeCourses-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">Comic Page Layout: Analysing The Classics</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bill finger</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">09/06/21</td>
                                        <td class="align-middle text-end enrolled">32,106</td>
                                        <td class="align-middle text-end price">$49.50</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-popularFreeCourses-3" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-popularFreeCourses-3"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">Inking: Choosing Between Analog vs Digital</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bill finger</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">09/06/21</td>
                                        <td class="align-middle text-end enrolled">9,312</td>
                                        <td class="align-middle text-end price">$39.99</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-popularFreeCourses-4" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-popularFreeCourses-4"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="topPaid" role="tabpanel" aria-labelledby="topPaid-tab">
                    <div class="z-1" id="topPaidCourses" data-list='{"valueNames":["title","name","published","enrolled","price"],"page":4}'>
                        <div class="px-0 py-0">
                            <div class="table-responsive scrollbar">
                                <table class="table fs--1 mb-0 overflow-hidden">
                                    <thead class="bg-light text-900">
                                    <tr class="font-sans-serif">
                                        <th class="fw-medium sort pe-1 align-middle" data-sort="title">Course Title</th>
                                        <th class="fw-medium sort pe-1 align-middle" data-sort="name">Trainer</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end" data-sort="published">Published on</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end" data-sort="enrolled">Enrolled</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end text-end" data-sort="price">Price</th>
                                        <th class="fw-medium no-sort pe-1 align-middle data-table-row-action"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">Character Art School: Character Drawing Course</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bruce Timm</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">01/09/21</td>
                                        <td class="align-middle text-end enrolled">3,625</td>
                                        <td class="align-middle text-end price">$65.99</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-topPaidCourses-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-topPaidCourses-1"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">User Experience Design Essentials</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bill finger</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">15/12/21</td>
                                        <td class="align-middle text-end enrolled">1,202</td>
                                        <td class="align-middle text-end price">$25.20</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-topPaidCourses-2" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-topPaidCourses-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">The Art &amp; Science of Drawing</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">J. H. Williams III</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">03/09/21</td>
                                        <td class="align-middle text-end enrolled">35,666</td>
                                        <td class="align-middle text-end price">$45.49</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-topPaidCourses-3" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-topPaidCourses-3"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">Abstract Painting: One-to-One</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bill finger</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">03/09/21</td>
                                        <td class="align-middle text-end enrolled">6,356</td>
                                        <td class="align-middle text-end price">$20.49</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-topPaidCourses-4" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-topPaidCourses-4"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="topFree" role="tabpanel" aria-labelledby="topFree-tab">
                    <div class="z-1" id="topFreeCourses" data-list='{"valueNames":["title","name","published","enrolled","price"],"page":4}'>
                        <div class="px-0 py-0">
                            <div class="table-responsive scrollbar">
                                <table class="table fs--1 mb-0 overflow-hidden">
                                    <thead class="bg-light text-900">
                                    <tr class="font-sans-serif">
                                        <th class="fw-medium sort pe-1 align-middle" data-sort="title">Course Title</th>
                                        <th class="fw-medium sort pe-1 align-middle" data-sort="name">Trainer</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end" data-sort="published">Published on</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end" data-sort="enrolled">Enrolled</th>
                                        <th class="fw-medium sort pe-1 align-middle text-end text-end" data-sort="price">Price</th>
                                        <th class="fw-medium no-sort pe-1 align-middle data-table-row-action"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">Portrait Drawing Fundamentals Made Simple</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bill finger</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">05/10/20</td>
                                        <td class="align-middle text-end enrolled">10,356</td>
                                        <td class="align-middle text-end price">$36.49</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-topFreeCourses-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-topFreeCourses-1"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">Anatomy for Figure Drawing</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">J. H. Williams</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">26/10/20</td>
                                        <td class="align-middle text-end enrolled">12,386</td>
                                        <td class="align-middle text-end price">$30.99</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-topFreeCourses-2" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-topFreeCourses-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">Complete Perspective Drawing Course</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bruce Timm</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">26/09/21</td>
                                        <td class="align-middle text-end enrolled">6,757</td>
                                        <td class="align-middle text-end price">$23.99</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-topFreeCourses-3" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-topFreeCourses-3"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger fw-semi-bold">
                                        <td class="align-middle white-space-nowrap title"><a href="../app/e-learning/course/course-details.html">The Ultimate Animal Drawing Course</a></td>
                                        <td class="align-middle text-nowrap name"><a class="text-800" href="../app/e-learning/trainer-profile.html">Bruce Timm</a></td>
                                        <td class="align-middle white-space-nowrap text-end published">06/12/21</td>
                                        <td class="align-middle text-end enrolled">7,658</td>
                                        <td class="align-middle text-end price">$19.99</td>
                                        <td class="align-middle white-space-nowrap text-end">
                                            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-topFreeCourses-4" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-topFreeCourses-4"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light py-2">
            <div class="row flex-between-center g-0">

                <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="../app/e-learning/course/course-list.html">All Courses<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
            </div>
        </div>
    </div>

{{--    --}}

</x-main>
<script>
    const elements = document.querySelectorAll('[id^="number"]');
    elements.forEach(element => {
        let number = element.innerText.trim();
        let formattedNumber = number.replace(/(\d)(?=(\d{3})+$)/g, '$1 ');
        element.innerText = formattedNumber;
    });
</script>

<script>
    function formatNumbers(input) {
// Get the input value
        let inputValue = input.value;

// Remove any non-digit characters
        inputValue = inputValue.replace(/\D/g, '');

// Check if the input value is empty
        if (inputValue.length === 0) {
            document.getElementById('errorText').textContent = 'Please enter a valid number.';
        } else {
// Format the number with spaces
            inputValue = inputValue.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1 ');

// Update the input value
            input.value = inputValue;

// Clear the error message
            document.getElementById('errorText').textContent = '';
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const monthlyPayments = @json($monthlyPayments);
        console.log(monthlyPayments)
        var ctx = document.getElementById('paymentChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Object.keys(monthlyPayments),
                datasets: [{
                    label: 'Monthly Payments',
                    data: Object.values(monthlyPayments),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const monthlyPayments = @json($monthlyUserCounts);
        console.log(monthlyPayments)
        var ctx = document.getElementById('UserChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Object.keys(monthlyPayments),
                datasets: [{
                    label: 'Monthly Payments',
                    data: Object.values(monthlyPayments),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
