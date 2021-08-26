@extends("layouts.master")
@section("title")
    Cours
@endsection
@section("page")
    Ajouter Un support de cours
@endsection
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
    <form method="post" action="ajouter" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="form-group">
            <label>Bac</label>
            <select class="form-control"  name="bac_id">
                @foreach($bac as $b)
                    <option value="{{$b->id}}">{{$b->nom}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label >Matiére</label>
            <h6>Sciences physiques</h6>
        </div>
        <div class="form-group">
            <label >Cours</label>
            <select class="form-control"  name="cours_id">
                <option value="1">Dipôle RC</option>
            </select>
        </div>
        <div class="form-group">
            <label >Charger les Piéces jointes</label>
            <input id="input-2" name="input2[]" type="file" class="file"  data-show-upload="false" data-show-caption="true" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
