<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear cliente</title>
</head>
<body>
    <form action="{{ route('updateuser', $client) }}" method="post">
        @csrf
        @method('put')
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" placeholder="Maria Del Sol" value="{{$client->name}}"><br>
        <label for="phone_number">Numero de telefono</label>
        <input type="text" id="phone_number" name="phone_number" placeholder="612XXXXXXX" value="{{$client->phone_number}}"><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="example@example.com" value="{{$client->email}}"><br>
        <button type="submit">Actualizar cliente</button>
    </form>
</body>
</html>