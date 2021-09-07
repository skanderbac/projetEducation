@extends("layouts.front")
@section("title")
    Matieres
@endsection
@section("page")
    @foreach($bac as $b)
        Bac {{$b->nom}}
    @endforeach
@endsection
@section("contenu")
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="about-info">
                        @foreach($bac as $b)
                            <h2> Bac {{$b->nom}}</h2>
                        @endforeach
                        <ul>
                        @foreach($matieres as $m)
                            <li>
                                    <h4><a href="/cours/{{$m->id}}">{{$m->nom}}</a></h4>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
