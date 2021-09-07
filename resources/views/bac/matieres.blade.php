@extends("layouts.master")
@section("title")
    @foreach($bac as $b)
        Bac {{$b->nom}}
    @endforeach
@endsection
@section("page")
    @foreach($bac as $b)
        Bac {{$b->nom}}
    @endforeach
@endsection
@section("contenu")
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
    @endif
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Matiere</th>
                    </tr>
                    <tbody>
                    @foreach($matieres as $m)
                        <tr>
                            <td>{{$m->nom}}</td>
                            <td><a href="/admin/bac/matieres/{{$m->id}}" >Voir les cours</a></td>
                            <td><a href="javascript:void(0)" class="btn btn-dark" onclick="if(confirm('Voulez vous supprimer cette matiere ?')){document.getElementById('form-{{$m->id}}').submit()}">Supprimer</a></td>
                            <form id="form-{{$m->id}}" method="post" action="{{route('bac.matieres.delete.admin',['matiere_bac_id'=>$m->id,'bac_id'=>$id])}}">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="/admin/bac/matiere/add/{{$id}}">Ajouter une autre matiere</a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>


@endsection
