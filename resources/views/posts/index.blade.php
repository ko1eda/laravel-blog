@extends ('layout')

@section('hero')
<section class="hero is-medium is-light">
    <div class="hero-body">
      <div class="container">
        <h1 class="title is-1">
          My Cool New Blog
        </h1>
        <h2 class="subtitle is-4">
          A quick example blog for laravel
        </h2>
      </div>
    </div>
</section>
@endsection

@section ('content')
  <div class="columns is-multiline">
    @foreach ($posts as $post)
      <div class="column is-6">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title is-centered ">
              {{$post->title}}
            </p>
          </header>
          <div class="card-content">
            <div class="content is-centered">
                {{$post->body}}
              <br>
            <time datetime="2016-1-1">
              {{ $post->created_at->toFormattedDateString() }}
            </time>
            </div>
          </div>
          <footer class="card-footer">
            <a href="{{"/posts/$post->id"}}" class="card-footer-item">View</a>
            <a href="" class="card-footer-item">Share</a>
          </footer>
        </div>
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