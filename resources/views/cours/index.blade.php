@extends("layouts.front")
@section("title")
    Bac Mathématiques
@endsection
@section("page")
    Bac Mathématiques
@endsection
@section("contenu")
    <section id="about">
        <div class="container">
            <div class="row">
                @if(session()->has("success"))
                    <div class="alert alert-success">
                        {{session()->get("success")}}
                    </div>
                @endif
                <div class="container-fluid">
                    <!-- COLOR PALETTE -->
                    <div class="card card-default color-palette-box">
                        <div class="card-header">
                            <h2 class="card-title">

                                @foreach($matiere as $m)
                                    {{$m->nom}}
                                @endforeach
                            </h2>
                        </div>


                        <div class="card-body">
                            @foreach($cours as $c)
                                <div class="col-12">
                                    <br>
                                    <h4>{{$c->titre}}</h4>
                                    <br>
                                </div>
                                <div class="row">
                                    @foreach($c->supports as $s)
                                        <div class="col-sm-3">
                                            <div class="position-relative p-3 bg-green" style="height: 180px">
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon bg-primary">
                                                        {{$s->note}}/5
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-{{$s->teacher->user->id}}">Mr/Mme{{" ".$s->teacher->user->name}}</a><br><br>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-lg{{$s->id}}"><small>Cliquer ici</small></a>
                                                <br>
                                                @if(Auth::user()->role=='Eleve')
                                                    @if($test==0)
                                                        <div class="stars">
                                                            <form action="/avis" method="post">
                                                                @csrf
                                                                <input class="star star-5" id="star-5" type="radio" value="5" name="star" />
                                                                <label class="star star-5" for="star-5"></label>
                                                                <input class="star star-4" id="star-4" type="radio" value="4" name="star" />
                                                                <label class="star star-4" for="star-4"></label>
                                                                <input class="star star-3" id="star-3" type="radio" value="3" name="star" />
                                                                <label class="star star-3" for="star-3"></label>
                                                                <input class="star star-2" id="star-2" type="radio" value="2" name="star" />
                                                                <label class="star star-2" for="star-2"></label>
                                                                <input class="star star-1" id="star-1" type="radio" value="1" name="star" />
                                                                <label class="star star-1" for="star-1"></label>
                                                                <input type="hidden" value="{{$s->id}}" name="support_id">
                                                                <input type="hidden" name="matiere_bac_id" value="{{$c->matiere_bac_id}}">
                                                                <input type="submit" value="Envoyer" class="btn btn-info">
                                                            </form>
                                                        </div>
                                                        <style>
                                                            div.stars {
                                                                width: 270px;
                                                                display: inline-block
                                                            }

                                                            .mt-200 {
                                                                margin-top: 200px
                                                            }

                                                            input.star {
                                                                display: none
                                                            }

                                                            label.star {
                                                                float: right;
                                                                padding: 10px;
                                                                font-size: 36px;
                                                                color: #4A148C;
                                                                transition: all .2s
                                                            }

                                                            input.star:checked~label.star:before {
                                                                content: '\f005';
                                                                color: #FD4;
                                                                transition: all .25s
                                                            }

                                                            input.star-5:checked~label.star:before {
                                                                color: #FE7;
                                                                text-shadow: 0 0 20px #952
                                                            }

                                                            input.star-1:checked~label.star:before {
                                                                color: #F62
                                                            }

                                                            label.star:hover {
                                                                transform: rotate(-15deg) scale(1.3)
                                                            }

                                                            label.star:before {
                                                                content: '\f006';
                                                                font-family: FontAwesome
                                                            }
                                                        </style>
                                                    @endif
                                                @else
                                                    <button class="btn btn-danger">Supprimer</button>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="modal fade" id="modal-lg{{$s->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{$c->titre}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">

                                                            @foreach($s->pieces as $p )
                                                                <div class="col-sm-3">
                                                                    <iframe src="{{asset('files/'.$p->url)}}" style="width: 200px;height: 300px;"></iframe>
                                                                    <br>
                                                                    <a href="{{asset('files/'.$p->url)}}" target="_blank">
                                                                        Télécharger
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <div class="modal fade" id="modal-{{$s->teacher->user->id}}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Mr/Mme{{" ".$s->teacher->user->name}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <form class="form" method="post" action="/chat" >
                                                                @csrf
                                                                <input value="{{$s->teacher->user->id}}" type="hidden" name="user_id">
                                                                <input value="Discuter avec Mr/Mme {{$s->teacher->user->name}}" type="submit" class="btn btn-info">
                                                            </form>

                                                        </div>
                                                    </div>

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    @endforeach


                                </div>
                            @endforeach

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
