<x-main>
    <div class="container mt-5">
        <h3 class="text-center mb-3 ">Gruh qo'shish</h3>
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
        <form method="POST" action="{{ route('group.update' , ['group' => $group->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-floating mt-3 mb-3">
                <input name="name" value="{{ $group->name }}" class="form-control @error('name') is-invalid @enderror" id="floatingInput" type="text" placeholder="Ism" /><label for="floatingInput">Ism</label>
                @error('name')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input value="{{ $group->level}}" name="level" class="form-control  @error('level') is-invalid @enderror" id="floatingInput" type="text" placeholder="Daraja" /><label for="floatingInput">Daraja</label>
                @error('level')
                <p class="text-danger">To'ldirish shart</p>
                @enderror
            </div>
            <div class="form-floating mb-3"><input  value="{{ $group->asistente }}" name="asistente" autocomplete="on" class="form-control " id="floatingInput" type="text" placeholder="Asistent" /><label for="floatingInput">Asistent</label></div>
            <div class="form-floating mb-3"><input  value="{{ $group->comment }}" name="comment" autocomplete="on" class="form-control " id="floatingInput" type="text" placeholder="Komentariya" /><label for="floatingInput">Komentariya</label></div>
            <div class="form-floating mb-3"><input  value="{{ $group->tg_group }}" name="tg_group" autocomplete="on" class="form-control " id="floatingInput" type="text" placeholder="Telegram gruppa" /><label for="floatingInput">Telegram gruppa</label></div>

            <div class="mb-3"><label for="organizerSingle2">Kurs nomi</label>
                <select class="form-select js-choice " id="organizerSingle2" size="1" required="required" name="course_id" data-options='{"removeItemButton":true,"placeholder":true}'>
                    <option value="{{ $group->course->id }}">{{$group->course->name }}</option>

                    @foreach($resent_course as $course)
                        @if($course->status == 0)
                        @else
                            <option value="{{ $course->id }}">{{ $course->name }}</option>

                        @endif
                    @endforeach
                </select>
                {{--Teacher--}}
                <div class="mb-3"><label for="organizerSingle2">O'qtuvchi</label>
                    <select class="form-select js-choice" id="organizerSingle2" size="1" required="required" name="teacher_id" data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="{{ $group->teacher->id }}">{{ $group->teacher->name }}</option>

                        @foreach($resent_teacher as $teacher)
                            @if($teacher->status == 0)
                            @else
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endif
                        @endforeach

                    </select>

                    <div class="form-check"><input class="form-check-input" id="flexCheckChecked" type="checkbox" value="1" name="status" checked="" /><label class="form-check-label" for="flexCheckChecked">Checked checkbox</label></div>

                    <center><button type="submit" class="btn btn-primary" type="submit">Submit</button></center>
                </div>
            </div>
        </form>

    </div>
</x-main>
