<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
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
            @yield('content')
        </div>
    </section>
  </main>
  
  @include('partials.footer')
  @yield('scripts')
</body>
</html>