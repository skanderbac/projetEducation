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
                                                        4.3/5
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-{{$s->teacher->user->id}}">Mr/Mme{{" ".$s->teacher->user->name}}</a><br><br>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-lg{{$s->id}}"><small>Cliquer ici</small></a>
                                                <br>
                                                @if(Auth::user()->role=='Eleve')
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
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
