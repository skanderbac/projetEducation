@extends("layouts.master")
@section("title")
    Cours
@endsection
@section("page")
    @foreach($bac as $b)
        Bac {{$b->nom}} :
    @endforeach
    @foreach($matiere as $m)
        {{$m->nom}}
    @endforeach
@endsection
@section("contenu")
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-body">
                <form method="post" action="/admincourscreate">
                    @csrf
                    <input type="hidden" value="{{$matiere_bac_id}}" name="matiere_bac_id">
                    <div class="form-group">
                        <label >Nom de Cours</label>
                        <input class="form-control" name="titre" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>


@endsection
