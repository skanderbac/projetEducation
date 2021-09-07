@extends("layouts.master")
@section("title")
    Cours
@endsection
@section("page")
    Cours
@endsection
@section("contenu")
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-body">
                @foreach($cours as $c)
                <form method="post" action="{{route('matieres.cours.update.admin',['cours'=>$c->id])}}">
                    @csrf
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" value="{{$c->id}}" name="cours_id">
                        <input type="hidden" value="{{$c->matiere_bac_id}}" name="matiere_bac_id">
                        <div class="form-group">
                            <label >Nom de Cours</label>
                            <input class="form-control" value="{{$c->titre}}" name="titre" required>
                        </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
    </div>


@endsection
