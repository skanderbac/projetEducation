@extends("layouts.front")

@section('menu')

@endsection

@section('contenu')
@guest
    <section id="home">
        <div class="row">

            <div class="owl-carousel owl-theme home-slider">
                <div class="item item-first">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>Education en ligne </h1>
                                <h3>Réviser en ligne avec Edukatek </h3>
                                <a href="/login" class="section-btn btn btn-default smoothScroll">Découvrir plus</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-second">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>Commencez votre journée avec nos cours</h1>
                                <h3>Nos cours en ligne sont construits en partenariat avec des enseignants compétants qu'ils sont conçus pour répondre à vos questions.</h3>
                                <a href="/login" class="section-btn btn btn-default smoothScroll">Commencer maintenant</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FEATURE -->
    <section id="feature">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4">
                    <div class="feature-thumb">
                        <span>01</span>
                        <h3>Trending Courses</h3>
                        <p>Known is free education HTML Bootstrap Template. You can download and use this for your website.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="feature-thumb">
                        <span>02</span>
                        <h3>Books & Library</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et dolore magna.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="feature-thumb">
                        <span>03</span>
                        <h3>Certified Teachers</h3>
                        <p>templatemo provides a wide variety of free Bootstrap Templates for you. Please tell your friends about us. Thank you.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="about-info">
                        <h2>Start your journey to a better life with online practical courses</h2>

                        <figure>
                            <span><i class="fa fa-users"></i></span>
                            <figcaption>
                                <h3>Professional Trainers</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-certificate"></i></span>
                            <figcaption>
                                <h3>International Certifications</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-bar-chart-o"></i></span>
                            <figcaption>
                                <h3>Free for 3 months</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <div class="col-md-offset-1 col-md-4 col-sm-12">
                    <div class="entry-form">
                        <form action="#" method="post">
                            <h2>Signup today</h2>
                            <input type="text" name="full name" class="form-control" placeholder="Full name" required="">

                            <input type="email" name="email" class="form-control" placeholder="Your email address" required="">

                            <input type="password" name="password" class="form-control" placeholder="Your password" required="">

                            <button class="submit-btn form-control" id="form-submit">Get started</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- TEAM -->
    <section id="team">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Teachers <small>Meet Professional Trainers</small></h2>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                        <div class="team-image">
                            <img src="images/author-image1.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Mark Wilson</h3>
                            <span>I love Teaching</span>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                        <div class="team-image">
                            <img src="images/author-image2.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Catherine</h3>
                            <span>Education is the key!</span>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-google"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                        <div class="team-image">
                            <img src="images/author-image3.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Jessie Ca</h3>
                            <span>I like Online Courses</span>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="team-thumb">
                        <div class="team-image">
                            <img src="images/author-image4.jpg" class="img-responsive" alt="">
                        </div>
                        <div class="team-info">
                            <h3>Andrew Berti</h3>
                            <span>Learning is fun</span>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google"></a></li>
                            <li><a href="#" class="fa fa-behance"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Courses -->
    <section id="courses">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Popular Courses <small>Upgrade your skills with newest courses</small></h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-courses">
                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="images/courses-image1.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                            <span><i class="fa fa-calendar"></i> 12 / 7 / 2018</span>
                                            <span><i class="fa fa-clock-o"></i> 7 Hours</span>
                                        </div>
                                    </div>

                                    <div class="courses-detail">
                                        <h3><a href="#">Social Media Management</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>

                                    <div class="courses-info">
                                        <div class="courses-author">
                                            <img src="images/author-image1.jpg" class="img-responsive" alt="">
                                            <span>Mark Wilson</span>
                                        </div>
                                        <div class="courses-price">
                                            <a href="#"><span>USD 25</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="images/courses-image2.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                            <span><i class="fa fa-calendar"></i> 20 / 7 / 2018</span>
                                            <span><i class="fa fa-clock-o"></i> 4.5 Hours</span>
                                        </div>
                                    </div>

                                    <div class="courses-detail">
                                        <h3><a href="#">Graphic & Web Design</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>

                                    <div class="courses-info">
                                        <div class="courses-author">
                                            <img src="images/author-image2.jpg" class="img-responsive" alt="">
                                            <span>Jessica</span>
                                        </div>
                                        <div class="courses-price">
                                            <a href="#"><span>USD 80</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="images/courses-image3.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                            <span><i class="fa fa-calendar"></i> 15 / 8 / 2018</span>
                                            <span><i class="fa fa-clock-o"></i> 6 Hours</span>
                                        </div>
                                    </div>

                                    <div class="courses-detail">
                                        <h3><a href="#">Marketing Communication</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>

                                    <div class="courses-info">
                                        <div class="courses-author">
                                            <img src="images/author-image3.jpg" class="img-responsive" alt="">
                                            <span>Catherine</span>
                                        </div>
                                        <div class="courses-price free">
                                            <a href="#"><span>Free</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="images/courses-image4.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                            <span><i class="fa fa-calendar"></i> 10 / 8 / 2018</span>
                                            <span><i class="fa fa-clock-o"></i> 8 Hours</span>
                                        </div>
                                    </div>

                                    <div class="courses-detail">
                                        <h3><a href="#">Summer Kids</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>

                                    <div class="courses-info">
                                        <div class="courses-author">
                                            <img src="images/author-image1.jpg" class="img-responsive" alt="">
                                            <span>Mark Wilson</span>
                                        </div>
                                        <div class="courses-price">
                                            <a href="#"><span>USD 45</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="images/courses-image5.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                            <span><i class="fa fa-calendar"></i> 5 / 10 / 2018</span>
                                            <span><i class="fa fa-clock-o"></i> 10 Hours</span>
                                        </div>
                                    </div>

                                    <div class="courses-detail">
                                        <h3><a href="#">Business &amp; Management</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>

                                    <div class="courses-info">
                                        <div class="courses-author">
                                            <img src="images/author-image2.jpg" class="img-responsive" alt="">
                                            <span>Jessica</span>
                                        </div>
                                        <div class="courses-price free">
                                            <a href="#"><span>Free</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </section>


    <!-- TESTIMONIAL -->
    <section id="testimonial">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h2>Student Reviews <small>from around the world</small></h2>
                    </div>

                    <div class="owl-carousel owl-theme owl-client">
                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="images/tst-image1.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="tst-author">
                                    <h4>Jackson</h4>
                                    <span>Shopify Developer</span>
                                </div>
                                <p>You really do help young creative minds to get quality education and professional job search assistance. I’d recommend it to everyone!</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="images/tst-image2.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="tst-author">
                                    <h4>Camila</h4>
                                    <span>Marketing Manager</span>
                                </div>
                                <p>Trying something new is exciting! Thanks for the amazing law course and the great teacher who was able to make it interesting.</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="images/tst-image3.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="tst-author">
                                    <h4>Barbie</h4>
                                    <span>Art Director</span>
                                </div>
                                <p>Donec erat libero, blandit vitae arcu eu, lacinia placerat justo. Sed sollicitudin quis felis vitae hendrerit.</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="images/tst-image4.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="tst-author">
                                    <h4>Andrio</h4>
                                    <span>Web Developer</span>
                                </div>
                                <p>Nam eget mi eu ante faucibus viverra nec sed magna. Vivamus viverra sapien ex, elementum varius ex sagittis vel.</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </section>


    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <form id="contact-form" role="form" action="" method="post">
                        <div class="section-title">
                            <h2>Contact us <small>we love conversations. let us talk!</small></h2>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <input type="text" class="form-control" placeholder="Enter full name" name="name" required="">

                            <input type="email" class="form-control" placeholder="Enter email address" name="email" required="">

                            <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required=""></textarea>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <input type="submit" class="form-control" name="send message" value="Send Message">
                        </div>

                    </form>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="contact-image">
                        <img src="images/contact-image.jpg" class="img-responsive" alt="Smiling Two Girls">
                    </div>
                </div>

            </div>
        </div>
    </section>
@else
    @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
    @endif
    @if(session()->has("alert"))
        <div class="alert alert-danger">
            {{session()->get("alert")}}
        </div>
    @endif
    @if(Auth::user()->role =="Eleve" )
        @if($blocked==0)
            @if( $confirmed==0)
                <section id="team">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                <div class="section-title">
                                    <h2>Continuez votre inscription<small>Veuillez choisir votre bac</small></h2>
                                </div>
                            </div>

                            <form method="post" action="{{route('user.bac')}}" >
                                @csrf
                                <div class="form-group">
                                    <label>Bac</label>
                                    <select class="form-control"  name="bac_id">
                                        @foreach($bac as $b)
                                            <option value="{{$b->id}}">{{$b->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Matiere optionnelle</label>
                                    <select class="form-control"  name="matiere_id">
                                        @foreach($matiere as $m)
                                            <option value="{{$m->id}}">{{$m->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <button type="submit" class="btn btn-primary">Confirmer</button>
                            </form>

                        </div>
                    </div>
                </section>
            @else
                <section id="team">
                    <div class="container">
                        <div class="row">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if(Auth::user()->name!="")
                                            <img class="profile-user-img img-fluid img-circle" src="{{asset('photos/'.Auth::user()->photo)}}" style="width: 200px;height: 200px;" alt="User profile picture">


                                        @else
                                            <img class="profile-user-img img-fluid img-circle" src="{{asset('photos/'.Auth::user()->photo)}}" style="width: 200px;height: 200px;" alt="User profile picture">
                                        @endif
                                        <form  class="form-horizontal" method="post" action="/photo/edit" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Choisissez votre photo de profile</label>
                                                <input type="file" name="photo" >
                                            </div>
                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    @foreach($errors->all() as $error)
                                                        <li>{{$error}}</li>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <input type="submit" class="btn btn-primary" value="Modifier">
                                        </form>

                                    </div>

                                    <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                                    <p class="text-muted text-center">{{Auth::user()->role}}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Email </b> <a class="float-right">{{Auth::user()->email}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Bac </b> <a class="float-right">{{$b->nom}}</a>
                                        </li>
                                    </ul>

                                    <a href="/profile/edit" class="btn btn-primary btn-block"><b>Editez votre profile</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @else
            <div class="alert alert-danger">
                Vous etes bloqué par l'admin
            </div>
        @endif
    @elseif(Auth::user()->role =="Enseignant")
        @if( $confirmed==0)
            <section id="team">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="section-title">
                                <h2>Continuez votre inscription<small>Veuillez choisir la matiere que vous enseignez</small></h2>
                            </div>
                        </div>
                        <form method="post" action="{{route('teachers.store')}}" >
                            @csrf
                            <div class="form-group">
                                <label>Matiere</label>
                                <select class="form-control"  name="matiere_id">
                                    @foreach($matiere as $m)
                                        <option value="{{$m->id}}">{{$m->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </form>

                    </div>
                </div>
            </section>
        @else
            <section id="team">
                <div class="container">
                    <div class="row">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if(Auth::user()->name!="")
                                        <img class="profile-user-img img-fluid img-circle" src="{{asset('photos/'.Auth::user()->photo)}}" style="width: 200px;height: 200px;" alt="User profile picture">


                                    @else
                                        <img class="profile-user-img img-fluid img-circle" src="{{asset('photos/'.Auth::user()->photo)}}" style="width: 200px;height: 200px;" alt="User profile picture">
                                    @endif

                                    <form  class="form-horizontal" method="post" action="/photo/edit" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Choisissez votre photo de profile</label>
                                            <input type="file" name="photo" >
                                        </div>
                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </div>
                                        @endif
                                        <input type="submit" class="btn btn-primary" value="Modifier">
                                    </form>

                                </div>

                                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                                <p class="text-muted text-center">{{Auth::user()->role}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email </b> <a class="float-right">{{Auth::user()->email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Matiere </b> <a class="float-right">{{$m->nom}}</a>
                                    </li>
                                </ul>
                                @if($m->confirmed==0)
                                    <div class="alert alert-warning">
                                        <li>Votre compte n'est pas encore confirmé par l'admin</li>
                                    </div>
                                @endif
                                <a href="/profile/edit" class="btn btn-primary btn-block"><b>Editez votre profile</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif

@endguest
@endsection
