@extends("layouts.master")
@section("title")
    Réclamations
@endsection
@section("page")
    Réclamations
@endsection
@section("contenu")
    <p>Mes Réclamations</p>
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
    @endif
    <table class="table">
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Description</th>
            <th>Etat</th>
            <th>Date de création</th>
        </tr>
        <tbody>

        <tr>
            <td>1</td>
            <td>Probleme dans le site</td>
            <td>Je ne peut pas acceder au chat</td>
            <td>Non traité</td>
            <td>23/08/2021</td>
            <td><a href="modifier" class="btn btn-info">Modifier</a></td>
            <td><a href="#" class="btn btn-dark" onclick="if(confirm('Voulez vous supprimer cet etudiant ?')){document.getElementById('form-recid').submit()}">Supprimer</a></td>
            <form id="form-recid" method="post" action="supprimerRec">
                @csrf
                <input type="hidden" name="_method" value="delete">
            </form>
        </tr>
        </tbody>
    </table>
    <a href="">Passer une réclamation</a>
@endsection
