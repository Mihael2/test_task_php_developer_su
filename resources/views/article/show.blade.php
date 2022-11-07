@extends('layouts.main')

@section('blog')
<main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $article->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                written by {{$article->blog->user->name}} • {{ $date->format(' d F')}} • {{ $date->format('H:i')}} 
            </p>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <a href="#" class="text-decoration-none text-reset">
                            <h3>{{$article->content}}</h3>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection