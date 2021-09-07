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
                <table class="table">
                    <tr>
                        <th>Cours</th>
                    </tr>
                    <tbody>
                    @foreach($cours as $c)
                        <tr>
                            <td>{{$c->titre}}</td>
                            <td><a href="/admin/bac/coursedit/{{$c->id}}" class="btn btn-info">Modifier</a></td>
                            <td><a href="javascript:void(0)" class="btn btn-dark" onclick="if(confirm('Voulez vous supprimer ce cours ?')){document.getElementById('form-{{$c->id}}').submit()}">Supprimer</a></td>
                            <form id="form-{{$c->id}}" method="post" action="{{route('matieres.cours.delete.admin',['cours'=>$c->id,'matiere_bac_id'=>$matiere_bac_id])}}">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="/admin/bac/cours/{{$matiere_bac_id}}">Ajouter un Cours</a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>


@endsection
