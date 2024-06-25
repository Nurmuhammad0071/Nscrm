<x-main>
    <div class="container mt-5">
        <h4 class="text-center mb-5 ">Guruhlarga o'quvchi qo'shish</h4>
        <div class="col-lg-12">
        <div class="row">
            @foreach($groups as $group)
            <div class="col-sm-6 col-lg-4 mb-4" >
                <div class="card border h-100  @if($group->status === 0) bg-danger   @endif border-dark" style="position: relative">
                    <div class="card-body">
                        <div class="card-title">{{ $group->name }}</div>
                        <p class="card-text mb-5"> O'qituvchi:<b>{{ $group->teacher->name}}</b>, Kurs:<b>{{ $group->course->name }} </b></p>
                        <a href="{{ route('connection_create' , ['id' => $group->id]) }}" style="position: absolute;right: 5px; bottom: 10px; @if($group->status === 0) display:none; @endif" class="btn btn-primary " type="button">+</a>
                        <a href="{{ route('connection.show', ['connection' => $group->id]) }}" style="position: absolute; right: 45px; bottom: 10px; "  class="btn btn-primary" type="button"><i class="far fa-eye"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</x-main>
