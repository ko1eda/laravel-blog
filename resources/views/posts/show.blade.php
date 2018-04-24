@extends('layout')

@section('content')
  <div class="u-wrapper">
    <div class="post-detail">
      <h1 class='post-detail__title title is-1 is-marginless'>
        {{$post->title}}
      </h1>
      <div class='post-detail__body'>
        {{$post->body}}
      </div>
      <p class='post-detail__author is-size-5'>
        -{{$post->author}}
      </p>
      <form class="post-detail__form">
          {{ csrf_field() }}
        <div class="field">
          <div class="control">
            <textarea class="textarea" 
            placeholder="Post a comment" 
            rows="5"></textarea>
          </div>
        </div>
        <div class="field">
          <div class="control">
              <button class="button is-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @foreach ($comments as $comment)
    <div class='comments'>
      @include('partials.comments')
    </div>
  @endforeach
@endsection
