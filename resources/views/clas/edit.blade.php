<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Edit</title>
</head>
<body>
    <h1>Halaman Edit Kelas</h1>
    <p>Edit Data Kelas</p>
    <a href="/clas">Kembali</a>
    <br>
    <br>
    <form action="/clas/update/{{ $clas->id }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <br>
            <input type="text" name="name" value="{{ $clas->name }}"><br>
            @error('name')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>
        <br>        
        <div>
            <label for="description">Description</label>
            <br>
            <input type="text" name="description" value="{{ $clas->description }}"><br>
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