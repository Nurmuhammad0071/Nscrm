<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
<x-main>

    <div class="container mt-5">
        <h3 class="text-center mb-3 ">Oy qo'shish</h3>
        <p class="text-danger">Har bir bo'limni to'ldirishingizni suraymiz!</p>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" id="info-form" action="{{ route('month.store') }}"  enctype="multipart/form-data">

            @csrf

            <div class="form-floating mt-3 mb-3">
                <input name="month" value="{{ old('month') }}" class="form-control @error('month') is-invalid @enderror" id="floatingInput" type="text" placeholder="Ism" /><label for="floatingInput">Oy</label>
                @error('month')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input value="{{old('year')}}" name="year" class="form-control  @error('year') is-invalid @enderror" id="floatingInput" type="text" placeholder="Yil" /><label for="floatingInput">Yil</label>
                @error('year')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input value="{{old('comment')}}" name="comment" class="form-control " id="floatingInput" type="text" placeholder="Sharif" /><label for="floatingInput">Izoh</label></div>
            <div class="form-check"><input class="form-check-input" id="flexCheckChecked" type="checkbox" value="1" name="status" checked="" /><label class="form-check-label" for="flexCheckChecked">Status</label></div>

            <center><button      class="btn btn-primary" type="submit">Saqlash</button></center>
        </form>
        <!-- Loader -->
        <div id="loader" class="loader">
            <div class="loader_coffee">
                <div class="loader_container">
                    <div class="coffee-header">
                        <div class="coffee-header__buttons coffee-header__button-one"></div>
                        <div class="coffee-header__buttons coffee-header__button-two"></div>
                        <div class="coffee-header__display"></div>
                        <div class="coffee-header__details"></div>
                    </div>
                    <div class="coffee-medium">
                        <div class="coffe-medium__exit"></div>
                        <div class="coffee-medium__arm"></div>
                        <div class="coffee-medium__liquid"></div>
                        <div class="coffee-medium__smoke coffee-medium__smoke-one"></div>
                        <div class="coffee-medium__smoke coffee-medium__smoke-two"></div>
                        <div class="coffee-medium__smoke coffee-medium__smoke-three"></div>
                        <div class="coffee-medium__smoke coffee-medium__smoke-for"></div>
                        <div class="coffee-medium__cup"></div>
                    </div>
                    <div class="coffee-footer"></div>
                </div>
            </div>
            <h4 class="h4">Iltimos kuting bu bir necha daqiqani olishi munkun</h4>
        </div>
    </div>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const form = $("#info-form");
            const loader = $("#loader");

            form.submit(function (e) {
                e.preventDefault(); // Prevent the form from submitting traditionally

                // Hide the loader initially
                loader.hide();

                // Perform an AJAX request
                $.ajax({
                    type: form.attr("method"),
                    url: form.attr("action"),
                    data: form.serialize(),
                    beforeSend: function () {
                        // Show the loader just before sending the request
                        loader.show();
                    },
                    success: function (response) {
                        // Handle the success response (e.g., display a success message)
                        console.log(response);

                        // Hide the loader when the request is complete
                        loader.hide();

                        // Redirect back to the previous page
                        window.history.pushState(null, null, window.location.href);
                        window.location.href = "{{ route('month') }}"; // Replace 'payment' with your actual route name

                    },
                    error: function (error) {
                        // Handle errors if the request fails (e.g., display an error message)
                        console.error(error);

                        // Hide the loader when the request is complete
                        loader.hide();
                    },
                });
            });
            // Detect when the user navigates back to the page and refresh it
            window.onpopstate = function (event) {
                location.reload();
            };
        });
    </script>





</x-main>
