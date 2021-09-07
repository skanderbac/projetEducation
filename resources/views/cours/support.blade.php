@extends("layouts.front")
@section("title")
    Mes Supports
@endsection
@section("page")
    Mes Supports
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
                            <ul>
                                @foreach($bac as $b)
                                    <li><a href="/supports/bac/{{$b->id}}">{{$b->nom}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
