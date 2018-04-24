@extends('layout')

@section('content')
  <div class="u-wrapper">
    <div class="post-detail">
      <h1 class='post-detail title is-1'>
        {{$post->title}}
      </h1>
      <div class='post-detail body'>
        {{$post->body}}
      </div>
      <p class='post-detail author is-size-5'>
        -{{$post->author}}
      </p>
      @foreach ($comments as $comment)
        <div class='post-detail comments'>
          @include('partials.comments')
        </div>
      @endforeach
    </div>
  </div>
@endsection
