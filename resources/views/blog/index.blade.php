@extends('layouts.main')

@section('blog')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Blogs list</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-4 fetured-post blog-post aos-init aos-animate" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="assets/images/blog_1.jpg" alt="blog post">
                        </div>
                        <a href="{{ route('blog.show', $blog->id)}}" class="blog-post-permalink">
                        <p class="blog-post-category">{{ $blog->name}}</p>
                        <h6 class="blog-post-title">{{ $blog->description}}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

    </div>

</main>
@endsection