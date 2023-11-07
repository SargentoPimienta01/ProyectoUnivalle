<!DOCTYPE html>
<html>
<head>
    <title>Subir Imágenes a ImgBB</title>
</head>
<body>
    <form action="{{ route('subir-imagen') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="imagen">
        <button type="submit">Subir Imagen</button>
    </form>
</body>
</html>
@if (session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif
