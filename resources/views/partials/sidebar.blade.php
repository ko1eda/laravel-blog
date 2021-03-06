<div class="column is-3">
  
  <article class="message is-info">
    <div class="message-body">
      <h3 class="title is-5 has-text-centered">Tags</h3>
      @foreach($tags as $tag)
      <a href="/posts/tags/{{ $tag->name }}">
        <p>
          {{ $tag->name }}
        </p>
      </a>
      @endforeach
    </div>
  </article>

  <article class="message is-info">
    <div class="message-body">
      <h3 class="title is-5 has-text-centered">Archives</h3>
      @foreach($archive as $record)
      <a href="/?month={{ $record['month'] }}&year={{ $record['year'] }}">
        <p>
          {{ $record['month'] }} {{ $record['year'] }}
        </p>
      </a>
      @endforeach
    </div>
  </article>

  <article class="message is-info">
    <div class="message-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      <strong>Pellentesque risus mi</strong>, tempus quis placerat ut,porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla.
      Nullam gravida purus diam, et dictum
      <a>felis venenatis</a>efficitur. Aenean ac
      <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urnatempor ligula, id
      porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
    </div>
  </article>

</div>
</div>