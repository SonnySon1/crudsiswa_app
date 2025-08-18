<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman detail kelas</title>
</head>
<body>
    <h1>Detail kelas</h1>

    {{-- nama kelas --}}
    <h6>{{ $clas->name }}</h6>

    {{-- nisn kelas --}}
    <h6>{{ $clas->description }}</h6>

</body>
</html>