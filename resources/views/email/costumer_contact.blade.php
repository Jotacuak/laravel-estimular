<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>
<body>
    <h2>Un usuario ha contactado desde la web</h2>

    <p>Se llama {{$costumer->name}} {{$costumer->surname}}, su correo electrónico es {{$costumer->email}} y su número de teléfono es {{$costumer->mobile_phone}}</p>
    
    @if($costumer->content)
        <p>El usuario ha escrito lo siguiente:</p>
        <p>{{$costumer->content}}</p>)
    @else
        <p>El usuario no ha escrito ningún mensaje</p>
    @endif
</body>
</html>