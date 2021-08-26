@extends("layouts.master")
@section("title")
    Bac Mathématiques
@endsection
@section("page")
    Bac Mathématiques
@endsection
@section("contenu")
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-tag"></i>
                    Mathématiques
                </h3>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <br>
                    <h4>Fonctions logarithmes</h4>
                    <br>
                </div>
                <!-- /.col-12 -->
                <div class="row">

                    <div class="col-sm-3">
                        <div class="position-relative p-3 bg-green" style="height: 180px">
                            <div class="ribbon-wrapper">
                                <div class="ribbon bg-primary">
                                    4.3/5
                                </div>
                            </div>
                            Mr/Mme Oleta Keeling<br>
                            <a href=""><small>Cliquer ici</small></a>
                            <br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="position-relative p-3 bg-green" style="height: 180px">
                            <div class="ribbon-wrapper">
                                <div class="ribbon bg-primary">
                                    4.5/5
                                </div>
                            </div>
                            Mr/Mme Gabriella Hane <br>
                            <a href=""><small>Cliquer ici</small></a>
                            <br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                <div class="col-12">
                    <br>
                    <h4 class="mt-3">Fonctions exponentielles</h4>
                    <br>
                </div>
                <!-- /.col-12 -->
                <div class="row">
                    <div class="col-sm-3">
                        <div class="position-relative p-3 bg-green" style="height: 180px">
                            <div class="ribbon-wrapper">
                                <div class="ribbon bg-primary">
                                    4.3/5
                                </div>
                            </div>
                            Mr/Mme Precious Doyle<br>
                            <a href=""><small>Cliquer ici</small></a>
                            <br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="position-relative p-3 bg-green" style="height: 180px">
                            <div class="ribbon-wrapper">
                                <div class="ribbon bg-primary">
                                    4.2/5
                                </div>
                            </div>
                            Mr/Mme Oleta Keeling<br>
                            <a href=""><small>Cliquer ici</small></a>
                            <br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>

                </div>


            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
        Launch Large Modal
    </button>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Fonctions logarithmes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <iframe src="{{asset('files/video.mp4')}}" style="width: 200px;height: 300px;"></iframe>
                        </div>
                        <div class="col-sm-3">
                            <iframe src="{{asset('files/CoursMath-Fonctionslogarithmes.pdf')}}" style="width: 200px;height: 300px;"></iframe>
                            <br>
                            <a href="{{asset('files/CoursMath-Fonctionslogarithmes.pdf')}}" target="_blank">
                                Télécharger
                            </a>
                        </div>
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
@endsection
