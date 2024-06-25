<x-main>

    <div class="container mt-5">
        <h3 class="text-center mb-3 ">O'quvchini guruhga qo'shish</h3>
        <p class="text-danger">Har bir bo'limni to'ldirishingizni suraymiz!</p>
        <p class="m-3">Guruh:<b>{{ $group->name }}</b></p>
        <form action="{{ route('connection.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $group->id }}" name="group_id">
        <label for="organizerMultiple">Multiple</label><select class="form-select js-choice" id="organizerMultiple" multiple="multiple" size="1" name="users[]" data-options='{"removeItemButton":true,"placeholder":true}'>
          <option></option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{$user->lastname. ' '. $user->name . ' Tel:'. $user->phone }}</option>
            @endforeach
        </select>
            @error('users')
            <p class="text-danger">To'ldirish shart</p>
            @enderror
            <div class="form-check"><input class="form-check-input" name="status" id="flexCheckChecked" type="checkbox" value="1" checked="" /><label class="form-check-label" for="flexCheckChecked">Checked checkbox</label></div>

            <center><button class="btn btn-primary me-1 mb-1" type="submit">Saqlash</button></center>

        </form>
    </div>
</x-main>
