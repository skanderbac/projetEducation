@extends("layouts.master")
@section("contenu")
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif
    <form method="post" action="{{route('students.update',['student'=>$student->id])}}">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <label >Nom</label>
            <input type="text" class="form-control"  placeholder="Nom" name="nom" value="{{$student->nom}}">
        </div>
        <div class="form-group">
            <label >Prenom</label>
            <input type="text" class="form-control"  placeholder="Prenom" name="prenom" value="{{$student->prenom}}">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
    <a href="{{route('students')}}">Voir la liste des étudiants</a>
@endsection
