<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Index</title>
</head>
<body>
    <h1>Halaman Beranda</h1>
    <p>List Data Siswa</p>
    <a href="/siswa/create">Create Siswa</a>
    <table border="1">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td><img src="{{ asset('storage/'.$siswa->photo) }}" width="40" alt=""></td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->clas->name }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>
                        <a href="">Delete</a>
                        |
                        <a href="">Edit</a>
                        |
                        <a href="">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>