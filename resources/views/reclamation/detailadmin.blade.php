@extends("layouts.master")
@section("contenu")

    <div class="row">
        <div class="col-12">
            @if(session()->has("success"))
                <div class="alert alert-success">
                    {{session()->get("success")}}
                </div>
            @endif


            <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{asset('photos/'.$reclamation->user->photo)}}" >
                <span class="username">
                                            <a href="#">{{$reclamation->user->name}} ({{$reclamation->user->role}})</a>
                                        </span>
            </div>
            <br><br><br>
            <h5 > {{$reclamation->type}}</h5>
            <p class="text-muted">{{$reclamation->description}}</p>
            <br>


            <h5 class="mt-5 text-muted">Piece jointe</h5>
            @if($reclamation->fichier!='')
                <ul class="list-unstyled">
                    <li>
                        <a target="_blank" href="{{asset('reclamation/'.$reclamation->fichier)}}" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Ouvrir le fichier</a>
                    </li>
                </ul>
            @else
                aucune piece jointe
            @endif
            <br><br>
            @if($reclamation->etat==0)
                    <form class="form-horizontal" method="post" action="{{route('reclamation.reponse.admin')}}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="reponse" placeholder="Ecrivez ici..."></textarea>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif
                        <input type="hidden" name="reclamation_id" value="{{$reclamation->id}}">
                        <input type="submit" value="Répondre" class="btn btn-info">
                    </form>
            @else
                    <h5 class="mt-5 text-muted">votre réponse</h5>
                    <p class="text-muted">{{$reclamation->reponse}}</p>
            @endif
        </div>
    </div>



@endsection
