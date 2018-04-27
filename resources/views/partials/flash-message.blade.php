@if(isset($message))
    <div class="notification is-success is-positioned is-sized">
      <button class="delete"></button>
      {{ $message }}
    </div>
@endif