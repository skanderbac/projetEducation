@extends("layouts.front")
@section("title")
    Réclamation |
@endsection

@section("contenu")
    <section id="about">
        <div id="container">
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
            <form method="post" action="/reclamationmodifier" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label >Problème</label>
                        <select class="form-control"  name="type">
                            <option value="Probleme dans le site">Probleme dans le site</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea name="description" class="form-control">{{$reclamation->description}}</textarea>
                    </div>
                    <div class="form-group">
                        @if($reclamation->fichier!='')
                            <img src="{{asset('reclamation/'.$reclamation->fichier)}}" style="width: 150px;height: 150px">
                            <br>
                        @endif
                        <label >Vous pouvez charger une photo</label>
                        <input type="file"  name="fichier">
                    </div>
                    <input type="hidden" name="reclamation_id" value="{{$reclamation->id}}">


                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
            <br>
            <a href="/reclamations">Voir mes réclamations</a>
        </div>
    </section>

@endsection
