@extends("layouts.front")
@if(session('user'))
@section('menu')
    <li><a href="#top" class="smoothScroll">Home</a></li>
    <li><a href="#about" class="smoothScroll">About</a></li>
    <li><a href="#team" class="smoothScroll">Our Teachers</a></li>
    <li><a href="#courses" class="smoothScroll">Courses</a></li>
    <li><a href="#testimonial" class="smoothScroll">Reviews</a></li>
    <li><a href="#contact" class="smoothScroll">Contact</a></li>
@endsection
@endif

