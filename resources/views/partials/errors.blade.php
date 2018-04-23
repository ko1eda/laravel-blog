@if($errors)
  <section class="section">
    @foreach ($errors->all() as $error)
      <div class="notification is-danger">
        {{ $error }}
      </div>
    @endforeach
  </section>
@endif