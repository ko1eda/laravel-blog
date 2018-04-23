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
  <div class="columns">
    <div class="column ">
      <div class="columns is-multiline">
        @foreach ($posts as $post)
          <a href= <?= "/post/{$post->id}"?>>
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
                    <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                  </div>
                </div>
                <footer class="card-footer">
                  <a href="#" class="card-footer-item">View</a>
                  <a href="#" class="card-footer-item">Share</a>
                </footer>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
    <div class="column is-3">
      <article class="message">
        <div class="message-body">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut,porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a>efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urnatempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
        </div>
      </article>
      <article class="message">
        <div class="message-body">
          Lorem ipsum dolor sit amet, conse Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti magni eius est optio, et debitis! Cupiditate, repellendus eligendi vitae sunt, tenetur quia totam minus voluptatibus labore adipisci, ipsam asperiores esse!adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut,porta nec nulla. Vestibulum rhoncus ac ex sit ametiam, et dictum <a>felis venenatis</a>efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urnatempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
        </div>
      </article>
    </div>
  </div>
@endsection

{{-- 
    this version of footer will only be included while this page is loaded
    the same goes for the content section above 
--}}
@section ('scripts')
  <script src="somefile.js" />
@endsection 