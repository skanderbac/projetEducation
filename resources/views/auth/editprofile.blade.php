@extends("layouts.front")
@section("title")
    Chat |
@endsection

@section('menu')
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>



    @endguest
@endsection

@section("contenu")
    @if(Auth::user()->role=='Eleve')
        <section id="team">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="section-title">
                            <h2>Modifiez Votre Compte</h2>
                        </div>
                    </div>

                    <form method="post" action="{{route('user.profile.update')}}" >
                        @csrf
                        <div class="form-group">
                            <label>Nom & Prénom</label>
                            <input type="text" value="{{Auth::user()->name}}" class="form-control"  name="name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="{{Auth::user()->email}}" class="form-control"  name="email">
                        </div>
                        <div class="form-group">
                            <label>Bac</label>
                            <select class="form-control"  name="bac_id">
                                @foreach($bac as $b)
                                    @if($b->id == $student->bac_id)
                                        <option value="{{$b->id}}" selected>{{$b->nom}}</option>
                                    @else
                                        <option value="{{$b->id}}" >{{$b->nom}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>

                </div>
            </div>
        </section>
    @else
        <section id="team">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="section-title">
                            <h2>Modifiez Votre Compte</h2>
                        </div>
                    </div>

                    <form method="post" action="{{route('user.profile.update')}}" >
                        @csrf
                        <div class="form-group">
                            <label>Nom & Prénom</label>
                            <input type="text" value="{{Auth::user()->name}}" class="form-control"  name="name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="{{Auth::user()->email}}" class="form-control"  name="email">
                        </div>
                        <div class="form-group">
                            <label>Matiere</label>
                            <select class="form-control"  name="matiere_id">
                                @foreach($matiere as $b)
                                    @if($b->id == $teacher->matiere_id)
                                        <option value="{{$b->id}}" selected>{{$b->nom}}</option>
                                    @else
                                        <option value="{{$b->id}}" >{{$b->nom}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>

                </div>
            </div>
        </section>
    @endif
@endsection
