<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Index</title>
</head>
<body>
    <div>
        <a href="/">Menu Siswa</a>
        |
        <a href="/clas">Menu Kelas</a>
    </div>
    <hr>
    <h1>Halaman Kelas</h1>
    <p>List Data Kelas</p>
    <a href="/clas/create">Create Kelas</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clases as $clas)
                <tr>
                    <td>{{ $clas->name }}</td>
                    <td>{{ $clas->description }}</td>
                    <td>
                        <a onclick="return confirm('yakin?')" href="/clas/delete/{{ $clas->id }}">Delete</a>
                        |
                        <a href="/clas/edit/{{ $clas->id }}">Edit</a>
                        |
                        <a href="/clas/show/{{ $clas->id }}">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>