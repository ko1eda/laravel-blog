<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{ $task->body }}</title>
</head>
<body>
  <h1>
    {{-- 
      ucwords is php function to cap every first lttr
    --}}
    {{ ucwords($task->body) }} Detail View 
  </h1>
</body>
</html>