@extends("layouts.master")
@section("title")
    @foreach($bac as $b)
        {{$b->nom}}
    @endforeach
@endsection
@section("page")
    @foreach($bac as $b)
        {{$b->nom}}
    @endforeach
@endsection
@section("contenu")
    <div class="container-fluid">
        <div class="card card-default color-palette-box">
            <div class="card-body">
                <form method="post" action="/bacStore">
                    @csrf
                    <div class="form-group">
                        @foreach($bac as $b)
                            <label>Bac {{$b->nom}}</label>

                        @endforeach
                            <input type="hidden" value="{{$bac_id}}" name="bac_id">
                    </div>
                    <div class="form-group">
                        <label >Matiere</label>
                        <select class="form-control"  name="matiere_id">
                            @foreach($matieres as $m)
                                <option value="{{$m->id}}">{{$m->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>


@endsection
