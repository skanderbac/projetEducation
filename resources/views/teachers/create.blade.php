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
    <form method="post" action="{{route('teachers.store')}}">
        @csrf
        <div class="form-group">
            <label >Nom</label>
            <input type="text" class="form-control"  placeholder="Nom" name="name">
        </div>
        <div class="form-group">
            <label >Email</label>
            <input type="email" class="form-control"  placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control"  placeholder="Mot de passe" name="password">
            <input type="hidden" value="Enseignant" name="role">
        </div>
        <div class="form-group">
            <label >Matiere</label>
            <select class="form-control"  name="matiere_id">
                @foreach($matiere as $b)
                    <option value="{{$b->id}}">{{$b->nom}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    <a href="{{route('teachers')}}">Voir la liste des enseignants</a>
@endsection
