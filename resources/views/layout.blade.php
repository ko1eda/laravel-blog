<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/app.css">
  <title>Welcome</title>
</head>
<body>
  {{-- show creates the section and instantly displays it and ends it --}}
  @section('header')
    @include('partials.nav')
  @show
  
  <main>
    @yield('hero')
    <section class="section">
        <div class="container">
          <div class="columns">
            <div class='column'>
              @yield('content')
              @include('partials.errors')
            </div>
            @include('partials.sidebar')
          </div>
        </div>
    </section>
  </main>
  
  @include('partials.footer')
  @yield('scripts')
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</body>
</html>