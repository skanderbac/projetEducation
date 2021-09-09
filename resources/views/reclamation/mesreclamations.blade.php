@extends("layouts.front")
@section("title")
    Réclamations |
@endsection

@section("contenu")
    <section id="about">
        <div id="container">

            <p>Mes Réclamations</p>
            @if(session()->has("success"))
                <div class="alert alert-success">
                    {{session()->get("success")}}
                </div>
            @endif
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Etat</th>
                    <th>Date de création</th>
                </tr>
                <tbody>
                @foreach($reclamations as $r)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$r->type}}</td>
                        <td>{{$r->description}}</td>
                        @if($r->etat==0)
                            <td>Non traité</td>
                        @else
                            <td>traité</td>
                        @endif
                        <td>{{$r->created_at}}</td>
                        @if($r->etat==0)
                            <td><a href="/reclamations/update/{{$r->id}}" class="btn btn-info">Modifier</a></td>
                            <td><a href="javascript:void(0)" class="btn btn-dark" onclick="if(confirm('Voulez vous supprimer cette réclamation ?')){document.getElementById('form-rec{{$r->id}}').submit()}">Supprimer</a></td>
                            <form id="form-rec{{$r->id}}" method="post" action="/reclamationsupprimer">
                                @csrf
                                <input type="hidden" name="reclamation_id" value="{{$r->id}}">
                            </form>
                        @else
                            <td><a href="/reclamations/detail/{{$r->id}}" class="btn btn-info">Voir détailles</a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="/reclamations/create">Passer une réclamation</a>

        </div>
    </section>
@endsection
