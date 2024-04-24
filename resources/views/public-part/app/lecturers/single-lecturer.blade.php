@extends('public-part.layout.layout')

<!-- Title of page -->
@section('Single Lecturer') @endsection
<!-- Page content -->
@section('public-content')
    <div class="single-lecturer__featured">
        <div class="single-lecturer__container">
            <img src="{{ asset('files/images/presenters/ana_krstajic.png') }}">
            <div class="single-lecturer__featured-content">
                <div class="single-lecturer__featured-category">Predavač</div>
                <h2>Almir Bašović</h2>
                <div class="single-lecturer__featured-subtitle">Predavač</div>
                <div class="single-lecturer__featured-shortbio">Filozofski fakultet Univerziteta u Sarajevu</div>
                <div class="single-lecturer__featured-icons">
                    <a href="#" target="_blank" class="single-lecturer__featured-icon">
                        <img src="{{ asset('files/images/svg-icons/linkedin.svg') }}" alt="Linkedin icon">
                    </a>
                    <a href="#" target="_blank" class="single-lecturer__featured-icon">
                        <img src="{{ asset('files/images/svg-icons/x.svg') }}" alt="X icon">
                    </a>
                    <a href="#" target="_blank" class="single-lecturer__featured-icon">
                        <img src="{{ asset('files/images/svg-icons/dribble.svg') }}" alt="Dribble icon">
                    </a>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>
    </div>
    <div class="single-lecturer__about">
        <div class="single-lecturer__container">
            <h2>O predavaču</h2>
            <p>Lorem ipsum dolor sit amet consectetur. Tellus sodales fusce magna dictum. Nisl volutpat volutpat vehicula magna integer aliquam pharetra. Fringilla aenean nisi sed morbi senectus lacus mauris in laoreet. Condimentum gravida felis vel dictumst arcu habitasse risus non. Vitae sollicitudin enim morbi dolor et egestas ac nunc. Aliquam eget nibh tempor rhoncus egestas scelerisque nisi mattis id. Ultrices facilisis eu diam vel. Tristique tellus mauris eget sit velit augue consectetur. Amet at volutpat dolor nibh ipsum quam diam tristique tellus. Augue pellentesque sit faucibus non penatibus vestibulum aliquam id. Elementum elit sem ac vitae in. Habitasse iaculis amet suspendisse donec. Sed sit sit ut volutpat volutpat quis id ultrices scelerisque. Leo in enim elit etiam vestibulum. Ut lectus enim varius leo non ut mi sit enim.

                Lorem ipsum dolor sit amet consectetur. Tellus sodales fusce magna dictum. Nisl volutpat volutpat vehicula magna integer aliquam pharetra. Fringilla aenean nisi sed morbi senectus lacus mauris in laoreet. Condimentum gravida felis vel dictumst arcu habitasse risus non. Vitae sollicitudin enim morbi dolor et egestas ac nunc. Aliquam eget nibh tempor rhoncus egestas scelerisque nisi mattis id. Ultrices facilisis eu diam vel. Tristique tellus mauris eget sit velit augue consectetur. Amet at volutpat dolor nibh ipsum quam diam tristique tellus. Augue pellentesque sit faucibus non penatibus vestibulum aliquam id. Elementum elit sem ac vitae in. Habitasse iaculis amet suspendisse donec. Sed sit sit ut volutpat volutpat quis id ultrices scelerisque. Leo in enim elit etiam vestibulum. Ut lectus enim varius leo non ut mi sit enim. </p>
        </div>
    </div>
    <div class="single-lecturer__interview">
        <div class="single-lecturer__container">
            <h2>Intervju</h2>
            <p class="question">Lorem ipsum</p>
            <p class="answer">Lorem ipsum</p>
            <p class="question">Lorem ipsum</p>
            <p class="answer">Lorem ipsum</p>
            <p class="question">Lorem ipsum</p>
            <p class="answer">Lorem ipsum</p>
        </div>
    </div>

    @include('public-part.app.programs.includes.sessions')
    @include('public-part.app.base-includes.snake.snake')
@endsection
