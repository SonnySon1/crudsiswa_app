<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Tambah</title>
</head>
<body>
    <h1>Halaman Tambah Kelas</h1>
    <p>Tambah Data Kelas</p>
    <a href="/clas">Kembali</a>
    <br>
    <br>
    <form action="/clas/store" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <br>
            <input type="text" name="name"><br>
            @error('name')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>
        <br>        
        <div>
            <label for="description">Description</label>
            <br>
            <input type="text" name="description"><br>
            @error('description')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>
        <br>        
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>
</body>
</html>