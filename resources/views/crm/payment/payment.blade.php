<link rel="stylesheet" href="{{asset('assets/css/loader.css')}}">
<x-main>
<div class="loader-container">
    <div class="loader_all"></div>
</div>
   <div class="container mt-5">
       <h4 class="text-center mb-3">Oy uchun to'lovni ro‘yxatlash</h4>
       @foreach($months as $month)
       <div class="card mb-3">
           <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div> <!--/.bg-holder-->
           <div class="card-body position-relative">
               <div class="row">
                   <div class="col-lg-8">
                       <h3> {{ $month->month }}</h3>
                       <h4> {{ $month->year }}</h4>
                       <p class="mt-2">{{ $month->comment }}</p>
                       <p class="placeholder-glow" style="width: 300px">
                           <span class="placeholder col-12"></span>
                       </p>
                       <div style="display: none" id="hide-link">
                       <a class="btn btn-link ps-0 btn-sm" type="submit" href="{{ route('payment.show', ['payment' => $month->id]) }}"  id="loader-link"  >Ro‘yxatga kirish <i class="far fa-eye"></i><span class="fas fa-chevron-right ms-1 fs--2"></span></a>
                       </div>
                       <a href="{{ route('payment.create' , ['id' => $month->id]) }}" style="position: absolute; right: 15px; bottom: 10px; "  class="btn btn-primary" type="button"><i class="fas fa-plus"></i></a>

                   </div>
               </div>
           </div>
       </div>
       @endforeach
   </div>
    <div class="loader" id="page-loader">
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
    .loader_all {
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
<script >
    document.addEventListener('DOMContentLoaded', () => {
        const links = document.querySelectorAll('#hide-link');
        const placeholders = document.querySelectorAll('.placeholder')
        // Initially hide all links
        links.forEach((link) => {
            link.style.display = 'none';
        });


        // Show each link after a delay (e.g., 2000 milliseconds or 2 seconds)
        links.forEach((link, index) => {
            setTimeout(() => {
                link.style.display = 'block';

            }, 2000 * (index + 1));
        });
        placeholders.forEach((placeholder, index) => {
            setTimeout(() => {
                placeholder.style.display = 'none';

            }, 2000 * (index + 1));
        });
    });

</script>
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


    $(document).ready(function () {
        const loader = $(".loader"); // Select the loader element

        // Attach a click event listener to all links
        $("#loader-link").on("click", function (e) {
            loader.show(); // Show the loader when a link is clicked
        });

        // Attach a submit event listener to all forms
        $("form").on("submit", function (e) {
            loader.show(); // Show the loader when a form is submitted
        });

        // Prevent automatic page refresh when navigating back
        window.onpopstate = function (event) {
            // Do nothing or handle the back button behavior as needed
            // This prevents the default behavior of the back button
        };
    });

</script>
