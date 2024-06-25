<x-main>
    <!-- Loader container -->
    <!-- Loader container -->
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <div class="container mt-5">
        <a href="{{ route('payment') }}" class="btn btn-falcon-primary me-1 mb-1 mt-5" type="button">Ortga<i class="fas fa-backward"></i></a>

        <div id="tableExample3" data-list='{"valueNames":["name","email","age"],"page":20,"pagination":true}'>
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
                        <th class="sort" data-sort="age">To'lov</th>
                        <th class="sort"></th>
                    </tr>
                    </thead>


                    <tbody class="list">
                        @foreach($connectedUsers as $user)
                            <tr  >

                                <td class="name">{{ $user->lastname.' '. $user->name .' '.$user->patronymic }}</td>
                                <td class="email">{{ $user->phone }}</td>

                                    @php
                                        // Find the payment for the current user and month
                                        $userPayment = $payments->where('user_id', $user->id)->first();
                                    @endphp
                                <td>
                                    @if($userPayment->status === 2)
                                        <a href="{{ route('payments.view', ['payment' => $userPayment->id , 'month' => $userPayment->month_id, 'user' => $userPayment->user_id]) }}" onclick="return confirm('To\'lov tuliq amalga oshirilgan sahifaga kirishga aminmisiz')" class="btn  btn-primary me-1 mb-1" type="button"><i class="far fa-check-circle"></i></a>

                                    @elseif($userPayment->status === 1)
                                        <a href="{{ route('payments.show', ['payment' => $userPayment->id , 'month' => $userPayment->month_id, 'user' => $userPayment->user_id]) }}" class="btn  btn-warning me-1 mb-1" type="button"><i class="far fa-minus-square"></i></a>
                                    @else
                                        <a href="{{ route('payments.show', ['payment' => $userPayment->id , 'month' => $userPayment->month_id, 'user' => $userPayment->user_id]) }}" class="btn  btn-danger me-1 mb-1" type="button"><i class="far fa-times-circle"></i></a>
                                    @endif
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</x-main>
<style>
    /* Loader Container */
    .loader-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Loader */
    .loader {
        border: 4px solid #3498db; /* Loader color */
        border-top: 4px solid transparent;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite; /* Animation name and duration */
    }

    /* Loader Animation */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>
<script>
    // Show the loader
    function showLoader() {
        $('.loader-container').fadeIn();
    }

    // Hide the loader
    function hideLoader() {
        $('.loader-container').fadeOut();
    }

    // This function is called when the page loading is complete
    function pageLoaded() {
        hideLoader();
        // Add any additional logic you want to run when the page is fully loaded here
    }

    // Automatically show the loader when the page starts refreshing
    showLoader();

    // Attach an event listener to the window's onload event
    window.onload = function () {
        // The onload event fires when all page assets (images, scripts, etc.) are loaded
        pageLoaded();
    };

</script>

