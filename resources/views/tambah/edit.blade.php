<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Aritmatika</title>
</head>
<body>
    <h1>{{$title ?? ''}}</h1>
    <a href="">Kembali</a>
    <form action="{{ route('update.tambahan', $count->id) }}" method="post">
        @csrf 
        @method('PUT')
        <input type="hidden" name="jenis" value="tambah">
        <label for="">Masukkan Angka</label>
        <input type="text" name="angka1" placeholder="Masukkan Angka" value="{{$count->angka1}}">
        <br>
        <label for="">Masukkan Angka</label>
        <input type="text" name="angka2" placeholder="Masukkan Angka" value="{{$count->angka2}}">
        <br>
        <button type="submit">Simpan</button>
    </form>

    
        <h1>Hasilnya adalah {{$count->hasil}}</h1>
</body>
</html>