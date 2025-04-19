@extends('layouts.master')
@section('title')
Buku - {{ $books->title }} | KataBuku
@endsection

@section('content')

<!-- Blog Button Section -->

<div id="" class="blog-pagination">
  <div class="container">
    <div class="d-flex justify-content-start mx-auto">
      <ul>
        <li><a href="/">Katabuku</a></li>
        <li class="mt-2"><i class=" bi-chevron-right"></i></li>
        <li><a href="/books">Buku</a></li>
        <li class="mt-2"><i class=" bi-chevron-right"></i></li>
        <li><a href="#" >{{$books->title}}</a></li>
      </ul>
    </div>
  </div>
</div>

<script>
  function confirmDelete() {
    if (confirm('Are you sure you want to delete this book?')) {
      document.getElementById('delete-form').submit();
    }
  }
  </script>
<!-- Blog Button Section End -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">
          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">

              <article class="article">

                <div class="post-img">
                  <img src="{{ asset('images/' . $books->image) }}" class="img-fluid" alt="{{ $books->title }}">
                </div>
  
                <h2 class="title">{{ $books->title }}</h2>
  
                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="">{{$books->updated_at}}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="">{{ $books->comments->count() }} Komentar</a></li>
                  </ul>
                </div><!-- End meta top -->
  
                <div class="row">
                  <div class="col form-group my-3 ">
                      <p style="text-align: justify;">{!! nl2br(e($books->summary)) !!}</p>
                  </div>
              </div>
  
              <!-- End post content -->
  
                <div class="meta-bottom">
                  <i class="bi bi-person-lock"></i>
                  <ul class="cats">
                    <li><a href="#">Diposting oleh Admin</a></li>
                  </ul>
  
                  <i class="bi bi-tags"></i>
                  <ul class="tags">
                    <li><a href="{{ route('genres.show', $books->genre->id) }}">{{ $books->genre->name }}</a></li>
                  </ul>
                </div><!-- End meta bottom -->
  
              </article>

            </div>
          </section><!-- /Blog Details Section -->

          <!-- Blog Comments Section -->
          <section id="blog-comments" class="blog-comments section">
            <div class="container">
                <h4 class="comments-count">{{ $books->comments->count() }} Komentar</h4>
                @foreach ($books->comments as $comment)
                <div id="comment-{{ $comment->id }}" class="comment">
                    <div class="d-flex">
                        <div class="comment-img"><img src="https://img.icons8.com/bubbles/100/000000/user.png" alt=""></div>
                        <div>
                            <h5><a href="#">{{ $comment->user->name }}</a><a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5></h5>
                            <time datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('d M, Y') }}</time>
                            <p>{{ $comment->content }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
          </section><!-- /Blog Comments Section -->

          <!-- Comment Form Section -->
          <section id="comment-form" class="comment-form section">
            <div class="container">

              <form action="{{ route('books.comments.store', $books->id) }}" method="POST">
                @csrf
                <h4>Posting Balasan Anda</h4>
                <p>Alamat email Anda tidak akan terpublikasi.</p>
                <div class="row">
                    <div class="col form-group">
                        <textarea name="content" class="form-control" placeholder="Beri komentar Anda disini" required></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">KIRIM</button>
                </div>
              </form>

            </div>
          </section><!-- /Comment Form Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Search Widget -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">Search</h3>
              <form action="">
                <input type="text">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>

            </div><!--/Search Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">
              <h3 class="widget-title">Postingan Terbaru</h3>
              <div class="post-item">
                  @foreach ($recentpost as $post)
                  <h4>
                      <a href="{{ route('books.show', $post->id) }}">
                          {{ $post->title }}
                      </a>
                  </h4>
                  <time datetime="{{ $post->updated_at }}">{{ $post->updated_at }}</time>
                  @endforeach
              </div>
          </div><!-- End recent post item-->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">Genre</h3>
              <ul>
                @foreach ($genres as $genre)
                <li>
                  <a href="{{ route('genres.show', $genre->id) }}">
                    {{ $genre->name }}
                  </a>
                </li>
                @endforeach
              </ul>

            </div><!--/Tags Widget -->

          </div>

        </div>

      </div>
    </div>

@endsection