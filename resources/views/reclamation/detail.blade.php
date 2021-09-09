@extends("layouts.front")
@section("contenu")

    <section id="about">
        <div id="container">
            <br>
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
            @if($reclamation->etat==1)
                <h5 class="mt-5 text-muted">La réponse</h5>
                <p class="text-muted">{{$reclamation->reponse}}</p>
            @endif
        </div>
    </section>



@endsection
