@extends("layouts.master")
@section("title")
    Enseignants
@endsection
@section("page")
    Enseignants
@endsection
@section("contenu")
    <p>Listes des enseignants</p>
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
    @endif
    <table class="table">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Matiere</th>
            <th>Email</th>
            <th>Mot de passe</th>
        </tr>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$teacher->user->name}}</td>
                <td>{{$teacher->matiere->nom}}</td>
                <td>{{$teacher->user->email}}</td>
                <td>*****</td>
                <td><a href="#" class="btn btn-success">Voir les cours</a></td>
                <td><a href="{{route('teachers.edit',['enseignant'=>$teacher->id])}}" class="btn btn-info">Modifier</a></td>
                <td><a href="#" class="btn btn-dark" onclick="if(confirm('Voulez vous supprimer cet enseignant ?')){document.getElementById('form-{{$teacher->id}}').submit()}">Supprimer</a></td>
                <form id="form-{{$teacher->id}}" method="post" action="{{route('teachers.delete',['enseignant'=>$teacher->id])}}">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                </form>

            </tr>
        @endforeach
        </tbody>
        {{$teachers->links()}}
    </table>
    <a href="{{route('teachers.create')}}">Ajouter un nouveau enseignant</a>
@endsection
