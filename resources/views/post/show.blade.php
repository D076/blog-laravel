@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <div class="d-flex justify-content-center">
                <p class="edica-blog-post-meta mt-1" data-aos="fade-up" data-aos-delay="200">{{ $date }} • комментарии
                    ({{$post->comments->count()}}) • лайки ({{$post->likedUsers->count()}})</p>
                <form action="{{ route('post.like.store', $post->id) }}" method="POST" data-aos="fade-up">
                    @csrf
                    <button type="submit" class="border-0 bg-transparent">
                        @auth()
                            @if(auth()->user()->likedPosts->contains($post->id))
                                <i class="fas fa-heart"></i>
                            @else
                                <i class="far fa-heart"></i>
                            @endif
                        @endauth
                    </button>
                </form>
            </div>
            <section class="blog-post-featured-img col-lg-9 mx-auto " data-aos="fade-up" data-aos-delay="300">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-auto mw-100">
                </div>
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row mt-5">
                <div class="col-lg-9 mx-auto">
                    <section class="comment-list mb-5">
                        <h2 class="section-title mb-5" data-aos="fade-up">
                            Комментарии ({{$post->comments->count()}})</h2>
                        @foreach($post->comments as $comment)
                            <div class="comment-text mb-3" data-aos="fade-up">
                            <span class="username">
                                <div>{{ $comment->user->name }}</div>
                                <span
                                    class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                            </span>
                                {{ $comment->message }}
                            </div>
                        @endforeach
                    </section>
                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="message" class="sr-only">Comment</label>
                                        <textarea name="message" id="message" class="form-control"
                                                  placeholder="Комментарий" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Отправить" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @else
                        <section>
                            <div class="mb-3"><h5><a href="{{ route('login') }}">Авторизируйтесь</a>, чтобы оставить
                                    комментарий</h5></div>
                        </section>
                    @endauth
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('post.show', $relatedPost->id) }}"><h5
                                            class="post-title">{{ $relatedPost->title }}</h5></a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
