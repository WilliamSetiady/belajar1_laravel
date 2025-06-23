<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{url('belajar')}}">Back</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Angka 1</th>
                <th>Angka 2</th>
                <th>Hasil</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($counts as $index => $c)    
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$c->jenis}}</td>
                <td>{{$c->angka1}}</td>
                <td>{{$c->angka2}}</td>
                <td>{{$c->hasil}}</td>
                <td>
                    <a href="{{route('edit.data-hitung', $c->id)}}">Edit</a>
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>