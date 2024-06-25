<x-main>
    <div class="container mt-5">
        <h3 class="text-center mb-3 ">Kurs malumotini tahrirlash</h3>
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
        <form method="POST" action="{{ route('course.update' , ['course' => $course->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-floating mt-3 mb-3">
                <input name="name" value="{{ $course->name }}" class="form-control @error('name') is-invalid @enderror" id="floatingInput" type="text" placeholder="Ism" /><label for="floatingInput">Ism</label>
                @error('name')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input  value="{{ $course->info }}" name="info" autocomplete="on" class="form-control" id="floatingInput" type="text" placeholder="Info" /><label for="floatingInput">Info</label></div>
            <div class="form-floating mb-3"><input value="{{ $course->prise}}" name="prise"  oninput="formatNumbers(this)" class="form-control @error('prise') is-invalid @enderror" id="floatingInput" type="text" placeholder="Narxi" /><label for="floatingInput">Narxi</label>
                @error('prise')
                <p class="text-danger">To'ldirish shart va Faqat raqam kriting</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input value="{{ $course->days}}" name="days" class="form-control @error('days') is-invalid @enderror" id="floatingInput" type="number" placeholder="Sharif" /><label for="floatingInput">Bir oyda necha kun?</label>
                @error('days')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-check"><input class="form-check-input" id="flexCheckChecked" type="checkbox" value="1" name="status" checked="" /><label class="form-check-label" for="flexCheckChecked">Checked checkbox</label></div>

            <center><button type="submit" class="btn btn-primary" type="submit">Submit</button></center>
        </form>
    </div>
</x-main>
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
