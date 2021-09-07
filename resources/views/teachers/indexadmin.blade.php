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
            <th>Etat</th>
        </tr>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$teacher->user->name}}</td>
                <td>{{$teacher->matiere->nom}}</td>
                <td>{{$teacher->user->email}}</td>
                @if($teacher->confirmed==0)
                    <td>N'est pas confirmé(e)</td>
                    <td>
                        <form method="post" action="{{route('teachers.confirm.admin')}}">
                            @csrf
                            <input type="hidden" value="{{$teacher->id}}" name="teacher_id">
                            <button type="submit" class="btn btn-info">Confirmer</button>
                        </form>
                    </td>
                @else
                    <td>confirmé(e)</td>
                @endif


                <td><a href="javascript:void(0)" class="btn btn-dark" onclick="if(confirm('Voulez vous supprimer cet enseignant ?')){document.getElementById('form-{{$teacher->id}}').submit()}">Supprimer</a></td>
                <form id="form-{{$teacher->id}}" method="post" action="{{route('teachers.delete.admin')}}">
                    @csrf
                    <input type="hidden" value="{{$teacher->id}}" name="teacher_id">
                </form>

            </tr>
        @endforeach
        </tbody>
        {{$teachers->links()}}
    </table>
@endsection
