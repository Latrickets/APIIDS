<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        <p>hola {{ Auth::user()->name }}</p>
    @endauth
    <div class="container">
        <form action="{{ url('login') }}" method="post">
            @csrf
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>