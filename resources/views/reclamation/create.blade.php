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
    <form method="post" action="ajouter">
        @csrf
        <div class="form-group">
            <label >Problème</label>
            <select class="form-control"  name="bac_id">
                <option value="">Probleme dans le site</option>
            </select>
        </div>
        <div class="form-group">
            <label >Description</label>
            <textarea class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label >Vous pouvez charger une photo</label>
            <input type="file" >
        </div>
        <button type="submit" class="btn btn-primary">Passer</button>
    </form>
    <a href="#">Voir mes réclamations</a>
@endsection
