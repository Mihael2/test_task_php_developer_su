@extends('layouts.main')

@section('blog')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{ $blog->name}}</h1>
        <p class="edica-blog-post-meta aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">Blog written by {{ $blog->user->name}} 
            <br>
            <br>
            {{ $blog->description}}
        </p>
    </div>
</main>

@foreach($blog->articles as $article)
<main class="blog-post">
    <div class="container">
        <a href="{{ route('article.show', $article->id)}}" class="text-decoration-none text-reset">
            <h1 class="edica-page-title">{{ $article->title}}</h1>
            <p class="edica-blog-post-meta" data-aos-delay="200">
                article written by {{$article->blog->user->name}}
            </p>
        </a>
    </div>
</main>
@endforeach
@endsection