@extends("layouts.master")
@section("contenu")
    <p>Listes des etudiants</p>
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
    @endif
    <table class="table">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Bac</th>
        </tr>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$student->nom}}</td>
                <td>{{$student->prenom}}</td>
                <td>{{$student->bac->nom}}</td>
                <td><a href="{{route('students.edit',['student'=>$student->id])}}" class="btn btn-info">Modifier</a></td>
                <td><a href="#" class="btn btn-dark" onclick="if(confirm('Voulez vous supprimer cet etudiant ?')){document.getElementById('form-{{$student->id}}').submit()}">Supprimer</a></td>
                    <form id="form-{{$student->id}}" method="post" action="{{route('students.delete',['student'=>$student->id])}}">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                    </form>

            </tr>
            @endforeach
        </tbody>
        {{$students->links()}}
    </table>
    <a href="{{route('students.create')}}">Ajouter un nouveau étudiant</a>
@endsection
