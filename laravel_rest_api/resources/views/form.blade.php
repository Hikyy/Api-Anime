<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Document</title>
</head>
<body translate="no">
  <div class="contact-us">
    <form action="save" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="input" name="title" placeholder="Titre" required type="text">
        <input class="input" name="Synopsis" placeholder="Synopsis" required type="text">
        <input class="input" name="Score" placeholder="Score" required type="text">
        <input placeholder="Image" name="Image" required type="file">
        <button type="submit">Add</button>
    </form>
</div>
</body>
</html>