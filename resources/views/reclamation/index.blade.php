@extends("layouts.master")
@section("title")
    Réclamations
@endsection
@section("page")
    Réclamations
@endsection
@section("contenu")
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
    @endif
    <table class="table">
        <tr>
            <th>#</th>
            <th>Utiliateur</th>
            <th>Type</th>
            <th>Description</th>
            <th>Etat</th>
            <th>Date de création</th>
        </tr>
        <tbody>
        @foreach($reclamations as $r)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$r->user->name}} ({{$r->user->role}})</td>
                <td>{{$r->type}}</td>
                <td>{{$r->description}}</td>
                @if($r->etat==0)
                    <td>Non traité</td>
                @else
                    <td>traité</td>
                @endif
                <td>{{$r->created_at}}</td>
                <td><a href="/admin/reclamations/detail/{{$r->id}}" class="btn btn-info">Voir detail</a></td>
                <td><a href="javascript:void(0)" class="btn btn-dark" onclick="if(confirm('Voulez vous supprimer cette réclamation ?')){document.getElementById('form-recid').submit()}">Supprimer</a></td>
                <form id="form-recid" method="post" action="/supprimerRecadmin">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
