<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="main.js"></script>
</head>
<body>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
              <?php 
                echo json_decode(json_encode($task),true)['body']; // converts the collection to an array for no reason
              ?>
            </li>
        <?php endforeach; ?>
    <!-- vs blade -->
        @foreach ($tasks as $task)      
          <li>
            <a href= "/tasks/{{ $task->id }}">
              {{ $task->body }}
            </a>
        </li>
        @endforeach
    </ul>
</body>
</html>