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
<form method="post" action="{{route('students.store')}}">
    @csrf
    <div class="form-group">
        <label >Nom</label>
        <input type="text" class="form-control"  placeholder="Nom" name="nom">
    </div>
    <div class="form-group">
        <label >Prenom</label>
        <input type="text" class="form-control"  placeholder="Prenom" name="prenom">
    </div>
    <div class="form-group">
        <label >Email</label>
        <input type="email" class="form-control"  placeholder="Email" name="email">
    </div>
    <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" class="form-control"  placeholder="Mot de passe" name="mdp">
    </div>
    <div class="form-group">
        <label >Bac</label>
        <select class="form-control"  name="bac_id">
            @foreach($bac as $b)
                <option value="{{$b->id}}">{{$b->nom}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<a href="{{route('students')}}">Voir la liste des étudiants</a>
@endsection
