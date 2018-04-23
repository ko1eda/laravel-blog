@extends ('layout')

@section('header')
<section class="hero is-info is-fullheight">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
      @parent
    </div>
  
    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="title">
          Title
        </h1>
        <h2 class="subtitle">
          Subtitle
        </h2>
      </div>
    </div>
  
    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
      <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
          <ul>
            <li class="is-active"><a href="/">Dashboard</a></li>
            <li><a>Messages</a></li>
            <li><a>Comments</a></li>
            <li><a>Explore</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </section>
@endsection

@section ('content')
  <div class="columns is-multiline">
    @foreach ($posts as $post)
      <div class="column is-4">
        <a href= <?= "/post/{$post->id}"?>>
          <div class="card">
              <div class="card-content">
                <p class="title">
                {{ $post -> title }}
                </p>
                <p class="subtitle">
                {{ $post -> author }}
                </p>
              </div>
              <footer class="card-footer">
                <p class="card-footer-item">
                  <span>
                    View on Twitter
                  </span>
                </p>
                <p class="card-footer-item">
                  <span>
                    Share on Facebook
                  </span>
                </p>
              </footer>
            </div>
          </a>
        </div>
      @endforeach
  </div>
@endsection

{{-- 
    this version of footer will only be included while this page is loaded
    the same goes for the content section above 
--}}
@section ('scripts')
  <script src="somefile.js" />
@endsection 