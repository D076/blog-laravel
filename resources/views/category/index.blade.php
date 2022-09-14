@extends('layouts.main')
@section('content')
    <main class="blog pb-5">
        <div class="container ">
            <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <ul class="list-group">
                    @foreach($categories as $category)
                    <li class="list-group-item">
                        <a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a>
                    </li>
                    @endforeach
                </ul>
            </section>
        </div>

    </main>
@endsection
